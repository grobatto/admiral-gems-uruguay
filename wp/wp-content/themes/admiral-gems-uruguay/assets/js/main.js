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