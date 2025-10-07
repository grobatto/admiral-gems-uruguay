(function(){
	'use strict';
	
	// Soft parallax on inner elements (no layout shift)
	function initParallax() {
		const logo = document.querySelector('.hero .logo-large');
		const headline = document.querySelector('.hero h1');
		const tagline = document.querySelector('.hero .tagline');
		const parallaxItems = document.querySelectorAll('.parallax-item');
		if (!logo && !headline && !tagline && !parallaxItems.length) return;
		
		window.addEventListener('scroll', function() {
			const scrolled = window.pageYOffset;
			const shift = Math.min(scrolled / 10, 30); // cap shift
			if (logo) logo.style.transform = `translateY(${shift * 0.6}px)`;
			if (headline) headline.style.transform = `translateY(${shift * 0.3}px)`;
			if (tagline) tagline.style.transform = `translateY(${shift * 0.2}px)`;
			parallaxItems.forEach(function(el){
				const speed = parseFloat(el.getAttribute('data-speed')) || 0.1;
				el.style.transform = `translateY(${shift * speed}px)`;
			});
		});
	}
	
	// Enhanced reveal animations with stagger
	function initRevealAnimations() {
		const reveals = document.querySelectorAll('.reveal, .reveal-scale, .reveal-fade');
		const staggerContainers = document.querySelectorAll('.stagger-container');
		
		if (!('IntersectionObserver' in window)) {
			reveals.forEach(el => el.classList.add('is-visible'));
			staggerContainers.forEach(el => el.classList.add('is-visible'));
			return;
		}
		
		const observer = new IntersectionObserver(function(entries) {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, { 
			threshold: 0.1,
			rootMargin: '0px 0px -50px 0px'
		});
		
		reveals.forEach(el => observer.observe(el));
		staggerContainers.forEach(el => observer.observe(el));
	}
	
	// Header scroll effect (no hide/show to avoid glitches)
	function initHeaderScroll() {
		const header = document.querySelector('.site-header');
		if (!header) return;
		
		window.addEventListener('scroll', function() {
			const currentScroll = window.pageYOffset;
			if (currentScroll > 50) {
				header.classList.add('scrolled');
			} else {
				header.classList.remove('scrolled');
			}
		});
	}
	
	// Smooth scroll to anchors
	function initSmoothScroll() {
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function(e) {
				e.preventDefault();
				const target = document.querySelector(this.getAttribute('href'));
				if (target) {
					const offset = 90; // header height
					const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
					window.scrollTo({ top: targetPosition, behavior: 'smooth' });
				}
			});
		});
	}
	
	// Enhanced contact form with loading state
	function initContactForm() {
		const form = document.getElementById('admiral-gems-form');
		if (!form) return;
		
		const status = form.querySelector('.form-status');
		const submitBtn = form.querySelector('button[type="submit"]');
		const originalBtnText = submitBtn.textContent;
		
		form.addEventListener('submit', function(e) {
			e.preventDefault();
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<span style="display:inline-block;animation:spin 1s linear infinite;">⌛</span> Sending...';
			status.textContent = '';
			status.className = 'form-status';
			
			const formData = new FormData(form);
			fetch(AdmiralGems.ajaxUrl, { method: 'POST', credentials: 'same-origin', body: formData })
			.then(res => res.json())
			.then(json => {
				if (json && json.success) {
					status.textContent = (json.data && json.data.message) ? json.data.message : 'Message sent successfully!';
					status.className = 'form-status success';
					form.reset();
					form.style.animation = 'pulse 0.5s ease';
					setTimeout(() => form.style.animation = '', 500);
				} else {
					status.textContent = (json && json.data && json.data.message) ? json.data.message : 'Error sending message. Please try again.';
					status.className = 'form-status error';
				}
			})
			.catch(() => {
				status.textContent = 'Network error. Please check your connection.';
				status.className = 'form-status error';
			})
			.finally(() => {
				submitBtn.disabled = false;
				submitBtn.textContent = originalBtnText;
			});
		});
	}
	
	// Magnetic button effect
	function initMagneticButtons() {
		const buttons = document.querySelectorAll('.btn, .whatsapp-float a');
		buttons.forEach(btn => {
			btn.addEventListener('mousemove', function(e) {
				const rect = this.getBoundingClientRect();
				const x = e.clientX - rect.left - rect.width / 2;
				const y = e.clientY - rect.top - rect.height / 2;
				this.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px)`;
			});
			btn.addEventListener('mouseleave', function() { this.style.transform = ''; });
		});
	}
	
	// Image lazy loading with fade effect
	function initLazyImages() {
		const images = document.querySelectorAll('img[loading="lazy"]');
		if ('loading' in HTMLImageElement.prototype) {
			images.forEach(img => { img.addEventListener('load', function() { this.classList.add('loaded'); }); });
		}
	}

	// Lightbox for gallery
	function initLightbox() {
		const gallery = document.querySelector('.js-gallery');
		if (!gallery) return;
		
		const overlay = document.createElement('div');
		overlay.className = 'lightbox-overlay';
		overlay.innerHTML = '<div class="lightbox-content" role="dialog" aria-modal="true" aria-label="Image preview"><button class="lightbox-close" aria-label="Close">✕</button><img alt="Preview"></div>';
		document.body.appendChild(overlay);
		const imgEl = overlay.querySelector('img');
		const closeBtn = overlay.querySelector('.lightbox-close');
		
		function open(src, alt) {
			imgEl.src = src;
			imgEl.alt = alt || 'Image preview';
			overlay.classList.add('is-active');
			closeBtn.focus();
		}
		function close() { overlay.classList.remove('is-active'); imgEl.src = ''; }
		
		gallery.addEventListener('click', function(e) {
			const a = e.target.closest('a.gallery-item');
			if (!a) return;
			e.preventDefault();
			open(a.getAttribute('href'), a.querySelector('img')?.getAttribute('alt'));
		});
		closeBtn.addEventListener('click', close);
		overlay.addEventListener('click', function(e){ if(e.target === overlay) close(); });
		document.addEventListener('keydown', function(e){ if(e.key === 'Escape') close(); });
	}

	// Translation system
	let currentLang = localStorage.getItem('admiralGemsLang') || 'es';
	
	const translations = {
		es: {
			// Navigation
			nav_products: 'Productos',
			nav_gallery: 'Galería',
			nav_about: 'Nosotros',
			nav_contact: 'Contacto',
			
			// Hero Section
			hero_title: 'Descubre la magia de<br>las amatistas y ágatas uruguayas',
			hero_tagline: 'Directamente desde la fuente, cada geoda impresionante y<br>cristal vibrante comparte una historia de millones de años.',
			cta_contact: 'Solicitar Cotización',
			cta_collection: 'Ver Catálogo',
			hero_badge_1: '⚡ Respuesta en 24h',
			hero_badge_2: '📦 Empaque seguro',
			hero_badge_3: '🌍 Envíos mundiales',
			
			// Exceptional Specimens
			exceptional_title: 'Especímenes Excepcionales',
			exceptional_subtitle: 'Experimenta la belleza única de las geodas uruguayas, con la impresionante combinación de las mejores amatistas del mundo y ágata pulida.',
			
			product_1_title: 'Piezas Impresionantes',
			product_1_desc: 'Contempla las verdaderas maravillas de la tierra, seleccionadas a mano por su excepcional belleza y calidad.',
			
			product_2_title: 'Calidad Uruguay',
			product_2_desc: 'Especímenes de calidad que muestran el arte de la naturaleza en su máxima expresión.',
			
			product_3_title: 'Especímenes Naturales Destacados',
			product_3_desc: 'Descubre nuestros hallazgos más extraordinarios: especímenes con formaciones únicas y colores impresionantes.',
			
			product_4_title: 'Colección Artesanal de Amatistas',
			product_4_desc: 'Desde púrpura profundo hasta tonos terrosos ricos, estas son las gemas que cuentan su propia historia.',
			
			// Deep Purple Collection
			collection_title: 'Colección Púrpura Profundo',
			collection_subtitle: 'Explora nuestro catálogo completo de productos. Cada pieza está cuidadosamente seleccionada, mostrando los mejores especímenes del mundo. Disponible en múltiples grados de calidad para mayoristas, coleccionistas y diseñadores.',
			
			product_pieces: 'Piezas',
			product_cutbase: 'Base Cortada',
			product_agate: 'Ágata Pulida Base Cortada',
			product_heart: 'Corazón',
			product_cluster: 'Racimo',
			product_jewelrybox: 'Geoda Joyero',
			product_natural: 'Geoda Natural',
			product_formation: 'Formación',
			product_citrine: 'Citrino',
			product_rainbow: 'Arcoíris',
			product_gems: 'Gemas',
			product_special: 'Piezas Especiales y Calcita',
			
			btn_shop: 'Comprar',
			shop_note: 'Respuesta profesional en 24 horas',
			
			// Gallery
			gallery_title: 'Galería',
			gallery_subtitle: 'Trabajamos exclusivamente con canteras uruguayas, garantizando profundidad de color e integridad incomparables. Cada pieza se selecciona por su calidad estructural y armonía visual.',
			gallery_note: 'Elaborado por la naturaleza durante milenios, curado por nosotros con precisión.',
			
			// Why Uruguay
			why_title: '¿Por Qué Amatistas Uruguayas?',
			why_subtitle: 'Desde el Corazón de Artigas',
			why_text_1: 'Artigas, Uruguay produce amatistas con la saturación púrpura más profunda que se encuentra en cualquier parte del mundo, resultado de condiciones geológicas únicas formadas durante más de 130 millones de años de actividad volcánica.',
			why_text_2: 'Obtenidas directamente de la región de amatistas premier del mundo, donde fuerzas geológicas extraordinarias crearon el ambiente perfecto para la formación excepcional de cristales con intensidad de color y claridad incomparables.',
			why_text_3: 'Este pequeño país sudamericano de solo 3 millones de personas alberga los depósitos de amatista más codiciados del planeta, y proporcionamos acceso directo a estos especímenes premium para compradores profesionales en todo el mundo.',
			
			stat_1_number: '#1',
			stat_1_text: 'Reconocimiento de<br>Calidad Global',
			stat_2_number: '130M+',
			stat_2_text: 'Años de Proceso de<br>Formación Volcánica',
			stat_3_number: '≥95%',
			stat_3_text: 'Índice de Profundidad<br>de Saturación de Color',
			
			// How to Order
			order_title: 'Cómo Ordenar',
			order_subtitle: 'Simple, transparente y profesional — desde la consulta hasta la entrega',
			
			order_step_1_title: 'Enviar Consulta',
			order_step_1_desc: 'Contáctanos vía WhatsApp, correo o formulario. Especifica tipos de piezas, cantidades, grados de calidad y destino.',
			
			order_step_2_title: 'Recibir Cotización Detallada',
			order_step_2_desc: 'Catálogo completo con fotos de especímenes, precios y grados de calidad disponibles (EXTRA a Q5).',
			
			order_step_3_title: 'Confirmar Pedido',
			order_step_3_desc: 'Selecciona tus piezas. Pago seguro vía transferencia internacional, tarjeta de crédito, PayPal o términos acordados para cuentas establecidas.',
			
			order_step_4_title: 'Logística Segura',
			order_step_4_desc: 'Empaque profesional con seguro. Seguimiento completo hasta tu ubicación en todo el mundo.',
			
			btn_order: 'Ordenar',
			
			// Our Story
			story_title: 'Comprometidos con la Calidad, el Medio Ambiente y las Personas',
			story_text_1: 'Admiral Gems Uruguay es una operación mayorista profesional con sede en Artigas, el epicentro de los mejores depósitos de amatista del mundo. Nos especializamos en el abastecimiento directo de amatistas uruguayas de grado premium, manteniendo estándares de calidad rigurosos a través de nuestro sistema integral de certificación EXTRA-Q5.',
			story_text_2: 'Nuestro compromiso va más allá de las gemas excepcionales. Nos adherimos al estándar Triple Bottom Line (Personas, Planeta y Prosperidad), asegurando los más altos estándares ambientales en todas las áreas mineras de origen mientras desarrollamos las comunidades locales. Este enfoque holístico, que abarca prácticas éticas y medio ambiente, no es simplemente responsabilidad corporativa, es nuestra licencia para operar.',
			story_text_3: 'Desde Artigas hasta tu destino en todo el mundo: cada pieza representa calidad sin compromisos, beneficios de abastecimiento directo y responsabilidad ambiental. Servimos a mayoristas, diseñadores y coleccionistas que exigen tanto calidad premium como abastecimiento ético.',
			
			// Contact
			contact_inquiries: 'Consultas',
			contact_location: '📍 Artigas · Uruguay',
			contact_instagram: 'Instagram',
			contact_email: 'Correo',
			contact_whatsapp: 'WhatsApp',
			
			contact_quote_title: 'Solicitar Cotización',
			form_name: 'Tu nombre',
			form_email: 'Dirección de correo',
			form_message: 'Describe tus requisitos: tipos de piezas, cantidad (kg), grados de calidad (EXTRA-Q5), país de destino, uso previsto...',
			form_submit: 'Enviar Consulta',
			
			// Footer
			footer_rights: '© 2025 Admiral Gems Uruguay'
		},
		en: {
			// Navigation
			nav_products: 'Products',
			nav_gallery: 'Gallery',
			nav_about: 'About',
			nav_contact: 'Contact',
			
			// Hero Section
			hero_title: 'Unearth the magic of<br>Uruguayan amethyst and agate',
			hero_tagline: 'Straight from the source, each stunning geode and<br>vibrant crystal shares a millions-year-old story.',
			cta_contact: 'Request Quote',
			cta_collection: 'View Catalogue',
			hero_badge_1: '⚡ 24h response',
			hero_badge_2: '📦 Secure packaging',
			hero_badge_3: '🌍 Worldwide shipping',
			
			// Exceptional Specimens
			exceptional_title: 'Exceptional Specimens',
			exceptional_subtitle: 'Experience the unique beauty of Uruguayan geodes, featuring the striking combination of world\'s finest Amethyst and polished Agate.',
			
			product_1_title: 'Stunning pieces',
			product_1_desc: 'Behold the true wonders of the earth, hand-selected for their exceptional beauty and quality.',
			
			product_2_title: 'Uruguay Quality',
			product_2_desc: 'Quality specimens that showcase nature\'s artistry at its finest.',
			
			product_3_title: 'Outstanding Natural Stone Specimens',
			product_3_desc: 'Discover our most extraordinary finds—specimens with unique formations and breathtaking color.',
			
			product_4_title: 'Artisan Amethyst Collection',
			product_4_desc: 'From deep purple to rich, earthy tones, these are the gems that tell a story all on their own.',
			
			// Deep Purple Collection
			collection_title: 'Deep purple collection',
			collection_subtitle: 'Browse our complete product catalogue. Each piece is carefully selected, showcasing the world\'s best-in-class specimens. Available in multiple quality grades to suit wholesalers, collectors and designers.',
			
			product_pieces: 'Pieces',
			product_cutbase: 'Cut Base',
			product_agate: 'Agate Polished Cut Base',
			product_heart: 'Heart',
			product_cluster: 'Cluster',
			product_jewelrybox: 'Jewelry Box Geode',
			product_natural: 'Natural Geode',
			product_formation: 'Formation',
			product_citrine: 'Citrine',
			product_rainbow: 'Rainbow',
			product_gems: 'Gems',
			product_special: 'Special pieces and calcite',
			
			btn_shop: 'Shop',
			shop_note: 'Professional response within 24 hours',
			
			// Gallery
			gallery_title: 'Gallery',
			gallery_subtitle: 'We work exclusively with Uruguayan quarries, ensuring unmatched color depth and integrity. Each piece is selected for structural quality and visual harmony.',
			gallery_note: 'Crafted by nature over millennia, curated by us with precision.',
			
			// Why Uruguay
			why_title: 'Why Uruguayan Amethysts?',
			why_subtitle: 'From the Heart of Artigas',
			why_text_1: 'Artigas, Uruguay produces amethysts with the deepest purple saturation found anywhere in the world — a result of unique geological conditions formed over 130 million years of volcanic activity.',
			why_text_2: 'Sourced directly from the world\'s premier amethyst region where extraordinary geological forces created the perfect environment for exceptional crystal formation with unmatched color intensity and clarity.',
			why_text_3: 'This small South American country of just 3 million people is home to the planet\'s most coveted amethyst deposits, and we provide direct access to these premium specimens for professional buyers worldwide.',
			
			stat_1_number: '#1',
			stat_1_text: 'Global Quality<br>Recognition',
			stat_2_number: '130M+',
			stat_2_text: 'Years Volcanic<br>Formation Process',
			stat_3_number: '≥95%',
			stat_3_text: 'Color Saturation<br>Depth Index',
			
			// How to Order
			order_title: 'How to Order',
			order_subtitle: 'Simple, transparent, and professional — from inquiry to delivery',
			
			order_step_1_title: 'Submit Inquiry',
			order_step_1_desc: 'Contact us via WhatsApp, email, or form. Specify piece types, quantities, quality grades, and destination.',
			
			order_step_2_title: 'Receive Detailed Quote',
			order_step_2_desc: 'Comprehensive catalogue with specimen photos, pricing, and available quality grades (EXTRA to Q5).',
			
			order_step_3_title: 'Confirm Order',
			order_step_3_desc: 'Select your pieces. Secure payment via international wire transfer, credit card, PayPal or arranged terms for established accounts.',
			
			order_step_4_title: 'Secure Logistics',
			order_step_4_desc: 'Professional packaging with insurance. Complete tracking to your location worldwide.',
			
			btn_order: 'Order',
			
			// Our Story
			story_title: 'Committed to Quality, Environment and People',
			story_text_1: 'Admiral Gems Uruguay is a professional wholesale operation based in Artigas, the epicenter of the world\'s finest amethyst deposits. We specialize in direct sourcing of premium-grade Uruguayan amethysts, maintaining rigorous quality standards through our comprehensive EXTRA-Q5 certification system.',
			story_text_2: 'Our commitment extends beyond exceptional gemstones. We adhere to the Triple Bottom Line standard—People, Planet, and Prosperity—ensuring highest environmental standards across all sourced mining areas while developing local communities. This holistic approach, encompassing ethical practices and environment, isn\'t merely corporate responsibility—it\'s our license to operate.',
			story_text_3: 'From Artigas to your destination worldwide — every piece represents uncompromising quality, direct sourcing benefits, and environmental responsibility. We serve wholesalers, designers, and collectors who demand both premium quality and ethical sourcing.',
			
			// Contact
			contact_inquiries: 'Inquiries',
			contact_location: '📍 Artigas · Uruguay',
			contact_instagram: 'Instagram',
			contact_email: 'Email',
			contact_whatsapp: 'WhatsApp',
			
			contact_quote_title: 'Request Quote',
			form_name: 'Your name',
			form_email: 'Email address',
			form_message: 'Describe your requirements: piece types, quantity (kg), quality grades (EXTRA-Q5), destination country, intended use...',
			form_submit: 'Submit Inquiry',
			
			// Footer
			footer_rights: '© 2025 Admiral Gems Uruguay'
		}
	};
	
	function translate(lang) {
		currentLang = lang;
		localStorage.setItem('admiralGemsLang', lang);
		
		// Update all elements with data-i18n attribute
		document.querySelectorAll('[data-i18n]').forEach(element => {
			const key = element.getAttribute('data-i18n');
			if (translations[lang] && translations[lang][key]) {
				element.innerHTML = translations[lang][key];
			}
		});
		
		// Update placeholders
		document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
			const key = element.getAttribute('data-i18n-placeholder');
			if (translations[lang] && translations[lang][key]) {
				element.placeholder = translations[lang][key];
			}
		});
		
		// Update active state in language switchers
		document.querySelectorAll('.lang-option').forEach(option => {
			if (option.getAttribute('data-lang') === lang) {
				option.classList.add('active');
			} else {
				option.classList.remove('active');
			}
		});
	}
	
	function initLanguageSwitchers() {
		document.querySelectorAll('.lang-switcher').forEach(switcher => {
			switcher.addEventListener('click', function(e) {
				const option = e.target.closest('.lang-option');
				if (option) {
					const lang = option.getAttribute('data-lang');
					translate(lang);
				}
			});
		});
	}
	
	function initMobileMenu() {
		const toggle = document.querySelector('.mobile-menu-toggle');
		const mobileNav = document.querySelector('.mobile-nav');
		
		if (!toggle || !mobileNav) return;
		
		toggle.addEventListener('click', function() {
			const isOpen = mobileNav.classList.contains('is-open');
			if (isOpen) {
				mobileNav.classList.remove('is-open');
				toggle.textContent = '☰';
				toggle.setAttribute('aria-expanded', 'false');
			} else {
				mobileNav.classList.add('is-open');
				toggle.textContent = '✕';
				toggle.setAttribute('aria-expanded', 'true');
			}
		});
		
		// Close mobile menu when clicking on a link
		mobileNav.querySelectorAll('a').forEach(link => {
			link.addEventListener('click', function() {
				mobileNav.classList.remove('is-open');
				toggle.textContent = '☰';
				toggle.setAttribute('aria-expanded', 'false');
			});
		});
	}
	
	// Initialize
	document.addEventListener('DOMContentLoaded', function() {
		initParallax();
		initRevealAnimations();
		initHeaderScroll();
		initSmoothScroll();
		initContactForm();
		initMagneticButtons();
		initLazyImages();
		initLightbox();
		initLanguageSwitchers();
		initMobileMenu();
		translate(currentLang);
		document.body.classList.add('loaded');
	});
	
	// Debounce scroll events
	let scrollTimer;
	window.addEventListener('scroll', function() {
		if (scrollTimer) clearTimeout(scrollTimer);
		scrollTimer = setTimeout(function() {}, 10);
	});
})();

// Add CSS for spinner animation
const style = document.createElement('style');
style.textContent = `
	@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
	@keyframes pulse { 0%,100% { transform: scale(1);} 50% { transform: scale(1.02);} }
	.form-status.success { color:#28a745; font-weight:600; margin-top:16px; }
	.form-status.error { color:#dc3545; font-weight:600; margin-top:16px; }
	img.loaded { animation: fadeIn 0.6s ease; }
	@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
	body.loaded { animation: pageLoad 0.8s ease; }
	@keyframes pageLoad { from { opacity:0; transform: translateY(20px);} to { opacity:1; transform: translateY(0);} }
`;
document.head.appendChild(style);