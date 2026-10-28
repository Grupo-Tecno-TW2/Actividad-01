# Laboratorio 3 — Hoja de trabajo: registrar productos con un formulario seguro

Nombre: ______________________   Fecha: ___/___/2026

Servidor: `php -S 127.0.0.1:8000 -t public` · Verificador: `php verificar.php` (restaura los datos al empezar).

## Parte A — GET y POST
1. Busca "cera" en el catálogo. ¿Cómo quedó la URL? ¿Qué ventaja tiene que la búsqueda use GET?
2. Abre DevTools > Red y envía el formulario de registro vacío. ¿Qué método usa? ¿Dónde viajan los datos?
3. Completa la tabla: ¿GET o POST?

| Acción | Método | ¿Por qué? |
|---|---|---|
| Buscar productos | | |
| Registrar un producto | | |
| Ver la página 2 del catálogo | | |
| Borrar un producto (clase 4) | | |

## Parte B — Validación en el servidor (TODO 1 a 4 en `src/validacion.php`)
1. Completa los TODO. Envía: código `miel`, nombre `ab`, categoría inventada (edítala con DevTools), precio `-5`,
   stock `2.5`, socio vacío. ¿Qué código de estado HTTP responde? ¿Cuántos errores?
2. ¿Por qué validar en el servidor si el navegador ya tiene `required` y `type="number"`? (Pista: quita `novalidate` y
   luego cambia un `<option>` con DevTools.)
3. Escribe `45,50` como precio: ¿qué se guarda en el JSON?

## Parte C — Patrón PRG (TODO 5 y 6 en `public/nuevo.php`)
1. **Antes** de completar el TODO 5: registra un producto y presiona F5. ¿Qué te pregunta el navegador? ¿Qué pasa si aceptas?
2. Completa los TODO. Registra otro producto y presiona F5 en la página a la que te llevó. ¿Qué cambió?
3. En DevTools > Red, ¿qué código tiene la respuesta al POST y qué cabecera `Location`?

## Parte D — include y require
1. ¿Qué archivos se incluyen en cada página? ¿Qué pasaría si `cabecera.php` no existiera con `require` y con `include`?
2. ¿Para qué sirve `require_once`?

## Parte E — El archivo JSON (TODO 7 en `src/almacen.php`)
1. Abre `datos/productos.json`. ¿Cómo se ven las tildes? ¿Qué hace `JSON_UNESCAPED_UNICODE`?
2. `php -r 'echo json_encode(45.0), " ", json_encode(45.0, JSON_PRESERVE_ZERO_FRACTION);'` → ¿qué diferencia hay?
3. ¿Qué problema evita `LOCK_EX`? ¿Qué limitaciones tiene un archivo JSON frente a una base de datos?

## Reflexión
Si el formulario se usara en una feria con 3 personas registrando a la vez, ¿qué problemas podrías tener hoy y cómo
los resolverá la base de datos de la clase 8?
