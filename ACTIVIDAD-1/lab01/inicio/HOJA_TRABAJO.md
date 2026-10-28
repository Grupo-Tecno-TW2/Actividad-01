# Laboratorio 1 — Hoja de trabajo: del catálogo estático al catálogo generado con PHP

Nombre: ______________________   Fecha: ___/___/2026

## Parte A — Tu plataforma PHP
1. `php -v` → versión: ________ (se necesita 8.3 o superior).
2. Desde la carpeta del laboratorio: `php -S 127.0.0.1:8000 -t public` y abre http://127.0.0.1:8000/index.html.
   ¿Qué problemas tiene el catálogo estático (precios, productos, fecha)?
3. `php -r 'echo 2 + 3, PHP_EOL;'` y `php public/index.php` (PHP en la terminal, sin navegador). ¿Qué imprime el segundo?

## Parte B — Completa `public/index.php` (6 TODO)
Después de cada TODO recarga http://127.0.0.1:8000/ y al final ejecuta `php verificar.php` → objetivo **12 de 12**.

## Parte C — Cliente frente a servidor
1. En el navegador, "Ver código fuente" de http://127.0.0.1:8000/. ¿Aparece algo de PHP? ¿Por qué?
2. `curl -I http://127.0.0.1:8000/` → ¿qué cabecera delata que la página la generó PHP?
3. Completa la tabla:

| | JavaScript en el navegador (lado del cliente) | PHP (lado del servidor) |
|---|---|---|
| ¿Dónde se ejecuta? | | |
| ¿Quién ve el código? | | |
| ¿Puede leer la base de datos directamente? | | |
| Ejemplo de uso en el catálogo | | |

## Parte D — La trampa del escape
1. Mira el producto "Cera <b>pura</b> 1 kg" en `datos.php`. Quita temporalmente `e()` de esa celda: ¿qué pasa en la página?
2. ¿Qué podría hacer alguien malintencionado si en vez de `<b>` escribiera un `<script>` en el nombre de un producto?
3. Vuelve a poner `e()`. `php -r 'echo htmlspecialchars("Cera <b>pura</b> & \"miel\"", ENT_QUOTES, "UTF-8");'` → ¿qué imprime?

## Parte E — Datos fuera de la carpeta pública
1. ¿Por qué `datos.php` no está dentro de `public/`?
2. Pide http://127.0.0.1:8000/datos.php: ¿qué responde el servidor integrado y por qué?

## Reflexión
¿Qué ventajas tiene que la página la genere el servidor en lugar de editar el HTML a mano cada vez?
