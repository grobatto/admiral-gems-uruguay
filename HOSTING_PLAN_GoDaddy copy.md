# Plan de acción para publicar "Admiral Gems Uruguay" en admiralgems.com (GoDaddy)

Este plan está escrito para decisión y seguimiento de negocio (no técnico). Indica qué comprar, cuánto cuesta, quién hace qué y en qué orden para poner el sitio online con dominio propio.

---

## 1) Resumen ejecutivo (qué vamos a hacer)
- Publicar el sitio WordPress minimalista de Admiral Gems en el dominio `admiralgems.com` usando GoDaddy.
- Opción recomendada: GoDaddy Managed WordPress (incluye servidor, SSL, copias de seguridad). No se requiere AWS para la primera fase.
- Tiempo estimado: 1–2 horas de despliegue + hasta 24 h de propagación de DNS.
- Costo estimado mensual: 6–15 USD/mes (plan Básico/Deluxe) + dominio (si no está ya comprado).

## 2) Qué necesitamos comprar o tener
- Dominio: `admiralgems.com` (GoDaddy o donde esté hoy). 
- Hosting: GoDaddy Managed WordPress (Plan Básico es suficiente; si se esperan picos de tráfico, Plan Deluxe). 
- Certificado SSL: incluido en Managed WordPress.
- Email corporativo (opcional, recomendado): Google Workspace u O365. Alternativa de bajo costo: Zoho Mail.

## 3) Roles y accesos
- Negocio:
  - Aprobación de compras (dominio/hosting/email).
  - Usuario/contraseña de GoDaddy (o acceso delegado).
- Técnico (nosotros):
  - Configuración de hosting, DNS, instalación WordPress, migración del tema, pruebas, optimización y seguridad básica.

## 4) Flujo de alto nivel (paso a paso)
1. Crear/validar cuenta en GoDaddy.
2. Comprar “Managed WordPress – Plan Básico (o Deluxe)”.
3. En el panel de GoDaddy → Managed WordPress → “Add Site”: crear el sitio de producción.
4. Asociar el dominio `admiralgems.com` al sitio desde el mismo panel.
5. Habilitar SSL (un clic en GoDaddy). Forzar HTTPS.
6. Acceder a WordPress (wp-admin) y activar nuestro tema `Admiral Gems Uruguay`.
7. Subir logo e imágenes (ya incluidas en el tema, podemos ajustar desde el admin si hace falta).
8. Configurar el formulario de contacto con SMTP (para que los emails lleguen siempre).
9. Pruebas (móvil y desktop), SEO básico y verificación de carga rápida.
10. Publicación oficial y monitoreo 48 h.

## 5) Detalle operativo (qué hace el técnico)
- Instalación WordPress (si el sitio no viene preinstalado): 
  - GoDaddy Managed WordPress ya lo crea por nosotros.
- Migración del sitio:
  - Subir el tema `admiral-gems-uruguay` a `wp-content/themes/` (por SFTP o desde el panel si se permite).
  - Activar el tema en Apariencia → Temas.
- Imágenes y contenido:
  - Ya empaquetado en el tema (carpeta `assets/`). Si se desea, se pueden gestionar desde la Librería de Medios.
- SSL y seguridad:
  - Activar SSL en GoDaddy y “Forzar HTTPS”.
  - Cambiar usuario admin, activar 2FA.
- Email del formulario (crítico):
  - Instalar “WP Mail SMTP” y conectar con un proveedor (SendGrid gratis 100 emails/día, o el que se elija).
  - Configurar SPF/DKIM/DMARC en DNS para alta entregabilidad (lo hacemos nosotros con los valores que provea el proveedor de correo).
- Copias de seguridad:
  - Managed WordPress trae backups diarios. Verificar y probar restauración.
- Rendimiento:
  - Caché de GoDaddy + WebP en el tema. Opcional: Cloudflare (plan gratis) para CDN global.

## 6) DNS (dominio → hosting)
- Si el dominio ya está en GoDaddy: la conexión es casi automática desde Managed WordPress.
- Si el dominio está en otro registrador: 
  - Opción A: cambiar “nameservers” a GoDaddy.
  - Opción B: mantener el DNS actual y apuntar un registro A/CAA/CNAME a la IP/nombre que entregue GoDaddy.
- Propagación: puede tardar de minutos a 24 h.

## 7) Costos orientativos (USD)
- Dominio .com: 10–15/año (promos primer año). 
- Managed WordPress: 6–15/mes según plan/promoción.
- Correo profesional: 
  - Google Workspace ~6–12/usuario/mes o Zoho Mail desde ~1/usuario/mes.
- Opcional CDN (Cloudflare Free): 0.

## 8) Aceptación (checklist de salida a producción)
- [ ] `admiralgems.com` abre con candado SSL (HTTPS). 
- [ ] Sitio se ve bien en iPhone/Android y en desktop (Chrome/Safari/Edge). 
- [ ] Formulario “Request Information” envía y llega a `info@admiralgems.uy` (o el email definido).
- [ ] Botón de WhatsApp abre chat con `+59895052840`.
- [ ] Velocidad aceptable (Core Web Vitals básicos OK). 
- [ ] Backups automáticos activos. 
- [ ] Accesos de administrador documentados y resguardados.

## 9) Plan de contingencia (rollback)
- Antes de cambios mayores: backup manual desde el panel de GoDaddy.
- Si algo falla: restaurar al backup de ayer con un clic.
- Mantener un staging (opcional) para probar antes de publicar.

## 10) ¿Hace falta AWS?
- **No** para esta primera etapa: GoDaddy Managed WordPress es suficiente y más simple.
- **Cuándo evaluar AWS**: si se requieren integraciones complejas, autoscaling global, alta disponibilidad multinodo o microservicios.
- **Alternativa** (para referencia): AWS Lightsail “WordPress Blueprint” (~5–10 USD/mes) + DNS (Route53) + SSL (Let’s Encrypt). Más flexible pero más técnico y con soporte distribuido.

## 11) Calendario tentativo
- Día 0 (hoy): aprobación compras y acceso a cuenta GoDaddy.
- Día 1 (1–2 h): aprovisionar hosting, asociar dominio, activar SSL, subir tema, configurar SMTP.
- Día 1–2: propagación DNS, pruebas en vivo, ajustes finos.
- Día 3–7: monitoreo y micro mejoras (SEO, analítica, accesibilidad).

## 12) Entregables y documentación
- Accesos: GoDaddy, WordPress (admin), SFTP, SMTP/SendGrid.
- Documento con DNS (SPF/DKIM/DMARC) y responsables.
- Manual corto de edición de textos/imágenes y cómo hacer backups.

## 13) Mantenimiento (mensual)
- Actualizaciones de WordPress/tema.
- Revisión de formularios (entregabilidad de correo).
- Copias de seguridad y verificación de restauración.
- Revisión de velocidad y Core Web Vitals.

---

## Anexo: pasos que verá el jefe en alto nivel
1) Aceptar compra del hosting (y dominio si falta).
2) Recibir email “Sitio creado” de GoDaddy.
3) Confirmar que `admiralgems.com` ya abre con candado.
4) Probar el formulario y el WhatsApp.
5) Dar OK final para comunicación en redes.

## Contacto y soporte
- Punto técnico: el mismo equipo que desarrolló el tema.
- Tiempo de respuesta objetivo: < 24 h hábiles.

