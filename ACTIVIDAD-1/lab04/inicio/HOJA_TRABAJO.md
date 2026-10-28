# Laboratorio 4 — Hoja de trabajo: fotos de productos, editar y eliminar

Nombre: ______________________   Fecha: ___/___/2026

Servidor: `php -S 127.0.0.1:8000 -t public` · Verificador: `php verificar.php` (restaura datos y fotos).

## Parte A — Cómo llega un archivo
1. Sube una foto y, en `nuevo.php`, agrega temporalmente `var_dump($_FILES); exit;` al inicio del bloque POST.
   Anota las claves de `$_FILES['foto']` y qué significa cada una (`name`, `type`, `tmp_name`, `error`, `size`).
2. ¿Qué pasa si quitas `enctype="multipart/form-data"` del formulario?
3. `php -r 'echo ini_get("upload_max_filesize"), " ", ini_get("post_max_size");'` → ¿qué límites tiene tu PHP?

## Parte B — No confiar en el navegador (TODO 1 y 2 en `src/fotos.php`)
Crea un archivo de texto `foto.jpg` con el contenido `<?php echo 'hola'; ?>` y súbelo como foto.
1. **Antes** de completar los TODO: ¿se aceptó? ¿Con qué nombre se guardó? ¿Qué decía `$_FILES['foto']['type']`?
2. `php -r 'echo (new finfo(FILEINFO_MIME_TYPE))->file("foto.jpg");'` → ¿qué tipo real detecta?
3. Completa los TODO 1 y 2 y repite. ¿Por qué el nombre original del archivo es peligroso?

## Parte C — Dónde viven las fotos (TODO 3)
1. ¿Por qué se guardan en `datos/fotos` y no en `public/`? ¿Qué pasaría si alguien lograra subir un `.php` a `public/`?
2. Completa el TODO 3 y prueba `http://127.0.0.1:8000/foto.php?f=../productos.json`. ¿Qué responde y por qué?
3. ¿Para qué sirve la cabecera `X-Content-Type-Options: nosniff` en `foto.php`?

## Parte D — Editar y eliminar (TODO 4 y 5)
1. Abre `http://127.0.0.1:8000/eliminar.php?codigo=MIE-500` en el navegador. ¿Qué pasa antes y después del TODO 4?
2. Edita un producto cambiando su foto. Antes del TODO 5, ¿qué pasa en `datos/fotos`?
3. Si un campo falla la validación pero la foto era buena, ¿qué hace el sistema con la foto? ¿Por qué?

## Parte E — Verificación
`php verificar.php` → objetivo **13 de 13**.

## Reflexión
Enumera tres ataques que evita la subida segura que programaste y la línea de código que evita cada uno.
