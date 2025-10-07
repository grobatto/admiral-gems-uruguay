<?php if (!defined('ABSPATH')) { exit; } ?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header" style="background: rgba(255,255,255,.9);">
	<div class="container">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="brand" aria-label="Admiral Gems Uruguay">
			<span class="brand-mark" aria-hidden="true">
				<img src="<?php echo esc_url( get_theme_file_uri('assets/logo-transparent.png') ); ?>" alt="Admiral Gems Uruguay" style="height:96px; width:auto; display:block;">
			</span>
			<span class="brand-name">Admiral Gems Uruguay</span>
		</a>
	</div>
</header>

<div class="whatsapp-float" aria-label="WhatsApp">
	<a href="https://wa.me/59895052840" target="_blank" rel="noopener" aria-label="Contactar por WhatsApp +59895052840">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff" aria-hidden="true">
			<path d="M380.9 97.1C339 55.1 283.2 32 224.8 32c-117.7 0-213.3 95.6-213.3 213.3 0 37.6 9.8 74.4 28.4 106.9L0 480l130.7-38.3c31.6 17.3 67.3 26.4 103.9 26.4h.1c117.6 0 213.3-95.6 213.3-213.3 0-58.4-22.7-113.2-64.6-155.3zM224.7 438.6c-31.1 0-61.6-8.4-88.1-24.4l-6.3-3.7-77.6 22.7 22-75.6-4-7c-17.8-29-27.2-62.4-27.2-96.6 0-103.6 84.3-187.9 187.9-187.9 50.1 0 97.2 19.5 132.6 55 35.4 35.4 54.9 82.5 54.9 132.6-.1 103.5-84.4 187.9-188.2 187.9zm101.3-138.7c-5.5-2.8-32.6-16.1-37.7-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.4 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-5.5-2.8-23.2-8.5-44.2-27.1-16.3-14.5-27.3-32.4-30.5-37.9-3.2-5.6-.3-8.6 2.4-11.4 2.5-2.5 5.6-6.5 8.4-9.7 2.8-3.2 3.7-5.6 5.6-9.3 1.9-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30-17.1-41.1-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.5 19.1-19.5 46.6 0 27.6 20 54.3 22.8 58 2.8 3.7 39.4 60.2 95.4 84.5 13.3 5.7 23.7 9.1 31.8 11.6 13.4 4.3 25.6 3.7 35.2 2.2 10.7-1.6 32.6-13.3 37.2-26.1 4.6-12.8 4.6-23.7 3.2-26.1-1.3-2.4-5.1-3.9-10.6-6.7z"/>
		</svg>
	</a>
</div>

<main id="content">
