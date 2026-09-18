# Subir Infolog a DonWeb (Web Hosting Plan 1 — cPanel, PHP 8.1 FPM)

Alternativa al deploy Docker en Hetzner (ver `DEPLOY.md`), para el hosting
compartido de DonWeb. Dos archivos, dos destinos distintos, ~11 MB comprimidos.

## Armar el paquete

```bash
composer install --no-dev --optimize-autoloader
npm run build
```

Después se reparte en dos carpetas hermanas en el servidor: todo el proyecto
va a `infolog-app/` salvo `public/`, cuyo contenido va a `public_html/`. El
`index.php` de `public_html` tiene que apuntar a `../infolog-app/` en sus tres
`require`, y `bootstrap/app.php` ya resuelve la raíz web con `usePublicPath()`.

---

## ⚠️ Antes de empezar: BACKUP

En cPanel → **Administrador de archivos** → entrá a `public_html`.
Seleccioná todo → **Comprimir** → guardá el .zip resultante fuera de `public_html`
(por ejemplo en `/home/tuusuario/backup-sitio-viejo.zip`).

Esto es lo único irreversible de todo el proceso. No sigas sin hacerlo.

> **El correo no se toca.** Las cuentas de mail viven en el servidor de correo y
> dependen de los registros MX, no de los archivos del sitio. Reemplazar
> `public_html` no las afecta.

---

## Paso 1 — Vaciar `public_html`

Borrá el contenido actual de `public_html` (ya tenés el backup).

**Importante:** si queda un `index.html` del sitio viejo, Apache lo va a servir
antes que el `index.php` de Laravel y vas a seguir viendo la página vieja.
Asegurate de que no quede ninguno.

---

## Paso 2 — Subir la aplicación

1. Administrador de archivos → subí al nivel de `/home/tuusuario/`
   (la carpeta que **contiene** a `public_html`, no adentro de ella).
2. Subí **`1-infolog-app.zip`** ahí.
3. Click derecho → **Extract**. Te queda `/home/tuusuario/infolog-app/`.
4. Borrá el .zip.

La estructura final tiene que quedar así:

```
/home/tuusuario/
├── infolog-app/      ← la aplicación (NO accesible desde la web)
│   ├── app/  bootstrap/  config/  resources/  routes/  storage/  vendor/
│   └── .env
└── public_html/      ← lo único que se sirve por web
```

---

## Paso 3 — Subir el contenido web

1. Entrá **adentro** de `public_html`.
2. Subí **`2-public_html-contenido.zip`**.
3. Click derecho → **Extract**.
4. Borrá el .zip.

Tienen que quedar, entre otros: `index.php`, `.htaccess`, `build/`, `images/`,
`docs/`, `fonts/`.

> Si no ves el `.htaccess`, activá **Configuración → Mostrar archivos ocultos**.
> Sin ese archivo ninguna página interna funciona (sólo el inicio).

---

## Paso 4 — Configurar el dominio

Editá `/home/tuusuario/infolog-app/.env` (click derecho → Edit) y ajustá:

```
APP_URL=https://www.infologargentina.com
```

Poné el dominio real, con `https://` y **sin** barra final.
El resto del archivo ya está configurado para producción; no toques nada más.

---

## Paso 5 — Permisos

Sobre `/home/tuusuario/infolog-app/storage` → click derecho → **Permissions**:

- Permisos: **775**
- Tildá **"Recurse into subdirectories"**

Repetí lo mismo con `/home/tuusuario/infolog-app/bootstrap/cache`.

Si storage no es escribible, todas las páginas devuelven error 500.

---

## Paso 6 — Confirmar PHP 8.1

cPanel → **Seleccionar versión de PHP** → que el dominio esté en **8.1**.

Extensiones necesarias (casi todas vienen activas por defecto):

`mbstring` · `openssl` · `tokenizer` · `json` · `ctype` · `fileinfo`
`filter` · `hash` · `session` · `dom` · `libxml` · `iconv` · `pcre`

---

## Paso 7 — Probar

Abrí el dominio y recorré:

- **Inicio** — el logo del header tiene que leerse "INFOLOG"
- **Servicios** — digitalización destacada arriba; tarjetas sin recortar
- **Política de Calidad** — el visor PDF con zoom y botón de descarga
- **Conocenos** — foto del equipo y el video que arranca solo al scrollear

---

## Si algo falla

**Error 500 en todo el sitio**
Permisos de `storage` (Paso 5). Para ver el error real, en `.env` poné
`APP_DEBUG=true`, recargá, leé el mensaje y **volvé a ponerlo en `false`**.
Nunca dejes `APP_DEBUG=true` en producción: expone rutas y configuración.

**El inicio carga pero las páginas internas dan 404**
Falta el `.htaccess` en `public_html`, o el hosting no tiene `mod_rewrite`.

**Se ve sin estilos (texto plano sobre blanco)**
No se subió la carpeta `build/` dentro de `public_html`.

**Sigue apareciendo la página vieja**
Quedó un `index.html` en `public_html`. Borralo.

---

## Actualizaciones futuras

Para cambios de texto o imágenes alcanza con reemplazar archivos sueltos
dentro de `infolog-app/`. Si se toca el CSS hay que recompilar los assets
(`npm run build`) y volver a subir `public_html/build/`.
