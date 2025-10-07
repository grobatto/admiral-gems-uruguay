# Admiral Gems Uruguay — Theme

Ultra-minimalist one-page WordPress theme inspired by Apple for premium Uruguayan amethyst and agate.

## Requisitos
- WordPress 6.8+
- PHP 8.1+
- (Local) Este repo ya incluye instrucciones para ejecutarlo con PHP + SQLite.

## Instalación (servidor existente)
1. Copiar la carpeta `admiral-gems-uruguay` a `wp-content/themes/`.
2. En WP Admin → Apariencia → Temas → Activar “Admiral Gems Uruguay”.
3. (Opcional) Subir el logo a `assets/logo.png` y las imágenes de galería a `assets/galeria/`.

## Instalación local rápida (ya automatizada en tu entorno)
- Se usó WP-CLI + PHP Server + SQLite. Para re-levantar:
```
# Desde la carpeta de proyecto raíz
php wp.phar server --host=localhost --port=8080 --docroot=wp
```
La URL local es: http://localhost:8080

Admin: `admin` / `admin123` (cámbialo luego).

## Estructura
- `style.css`: estilos, variables, glassmorphism, animaciones y galería.
- `functions.php`: enqueues, AJAX del formulario, SEO básico (OG + JSON-LD).
- `header.php`, `footer.php`: layout, botón WhatsApp, logo.
- `index.php`: secciones (hero, destacados, filosofía, galería, contacto).
- `assets/js/main.js`: animaciones scroll, smooth scroll, formulario AJAX, lightbox.
- `assets/galeria/`: imágenes de galería. Se listan automáticamente.

## Personalización
- Colores clave en `:root` (blanco, negro suave, azul Admiral, púrpura amatista).
- Logo: reemplazar `assets/logo.png` (PNG/SVG admitidos si habilitado).
- Galería: agregar más imágenes a `assets/galeria/` (jpg/jpeg/png/webp).
- WhatsApp: editar enlace en `header.php`.

## Accesibilidad y SEO
- Lightbox accesible (Escape cierra, foco en botón cerrar).
- Meta OG + JSON-LD de Organización.
- Enlaces externos con `rel="noopener"`.

## Calidad (QA Checklist)
- [x] Home responde `200` localmente.
- [x] CSS/JS cargan sin errores en consola.
- [x] Imágenes de galería se listan y abren en lightbox.
- [x] Header pegajoso sin “jumping” al hacer scroll.
- [x] Botón WhatsApp visible y accesible.
- [x] Formulario de contacto con feedback (requiere mail configurado para envío real).

## Notas
- Para producción, se recomienda subir imágenes optimizadas (WebP) y definir `siteurl/home` finales.
- Puedes integrar un feed de Instagram ligero bajo demanda.
