<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>

<section class="hero section">
	<div class="container hero-inner">
		<div class="logo-large reveal-scale" aria-hidden="true">
			<img src="<?php echo esc_url( get_theme_file_uri('assets/logo-transparent.png') ); ?>" alt="Admiral Gems Uruguay" style="height:200px; width:auto; display:block;">
		</div>
		<h1 class="reveal">Unearth the magic of<br>Uruguayan amethyst and agate</h1>
		<p class="tagline reveal" data-i18n="hero_tagline">Straight from the source, each stunning geode and vibrant crystal shares a millions-year-old story.</p>
		<div class="trust-badges reveal" style="display: flex; justify-content: center; gap: 16px; margin: 24px 0; flex-wrap: wrap;">
			<span class="badge-pill">Direct from Source</span>
			<span class="badge-pill">Family Owned & Operated</span>
			<span class="badge-pill">Soil Restoration Guaranteed</span>
			<span class="badge-pill">Artigas, Uruguay</span>
		</div>
		<div class="reveal">
			<a class="btn" href="#contact" data-i18n="cta_contact">Request Catalog</a>
			<a class="btn glass" href="#collection" style="margin-left: 16px;" data-i18n="cta_collection">View Collection</a>
		</div>
	</div>
</section>

<section class="section products-section" id="featured">
	<div class="container">
		<div class="products-header reveal">
			<h2 class="gradient-text">Exceptional Specimens</h2>
			<p data-i18n="products_sub">Experience the unique beauty of Uruguayan geodes, featuring the striking combination of world's finest Amethyst and polished Agate.</p>
		</div>
		<div class="products-grid stagger-container reveal">
			<?php 
			$feat = [
				['img' => 'specimen-3', 'title' => 'Deep Purple Cathedral Geodes', 'desc' => 'Spectacular cathedral formations with intense purple saturation. Each piece hand-selected from our Artigas mines for exceptional color depth and crystal clarity.'],
				['img' => 'specimen-4', 'title' => 'Premium Cut Base Amethysts', 'desc' => 'Polished cut base specimens showcasing Uruguay\'s signature deep purple. Perfect for collectors and interior design with stable display bases.'],
				['img' => 'specimen-1', 'title' => 'Natural Amethyst Clusters', 'desc' => 'Untouched natural clusters displaying the raw beauty of Uruguayan amethyst. Vibrant purple crystals formed over 130 million years in volcanic conditions.'],
				['img' => 'specimen-2', 'title' => 'Polished Agate & Amethyst Geodes', 'desc' => 'Stunning combination pieces featuring polished agate exterior with deep purple amethyst interior. Nature\'s artistry at its finest from our family mines.'],
			];
			foreach ($feat as $f):
				$base = 'assets/img/products/' . $f['img'];
				$jpg = get_theme_file_path($base . '.jpg');
				$jpeg = get_theme_file_path($base . '.jpeg');
				$fallback = file_exists($jpg) ? get_theme_file_uri($base . '.jpg') : (file_exists($jpeg) ? get_theme_file_uri($base . '.jpeg') : '');
			?>
			<div class="product-card stagger-item">
				<div class="product-media">
					<?php if ($fallback): ?>
					<picture>
						<?php if (file_exists(get_theme_file_path($base . '/webp/' . $f['img'] . '-480.webp'))): ?>
						<source type="image/webp" srcset="<?php echo esc_url( get_theme_file_uri($base . '/webp/' . $f['img'] . '-480.webp') ); ?> 480w, <?php echo esc_url( get_theme_file_uri($base . '/webp/' . $f['img'] . '-800.webp') ); ?> 800w, <?php echo esc_url( get_theme_file_uri($base . '/webp/' . $f['img'] . '-1200.webp') ); ?> 1200w" sizes="(max-width: 640px) 100vw, 33vw">
						<?php endif; ?>
						<img src="<?php echo esc_url($fallback); ?>" alt="<?php echo esc_attr($f['title']); ?>" loading="lazy">
					</picture>
					<?php endif; ?>
				</div>
				<div class="product-caption">
					<h3><?php echo esc_html($f['title']); ?></h3>
					<p><?php echo esc_html($f['desc']); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Products listing from Product web -->
<section class="section" id="collection">
	<div class="container">
		<div class="products-header reveal">
			<h2 class="gradient-text">Deep purple collection</h2>
			<p>Each piece is carefully selected, showcasing the world's best-in-class specimens. Available in multiple quality grades to suit collectors and designers.</p>
		</div>
		<div class="products-grid stagger-container reveal">
			<?php 
			$map = [
				'pieces' => 'Pieces',
				'cut-base' => 'Cut Base',
				'agate-polished-cut-base' => 'Agate Polished Cut Base',
				'heart' => 'Heart',
				'amethyst-cluster' => 'Cluster',
				'geode-assembled' => 'Jewelry Box Geode',
				'geode-natural' => 'Natural Geode',
				'formation' => 'Formation',
				'citrine' => 'Citrine',
				'rainbow' => 'Rainbow',
				'gems' => 'Gems',
				'special-calcite' => 'Special pieces and calcite',
			];
			foreach ($map as $slug => $title):
				$base = 'assets/img/products/' . $slug;
				$jpg = get_theme_file_path($base . '.jpg');
				$jpeg = get_theme_file_path($base . '.jpeg');
				$fallback = file_exists($jpg) ? get_theme_file_uri($base . '.jpg') : (file_exists($jpeg) ? get_theme_file_uri($base . '.jpeg') : '');
				if (!$fallback) { continue; }
				$badges = ['EXTRA','Q1','Q2','Q3','Q4','Q5'];
				if ($slug === 'gems') { $badges = ['EXTRA']; }
				elseif ($slug === 'rainbow') { $badges = ['EXTRA','Q1','Q2']; }
			?>
			<div class="product-card stagger-item">
				<div class="product-media">
					<picture>
						<?php if (file_exists(get_theme_file_path($base . '/webp/' . $slug . '-480.webp'))): ?>
						<source type="image/webp" srcset="<?php echo esc_url( get_theme_file_uri($base . '/webp/' . $slug . '-480.webp') ); ?> 480w, <?php echo esc_url( get_theme_file_uri($base . '/webp/' . $slug . '-800.webp') ); ?> 800w, <?php echo esc_url( get_theme_file_uri($base . '/webp/' . $slug . '-1200.webp') ); ?> 1200w" sizes="(max-width: 640px) 100vw, 33vw">
						<?php endif; ?>
						<img src="<?php echo esc_url($fallback); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
					</picture>
				</div>
				<div class="product-caption">
					<h3><?php echo esc_html($title); ?></h3>
					<div class="quality-badges" aria-label="Available quality grades">
						<?php foreach ($badges as $b): $cls = strtolower($b); ?>
						<span class="badge badge-<?php echo $cls === 'extra' ? 'extra' : $cls; ?>"><?php echo $b; ?></span>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="center" style="margin-top:32px;">
			<a class="btn" href="https://wa.me/59895052840?text=<?php echo rawurlencode('Hola, me interesa el catálogo de Deep Purple Amethysts'); ?>" target="_blank" rel="noopener">Request Catalog</a>
		</div>
	</div>
</section>

<!-- Why Uruguay Section -->
<section class="section why-uruguay-section" style="background: linear-gradient(180deg, #FFFFFF 0%, #F5F5F7 100%); padding: 80px 0;">
	<div class="container">
		<div class="why-uruguay-content reveal">
			<h2 style="text-align: center; font-family: 'Montserrat', sans-serif; font-size: clamp(32px, 5vw, 48px); font-weight: 700; margin-bottom: 48px; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Why Uruguayan Amethysts?</h2>
			
			<!-- Map and Text Layout -->
			<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; margin-bottom: 48px;">
				<div class="reveal-scale">
					<img src="<?php echo esc_url( get_theme_file_uri('assets/uy-map.png') ); ?>" alt="Uruguay Map - Artigas" style="width: 100%; height: auto; border-radius: 16px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);">
				</div>
				<div class="reveal">
					<h3 style="font-family: 'Montserrat', sans-serif; font-size: 28px; font-weight: 700; margin-bottom: 20px; color: var(--color-black);">From the Heart of Artigas</h3>
					<p style="font-size: 18px; color: #6e6e73; line-height: 1.7; margin-bottom: 20px;">Uruguay produces the world's finest amethysts with the deepest, most saturated purple color—<strong>10-15% more intense than Brazilian specimens</strong>.</p>
					<p style="font-size: 18px; color: #6e6e73; line-height: 1.7; margin-bottom: 20px;">Our mines in <strong>Artigas, Uruguay</strong> are located in a unique geological region where volcanic activity over 130 million years created the perfect conditions for these exceptional crystals.</p>
					<p style="font-size: 18px; color: #6e6e73; line-height: 1.7;">This small South American nation is home to the world's most coveted amethyst deposits, and we're proud to bring these treasures directly from our family mines to you.</p>
				</div>
			</div>
			
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px; margin-top: 48px;">
				<div class="feature-card reveal" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); text-align: center;">
					<div style="font-size: 48px; margin-bottom: 16px;">💎</div>
					<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; margin-bottom: 12px; color: var(--color-black);">Superior Color Depth</h3>
					<p style="color: #6e6e73; line-height: 1.6; margin: 0;">Uruguayan amethysts display the deepest purple saturation in the world, formed over 130 million years in unique volcanic conditions.</p>
				</div>
				
				<div class="feature-card reveal" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); text-align: center;">
					<div style="font-size: 48px; margin-bottom: 16px;">🌱</div>
					<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; margin-bottom: 12px; color: var(--color-black);">Sustainable Mining</h3>
					<p style="color: #6e6e73; line-height: 1.6; margin: 0;">We are committed to complete soil restoration after mining activities—leaving the land better than we found it.</p>
				</div>
				
				<div class="feature-card reveal" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); text-align: center;">
					<div style="font-size: 48px; margin-bottom: 16px;">👨‍👩‍👦</div>
					<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; margin-bottom: 12px; color: var(--color-black);">Family Heritage</h3>
					<p style="color: #6e6e73; line-height: 1.6; margin: 0;">Two brothers from Artigas carrying on a family tradition of ethical mining and exceptional quality.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section gallery-section" id="gallery">
	<div class="container">
		<div class="products-header reveal">
			<h2 class="gradient-text">Gallery</h2>
			<p>Bringing the beauty of the earth's treasures from the mine to your home</p>
		</div>
		<div class="gallery-grid js-gallery reveal">
			<?php 
			$dir = get_theme_file_path('/assets/galeria');
			$uri_base = get_theme_file_uri('/assets/galeria');
			$files = [];
			if (is_dir($dir)) {
				$files = glob($dir . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE);
			}
			if ($files) :
				foreach ($files as $i => $path) :
					$filename = basename($path);
					$src = trailingslashit($uri_base) . rawurlencode($filename);
				?>
				<a class="gallery-item" href="<?php echo esc_url($src); ?>" data-index="<?php echo esc_attr($i); ?>">
					<img src="<?php echo esc_url($src); ?>" alt="Gallery image <?php echo esc_attr($i+1); ?>" loading="lazy">
				</a>
				<?php endforeach; else : ?>
				<p class="muted">Add images into <code>assets/galeria</code> to populate the gallery.</p>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section philosophy-section" id="our-story">
	<div class="container">
		<div class="philosophy reveal-scale">
			<h2>Our Story: A Family Commitment to the Land</h2>
			<p>Admiral Gems Uruguay is a family business run by two brothers from Artigas, Uruguay—the heart of the world's finest amethyst deposits. We are deeply connected to these lands and understand that our privilege to extract these natural treasures comes with a profound responsibility to future generations.</p>
			<p><strong>Our Commitment:</strong> Complete soil restoration after every mining activity. We don't just extract—we restore. When our work is done, the land returns to productive use for agriculture and local communities. This is not just a promise; it's our way of honoring the earth that gives us these magnificent gems.</p>
			<p><em>From our family mines to your home—every amethyst carries a story of beauty, responsibility, and the deep purple magic of Uruguay.</em></p>
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; margin-top: 40px; text-align: center;">
				<div style="padding: 20px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 48px; font-weight: 700; color: var(--color-admiral-blue); font-family: 'Montserrat', sans-serif;">130M+</div>
					<div style="font-size: 14px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Years of Geological Formation</div>
				</div>
				<div style="padding: 20px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 48px; font-weight: 700; color: var(--color-admiral-blue); font-family: 'Montserrat', sans-serif;">100%</div>
					<div style="font-size: 14px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Soil Restoration Commitment</div>
				</div>
				<div style="padding: 20px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 48px; font-weight: 700; color: var(--color-admiral-blue); font-family: 'Montserrat', sans-serif;">Family</div>
					<div style="font-size: 14px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Owned & Operated</div>
				</div>
				<div style="padding: 20px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 48px; font-weight: 700; color: var(--color-admiral-blue); font-family: 'Montserrat', sans-serif;">Artigas</div>
					<div style="font-size: 14px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Uruguay's Amethyst Capital</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section" id="contact">
	<div class="container contact">
		<div class="card reveal">
			<h3>Get in Touch</h3>
			<p class="meta">
				<span class="pill">📍 Artigas · Uruguay</span>
				<br><br>
				<strong>Instagram</strong><br>
				<a href="https://www.instagram.com/admiral_gems/" target="_blank" rel="noopener">@admiral_gems</a>
				<br><br>
				<strong>Email</strong><br>
				<?php $contact_email = 'admiralgemsuruguay@gmail.com'; ?>
				<a href="mailto:<?php echo esc_attr($contact_email); ?>"><?php echo esc_html($contact_email); ?></a>
				<br><br>
				<strong>WhatsApp</strong><br>
				<a href="https://wa.me/59895052840" target="_blank" rel="noopener">+598 950 528 40</a>
			</p>
		</div>
		<div class="card reveal">
			<h3>Request Information</h3>
			<form class="contact-form" id="admiral-gems-form">
				<div class="row">
					<input type="text" name="name" placeholder="Your name" required>
					<input type="email" name="email" placeholder="Email address" required>
				</div>
				<textarea name="message" placeholder="Describe the piece you're looking for..." required></textarea>
				<input type="hidden" name="action" value="admiral_gems_contact">
				<input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce('admiral_gems_contact') ); ?>">
				<button class="btn" type="submit">Send Message</button>
				<p class="form-status" aria-live="polite"></p>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
