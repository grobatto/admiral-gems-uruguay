<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>

<section class="hero section" style="background: #000000; color: white; min-height: 100vh; display: flex; align-items: center; padding: 120px 0; position: relative; overflow: hidden;">
	<!-- Subtle gradient overlay -->
	<div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 50% 50%, rgba(147, 51, 234, 0.15) 0%, transparent 70%); z-index: 0;"></div>
	
	<div class="container hero-inner" style="position: relative; z-index: 1;">
		<div class="logo-large reveal-scale" aria-hidden="true" style="margin-bottom: 56px;">
			<img src="<?php echo esc_url( get_theme_file_uri('assets/logo-transparent.png') ); ?>" alt="Admiral Gems Uruguay" style="height:280px; width:auto; display:block; margin: 0 auto; filter: brightness(0) invert(1) drop-shadow(0 0 40px rgba(147, 51, 234, 0.6)) drop-shadow(0 0 80px rgba(88, 28, 135, 0.4));">
		</div>
		<h1 class="reveal" style="background: linear-gradient(135deg, #FFFFFF 0%, #E0E0E0 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-size: clamp(36px, 5vw, 64px); margin-bottom: 32px; font-weight: 600;">Premium Uruguayan Amethysts<br>Direct from Artigas Source</h1>
		<p class="tagline reveal" data-i18n="hero_tagline" style="color: rgba(255, 255, 255, 0.7); font-size: clamp(18px, 3vw, 24px); max-width: 700px; margin: 0 auto 48px;">Superior quality, direct sourcing, global shipping.<br>Professional wholesale for collectors, designers, and retailers.</p>
		
		<div class="reveal" style="margin-bottom: 32px;">
			<a class="btn" href="#contact" data-i18n="cta_contact" style="background: linear-gradient(135deg, #9333EA 0%, #581C87 100%); padding: 18px 48px; font-size: 18px; box-shadow: 0 8px 32px rgba(147, 51, 234, 0.5);">Request Wholesale Quote</a>
			<a class="btn glass" href="#collection" style="margin-left: 16px; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); color: white; padding: 18px 48px; font-size: 18px;" data-i18n="cta_collection">View Catalog</a>
		</div>
		
		<div class="reveal" style="margin-top: 64px; font-size: 15px; color: rgba(255, 255, 255, 0.6); display: flex; justify-content: center; gap: 32px; flex-wrap: wrap;">
			<span>⚡ 24h response</span>
			<span>·</span>
			<span>📦 Secure packaging</span>
			<span>·</span>
			<span>🌍 Worldwide</span>
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
				['img' => 'specimen-3', 'title' => 'Deep Purple Cathedral Geodes', 'desc' => 'Spectacular cathedral formations with intense purple saturation. Each piece hand-selected from Artigas region for exceptional color depth and crystal clarity.', 'size' => '2-25kg', 'use' => 'Collectors & Premium Design', 'quality' => 'Q1-EXTRA', 'use_desc' => 'Ideal for luxury hotel lobbies, high-end residential spaces, and premium private collections.'],
				['img' => 'specimen-4', 'title' => 'Premium Cut Base Amethysts', 'desc' => 'Polished cut base specimens showcasing Uruguay\'s signature deep purple. Perfect for collectors and interior design with stable display bases.', 'size' => '3-15kg', 'use' => 'Interior Design & Display', 'quality' => 'Q1-EXTRA', 'use_desc' => 'Perfect for commercial showrooms, boutique retail displays, and sophisticated home décor.'],
				['img' => 'specimen-1', 'title' => 'Natural Amethyst Clusters', 'desc' => 'Untouched natural clusters displaying the raw beauty of Uruguayan amethyst. Vibrant purple crystals formed over 130 million years in volcanic conditions.', 'size' => '1-20kg', 'use' => 'Retail & Wholesale', 'quality' => 'EXTRA-Q3', 'use_desc' => 'Popular choice for crystal shops, wellness centers, and corporate gift programs.'],
				['img' => 'specimen-2', 'title' => 'Polished Agate & Amethyst Geodes', 'desc' => 'Stunning combination pieces featuring polished agate exterior with deep purple amethyst interior. Nature\'s artistry at its finest from Artigas region.', 'size' => '5-30kg', 'use' => 'Statement Pieces', 'quality' => 'EXTRA-Q2', 'use_desc' => 'Exceptional for luxury spa environments, gallery exhibitions, and distinguished private collections.'],
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
					<div class="product-meta" style="margin-top: 16px; padding-top: 16px; border-top: 1px solid rgba(0,0,0,0.1);">
						<div style="display: flex; gap: 16px; font-size: 13px; color: #6e6e73; flex-wrap: wrap;">
							<span>📏 <strong><?php echo esc_html($f['size']); ?></strong></span>
							<span>🎯 <strong><?php echo esc_html($f['use']); ?></strong></span>
							<span>💎 <strong><?php echo esc_html($f['quality']); ?></strong></span>
						</div>
						<p style="font-size: 13px; margin-top: 12px; font-style: italic; color: #4a4a4a; margin-bottom: 0;">
							<?php echo esc_html($f['use_desc']); ?>
						</p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Products listing from Product web -->
<section class="section" id="collection" style="background: linear-gradient(180deg, #0a0a0a 0%, #1a0a2e 50%, #0a0a0a 100%); color: white; position: relative; overflow: hidden;">
	<!-- Gradient overlay -->
	<div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 30% 50%, rgba(147, 51, 234, 0.1) 0%, transparent 50%), radial-gradient(circle at 70% 80%, rgba(88, 28, 135, 0.08) 0%, transparent 60%); z-index: 0;"></div>
	<div class="container" style="position: relative; z-index: 1;">
		<div class="products-header reveal">
			<h2 style="background: linear-gradient(135deg, #C084FC 0%, #9333EA 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-family: 'Montserrat', sans-serif; font-size: clamp(32px, 5vw, 48px); font-weight: 700;">Deep purple collection</h2>
			<p style="color: rgba(255, 255, 255, 0.7);">Each piece is carefully selected, showcasing the world's best-in-class specimens. Available in multiple quality grades to suit collectors and designers.</p>
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
			<a class="btn" href="https://wa.me/59895052840?text=<?php echo rawurlencode('Hello, I need a wholesale catalog for Deep Purple Amethysts'); ?>" target="_blank" rel="noopener" style="background: linear-gradient(135deg, #9333EA 0%, #581C87 100%); box-shadow: 0 8px 32px rgba(147, 51, 234, 0.5);">Download Wholesale Catalog</a>
			<p style="margin-top: 16px; font-size: 14px; color: rgba(255, 255, 255, 0.6); font-style: italic;">Professional response within 24 hours</p>
		</div>
	</div>
</section>

<!-- Featured Sustainability Section -->
<section class="section sustainability-featured" style="background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%); padding: 100px 0;">
	<div class="container">
		<div class="reveal-scale" style="text-align: center; margin-bottom: 48px;">
			<h2 style="font-family: 'Montserrat', sans-serif; font-size: clamp(36px, 5vw, 52px); font-weight: 700; color: #1D1D1F; margin-bottom: 24px; letter-spacing: -0.02em;">
				🌱 Committed to Environmental Restoration
			</h2>
			<p style="font-size: 20px; color: #4a4a4a; max-width: 800px; margin: 0 auto; line-height: 1.6;">
				Admiral Gems maintains an unwavering commitment to complete soil restoration. We ensure every sourced area returns to productive agricultural use.
			</p>
		</div>
		
		<!-- 3-column process grid -->
		<div class="stagger-container reveal" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; margin-bottom: 64px;">
			<div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border-radius: 24px; padding: 40px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);" class="stagger-item">
				<div style="font-size: 64px; margin-bottom: 20px;">⛏️</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 22px; font-weight: 600; color: #1D1D1F; margin-bottom: 16px;">Responsible Extraction</h3>
				<p style="color: #4a4a4a; font-size: 16px; line-height: 1.6; margin: 0;">Selective sourcing from Artigas region with minimal environmental impact</p>
			</div>
			
			<div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border-radius: 24px; padding: 40px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);" class="stagger-item">
				<div style="font-size: 64px; margin-bottom: 20px;">🌱</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 22px; font-weight: 600; color: #1D1D1F; margin-bottom: 16px;">Complete Soil Restoration</h3>
				<p style="color: #4a4a4a; font-size: 16px; line-height: 1.6; margin: 0;">Comprehensive land rehabilitation with fertile soil reconstruction</p>
			</div>
			
			<div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); border-radius: 24px; padding: 40px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);" class="stagger-item">
				<div style="font-size: 64px; margin-bottom: 20px;">🌾</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 22px; font-weight: 600; color: #1D1D1F; margin-bottom: 16px;">Productive Land</h3>
				<p style="color: #4a4a4a; font-size: 16px; line-height: 1.6; margin: 0;">Restored areas suitable for agricultural and pastoral use</p>
			</div>
		</div>
		
		<!-- Corporate commitment statement -->
		<div class="reveal" style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(20px); border-radius: 24px; padding: 48px; max-width: 900px; margin: 0 auto; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1); text-align: center;">
			<p style="font-size: 18px; color: #1D1D1F; line-height: 1.7; margin-bottom: 24px;">
				At Admiral Gems, environmental stewardship is integral to our operations. We don't just source exceptional amethysts — we ensure complete soil restoration, leaving land productive for future agricultural use. This commitment defines our operational standard.
			</p>
			<p style="font-family: 'Playfair Display', serif; font-style: italic; font-size: 16px; color: #6e6e73; margin: 0;">
				— Admiral Gems Uruguay, Artigas
			</p>
		</div>
	</div>
</section>

<section class="section gallery-section" id="gallery">
	<div class="container">
		<div class="products-header reveal">
			<h2 class="gradient-text">Gallery</h2>
			<p>Bringing the beauty of the earth's treasures from Artigas to worldwide destinations</p>
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
					<p style="font-size: 18px; color: #6e6e73; line-height: 1.7; margin-bottom: 20px;">Uruguayan amethysts demonstrate <strong>10-15% higher color saturation</strong> than Brazilian specimens, attributed to unique geological conditions formed over 130 million years in the Artigas region.</p>
					<p style="font-size: 18px; color: #6e6e73; line-height: 1.7; margin-bottom: 20px;">Sourced from <strong>Artigas, Uruguay</strong> — a unique geological region where volcanic activity over 130 million years created the perfect conditions for these exceptional crystals.</p>
					<p style="font-size: 18px; color: #6e6e73; line-height: 1.7;">This small South American nation is home to the world's most coveted amethyst deposits, and we provide direct access to these premium specimens for professional buyers worldwide.</p>
				</div>
			</div>
			
			<!-- Comparison Grid with Progress Bars -->
			<div style="background: rgba(255, 255, 255, 0.9); border-radius: 24px; padding: 40px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08); margin-top: 48px;" class="reveal">
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 32px; color: var(--color-black);">Quality Comparison</h3>
				
				<!-- Color Intensity -->
				<div style="margin-bottom: 32px;">
					<h4 style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 600; margin-bottom: 16px; color: var(--color-black);">Color Intensity</h4>
					<div style="display: grid; gap: 12px;">
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 600; color: #1D1D1F;">Uruguay</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 100%; height: 100%; background: linear-gradient(90deg, #764ba2 0%, #667eea 100%); border-radius: 999px;"></div>
							</div>
							<span style="min-width: 140px; font-size: 13px; color: #6e6e73;">Deep Purple Saturation</span>
						</div>
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 500; color: #6e6e73;">Brazil</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 60%; height: 100%; background: linear-gradient(90deg, #9B59B6 0%, #8E44AD 100%); border-radius: 999px;"></div>
							</div>
							<span style="min-width: 140px; font-size: 13px; color: #6e6e73;">Medium Purple</span>
						</div>
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 500; color: #6e6e73;">South Africa</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 40%; height: 100%; background: #C8B4D9; border-radius: 999px;"></div>
							</div>
							<span style="min-width: 140px; font-size: 13px; color: #6e6e73;">Light Purple</span>
						</div>
					</div>
				</div>
				
				<!-- Crystal Clarity -->
				<div style="margin-bottom: 32px;">
					<h4 style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 600; margin-bottom: 16px; color: var(--color-black);">Crystal Clarity</h4>
					<div style="display: grid; gap: 12px;">
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 600; color: #1D1D1F;">Uruguay</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 100%; height: 100%; background: linear-gradient(90deg, #0066CC 0%, #0051a2 100%); border-radius: 999px;"></div>
							</div>
						</div>
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 500; color: #6e6e73;">Brazil</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 80%; height: 100%; background: rgba(0, 102, 204, 0.7); border-radius: 999px;"></div>
							</div>
						</div>
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 500; color: #6e6e73;">South Africa</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 60%; height: 100%; background: rgba(0, 102, 204, 0.5); border-radius: 999px;"></div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Formation Size -->
				<div style="margin-bottom: 32px;">
					<h4 style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 600; margin-bottom: 16px; color: var(--color-black);">Formation Size</h4>
					<div style="display: grid; gap: 12px;">
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 600; color: #1D1D1F;">Uruguay</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 100%; height: 100%; background: linear-gradient(90deg, #2e7d32 0%, #43a047 100%); border-radius: 999px;"></div>
							</div>
							<span style="min-width: 140px; font-size: 13px; color: #6e6e73;">Large Cathedrals</span>
						</div>
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 500; color: #6e6e73;">Brazil</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 80%; height: 100%; background: rgba(46, 125, 50, 0.7); border-radius: 999px;"></div>
							</div>
							<span style="min-width: 140px; font-size: 13px; color: #6e6e73;">Medium Formations</span>
						</div>
						<div style="display: flex; align-items: center; gap: 16px;">
							<span style="min-width: 120px; font-size: 14px; font-weight: 500; color: #6e6e73;">South Africa</span>
							<div style="flex: 1; height: 10px; background: #E5E5EA; border-radius: 999px; overflow: hidden;">
								<div style="width: 60%; height: 100%; background: rgba(46, 125, 50, 0.5); border-radius: 999px;"></div>
							</div>
							<span style="min-width: 140px; font-size: 13px; color: #6e6e73;">Small Clusters</span>
						</div>
					</div>
				</div>
				
				<!-- Market Value -->
				<div>
					<h4 style="font-family: 'Montserrat', sans-serif; font-size: 16px; font-weight: 600; margin-bottom: 16px; color: var(--color-black);">Market Value</h4>
					<div style="display: flex; justify-content: space-around; text-align: center;">
						<div>
							<div style="font-size: 28px; font-weight: 700; color: #2e7d32; font-family: 'Montserrat', sans-serif; margin-bottom: 8px;">Premium</div>
							<div style="font-size: 14px; font-weight: 600; color: #1D1D1F;">Uruguay</div>
						</div>
						<div>
							<div style="font-size: 22px; font-weight: 600; color: #6e6e73; font-family: 'Montserrat', sans-serif; margin-bottom: 8px;">Standard</div>
							<div style="font-size: 14px; font-weight: 500; color: #6e6e73;">Brazil</div>
						</div>
						<div>
							<div style="font-size: 18px; font-weight: 500; color: #a0a0a0; font-family: 'Montserrat', sans-serif; margin-bottom: 8px;">Economic</div>
							<div style="font-size: 14px; font-weight: 500; color: #6e6e73;">South Africa</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- How to Buy Section -->
<section class="section how-to-buy-section" style="background: linear-gradient(135deg, #F5F5F7 0%, #FFFFFF 100%); padding: 100px 0;">
	<div class="container">
		<div class="reveal" style="text-align: center; margin-bottom: 64px;">
			<h2 style="font-family: 'Montserrat', sans-serif; font-size: clamp(36px, 5vw, 48px); font-weight: 700; color: #1D1D1F; margin-bottom: 16px; letter-spacing: -0.02em;">Professional Wholesale Process</h2>
			<p style="font-size: 20px; color: #6e6e73; max-width: 700px; margin: 0 auto;">Simple, transparent, and professional — from inquiry to delivery</p>
		</div>
		
		<!-- 4-step grid -->
		<div class="stagger-container reveal" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; margin-bottom: 48px;">
			<div style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); position: relative;" class="stagger-item">
				<div style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 700; font-family: 'Montserrat', sans-serif; margin: 0 auto 20px;">1</div>
				<div style="font-size: 48px; margin-bottom: 16px;">📋</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; color: #1D1D1F; margin-bottom: 12px;">Submit Inquiry</h3>
				<p style="color: #6e6e73; font-size: 15px; line-height: 1.6; margin: 0;">Contact us via WhatsApp, email, or form. Specify piece types, quantities, quality grades, and destination.</p>
			</div>
			
			<div style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); position: relative;" class="stagger-item">
				<div style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 700; font-family: 'Montserrat', sans-serif; margin: 0 auto 20px;">2</div>
				<div style="font-size: 48px; margin-bottom: 16px;">📄</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; color: #1D1D1F; margin-bottom: 12px;">Receive Detailed Quote</h3>
				<p style="color: #6e6e73; font-size: 15px; line-height: 1.6; margin: 0;">Comprehensive PDF catalog with specimen photos, per-kilo pricing, and available quality grades (EXTRA to Q5).</p>
			</div>
			
			<div style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); position: relative;" class="stagger-item">
				<div style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 700; font-family: 'Montserrat', sans-serif; margin: 0 auto 20px;">3</div>
				<div style="font-size: 48px; margin-bottom: 16px;">✅</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; color: #1D1D1F; margin-bottom: 12px;">Confirm Order</h3>
				<p style="color: #6e6e73; font-size: 15px; line-height: 1.6; margin: 0;">Select your pieces. Secure payment via international wire transfer or arranged terms for established accounts.</p>
			</div>
			
			<div style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; text-align: center; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06); position: relative;" class="stagger-item">
				<div style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 700; font-family: 'Montserrat', sans-serif; margin: 0 auto 20px;">4</div>
				<div style="font-size: 48px; margin-bottom: 16px;">📦</div>
				<h3 style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 600; color: #1D1D1F; margin-bottom: 12px;">Secure Logistics</h3>
				<p style="color: #6e6e73; font-size: 15px; line-height: 1.6; margin: 0;">Professional packaging with insurance. Complete tracking to your location worldwide.</p>
			</div>
		</div>
		
		<!-- Info card -->
		<div class="reveal" style="background: rgba(255, 255, 255, 0.9); border-radius: 20px; padding: 32px; max-width: 800px; margin: 0 auto; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);">
			<div style="display: grid; gap: 16px; font-size: 16px; color: #4a4a4a;">
				<div style="display: flex; align-items: center; gap: 12px;">
					<span style="font-size: 24px;">💡</span>
					<span><strong>Minimum wholesale order:</strong> 5kg for international shipping</span>
				</div>
				<div style="display: flex; align-items: center; gap: 12px;">
					<span style="font-size: 24px;">📦</span>
					<span><strong>Standard delivery:</strong> 15-25 days depending on destination</span>
				</div>
				<div style="display: flex; align-items: center; gap: 12px;">
					<span style="font-size: 24px;">🛡️</span>
					<span><strong>Transit guarantee:</strong> Full replacement for any transit damage</span>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section philosophy-section" id="our-story">
	<div class="container">
		<div class="philosophy reveal-scale">
			<h2>Our Commitment to Quality and Environment</h2>
			<p>Admiral Gems Uruguay is a professional wholesale operation based in Artigas, the epicenter of the world's finest amethyst deposits. We specialize in direct sourcing of premium-grade Uruguayan amethysts, maintaining rigorous quality standards through our comprehensive EXTRA-Q5 certification system.</p>
			<p>Our commitment extends beyond exceptional gemstones. We ensure complete environmental restoration of all sourced mining areas, guaranteeing that land returns to productive agricultural use. This environmental stewardship isn't merely responsibility — it's our operational standard and competitive advantage.</p>
			<p><em>From Artigas to your destination worldwide — every piece represents uncompromising quality, direct sourcing benefits, and demonstrable environmental responsibility. We serve wholesalers, designers, and collectors who demand both premium quality and ethical sourcing.</em></p>
			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; margin-top: 48px; text-align: center;">
				<div style="padding: 32px 24px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 64px; font-weight: 700; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-family: 'Montserrat', sans-serif;">130M+</div>
					<div style="font-size: 13px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Years of Geological Formation</div>
				</div>
				<div style="padding: 32px 24px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 64px; font-weight: 700; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-family: 'Montserrat', sans-serif;">15+</div>
					<div style="font-size: 13px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Export Countries</div>
				</div>
				<div style="padding: 32px 24px; background: rgba(255, 255, 255, 0.5); border-radius: 16px;">
					<div style="font-size: 64px; font-weight: 700; background: linear-gradient(135deg, var(--color-admiral-blue) 0%, var(--color-amethyst) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-family: 'Montserrat', sans-serif;">100%</div>
					<div style="font-size: 13px; color: #6e6e73; margin-top: 8px; font-weight: 600;">Soil Restoration Commitment</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section" id="contact">
	<div class="container contact">
		<div class="card reveal">
			<h3>Wholesale Inquiries</h3>
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
			<h3>Request Wholesale Quote</h3>
			<p style="font-size: 14px; color: #6e6e73; margin-bottom: 20px; font-style: italic;">Professional wholesale inquiries receive priority response within 24 hours.</p>
			<form class="contact-form" id="admiral-gems-form">
				<div class="row">
					<input type="text" name="name" placeholder="Your name" required>
					<input type="email" name="email" placeholder="Email address" required>
				</div>
				<textarea name="message" placeholder="Describe your wholesale requirements: piece types, quantity (kg), quality grades (EXTRA-Q5), destination country, intended use..." required></textarea>
				<input type="hidden" name="action" value="admiral_gems_contact">
				<input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce('admiral_gems_contact') ); ?>">
				<button class="btn" type="submit">Submit Inquiry</button>
				<p class="form-status" aria-live="polite"></p>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
