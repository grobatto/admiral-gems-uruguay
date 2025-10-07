<?php
/**
 * Admiral Gems Uruguay Theme functions
 */

if (!defined('ABSPATH')) { exit; }

// Dynamic site/home URL for tunnels (ngrok, localtunnel) so assets load with the current host
if (!defined('ADMIRAL_DYNAMIC_URL')) {
    $hostForDynamic = isset($_SERVER['HTTP_HOST']) ? strtolower(sanitize_text_field($_SERVER['HTTP_HOST'])) : '';
    $isDevHost = ($hostForDynamic === 'localhost') || str_starts_with($hostForDynamic, '127.') || str_ends_with($hostForDynamic, 'ngrok-free.app') || str_ends_with($hostForDynamic, 'loca.lt');
    define('ADMIRAL_DYNAMIC_URL', $isDevHost);
}
if (ADMIRAL_DYNAMIC_URL) {
    function admiral_gems_current_origin() {
        if (PHP_SAPI === 'cli') { return null; }
        if (empty($_SERVER['HTTP_HOST'])) { return null; }
        $host = sanitize_text_field($_SERVER['HTTP_HOST']);
        $host_lc = strtolower($host);
        $proto = 'http';
        if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            $proto = sanitize_text_field($_SERVER['HTTP_X_FORWARDED_PROTO']);
        }
        if (str_ends_with($host_lc, 'ngrok-free.app') || str_ends_with($host_lc, 'loca.lt')) {
            $proto = 'https';
        }
        if ($host_lc === 'localhost' || str_starts_with($host_lc, '127.')) {
            $proto = 'http';
        }
        if (function_exists('is_ssl') && is_ssl()) { $proto = 'https'; }
        return $proto . '://' . $host;
    }
    function admiral_gems_force_https_if_tunnel($url) {
        if (empty($_SERVER['HTTP_HOST'])) { return $url; }
        $host = strtolower(sanitize_text_field($_SERVER['HTTP_HOST']));
        if (str_ends_with($host, 'ngrok-free.app') || str_ends_with($host, 'loca.lt')) {
            // Replace scheme to https
            if (strpos($url, 'http://') === 0) {
                $url = 'https://' . substr($url, 7);
            }
        }
        return $url;
    }
    add_filter('pre_option_home', function ($value) {
        $origin = admiral_gems_current_origin();
        return $origin ?: $value;
    });
    add_filter('pre_option_siteurl', function ($value) {
        $origin = admiral_gems_current_origin();
        return $origin ?: $value;
    });
    add_filter('home_url', function($url){ return admiral_gems_force_https_if_tunnel($url); }, 99);
    add_filter('site_url', function($url){ return admiral_gems_force_https_if_tunnel($url); }, 99);
    add_filter('content_url', function($url){ return admiral_gems_force_https_if_tunnel($url); }, 99);
    add_filter('plugins_url', function($url){ return admiral_gems_force_https_if_tunnel($url); }, 99);
    add_filter('style_loader_src', function($src){ return admiral_gems_force_https_if_tunnel($src); }, 99);
    add_filter('script_loader_src', function($src){ return admiral_gems_force_https_if_tunnel($src); }, 99);
}

// Theme setup
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','script','style']);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
});

// Security headers (safe defaults)
add_action('send_headers', function () {
    if (function_exists('is_ssl') && is_ssl()) {
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
    }
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
}, 10);

// Enqueue styles and scripts
add_action('wp_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_style('admiral-gems-style', get_stylesheet_uri(), [], $theme_version);

    // Inter font fallback via Google Fonts only if not locally available
    wp_enqueue_style('admiral-gems-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', [], null);

    wp_enqueue_script('admiral-gems-main', get_template_directory_uri() . '/assets/js/main.js', [], $theme_version, true);

    // Pass data to JS
    wp_localize_script('admiral-gems-main', 'AdmiralGems', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url('/'),
    ]);
});

// Hint preconnect for Google Fonts
add_filter('wp_resource_hints', function ($hints, $relation) {
    if ($relation === 'preconnect') {
        $hints[] = 'https://fonts.gstatic.com';
        $hints[] = 'https://fonts.googleapis.com';
    }
    return $hints;
}, 10, 2);

// Simple contact form handler (AJAX)
function admiral_gems_handle_contact() {
    check_ajax_referer('admiral_gems_contact', 'nonce');

    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $message = isset($_POST['message']) ? wp_kses_post($_POST['message']) : '';

    if (empty($name) || empty($email) || empty($message) || !is_email($email)) {
        wp_send_json_error(['message' => __('Por favor completa todos los campos correctamente.', 'admiral-gems-uruguay')], 400);
    }

    $admin_email = get_option('admin_email');
    $subject = 'Nuevo mensaje desde Admiral Gems Uruguay';
    $headers = ['Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>'];
    $body = '<h2>Contacto</h2>'
        . '<p><strong>Nombre:</strong> ' . esc_html($name) . '</p>'
        . '<p><strong>Email:</strong> ' . esc_html($email) . '</p>'
        . '<p><strong>Mensaje:</strong><br>' . nl2br(wp_kses_post($message)) . '</p>';

    $sent = wp_mail($admin_email, $subject, $body, $headers);
    if ($sent) {
        wp_send_json_success(['message' => __('Mensaje enviado. Gracias por contactarnos.', 'admiral-gems-uruguay')]);
    }
    wp_send_json_error(['message' => __('No se pudo enviar el mensaje. Intenta más tarde.', 'admiral-gems-uruguay')], 500);
}
add_action('wp_ajax_admiral_gems_contact', 'admiral_gems_handle_contact');
add_action('wp_ajax_nopriv_admiral_gems_contact', 'admiral_gems_handle_contact');

// SEO: basic meta + Open Graph in head
add_action('wp_head', function () {
    $desc = 'Premium Uruguayan amethyst and agate. Minimalist elegance, geological perfection.';
    $site_name = get_bloginfo('name');
    $site_url = home_url('/');
    $logo = get_theme_file_uri('/assets/og-default.png');
    ?>
    <meta name="description" content="<?php echo esc_attr($desc); ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo esc_url($site_url); ?>" />
    <meta property="og:title" content="<?php echo esc_attr($site_name); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($desc); ?>" />
    <meta property="og:image" content="<?php echo esc_url($logo); ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Admiral Gems Uruguay",
        "url": "<?php echo esc_url($site_url); ?>",
        "sameAs": [
            "https://www.instagram.com/admiral_gems/"
        ]
    }
    </script>
    <?php
});

// Allow SVG upload for simple logo use (optional)
add_filter('upload_mimes', function ($mimes) {
    if (current_user_can('manage_options')) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
});



