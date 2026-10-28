# Laboratorio 2 — Hoja de trabajo: el lenguaje PHP al servicio del inventario

Nombre: ______________________   Fecha: ___/___/2026

## Parte A — Trampas del lenguaje (ejecuta y explica)
Crea `pruebas.php` con estas líneas, ejecútalo con `php pruebas.php` y explica cada resultado:
```php
<?php
declare(strict_types=1);
var_dump(0.1 + 0.2 == 0.3);
var_dump(round(0.1 + 0.2, 2) == 0.3);
var_dump('1' == '01', '1' === '01', 0 == 'a', null ?? 'sin dato');
var_dump(strlen('miel ñ'), mb_strlen('miel ñ'));
var_dump(strtoupper('élida'), mb_strtoupper('élida'));
echo intdiv(17, 5), ' ', 17 % 5, ' ', 2 ** 10, PHP_EOL;
```
¿Por qué conviene `===` y las funciones `mb_*`? ¿Cómo manejarías el dinero sin errores de redondeo?

## Parte B — switch frente a match
```php
$stock = '5';
switch ($stock) { case 5: echo "switch: coincide\n"; break; default: echo "switch: no\n"; }
echo match ($stock) { 5 => 'match: coincide', default => 'match: no coincide' }, PHP_EOL;
echo match (99) { 1 => 'uno' };
```
¿Qué imprime cada uno? ¿Qué pasa con el último `match`? ¿Cuál prefieres y por qué?

## Parte C — Completa `src/inventario.php` (6 TODO)
Funciones: `precio_con_descuento`, `clasificar_stock`, `filtrar_por_categoria`, `valor_inventario`, `slug`,
`codigo_valido`. Las otras tres (`ordenar_por_precio`, `resumen_por_categoria`, `iniciales`) están resueltas: léelas
como ejemplo antes de empezar. Verifica con `php verificar.php` → objetivo **12 de 12**.

## Parte D — El reporte
`php -S 127.0.0.1:8000 -t public` y abre `/reporte.php`, `/reporte.php?categoria=Miel` y `/reporte.php?orden=desc`.
1. ¿Cuál es el valor del inventario? ¿Qué producto no suma nada y por qué?
2. ¿Cuánto paga un cliente por 12 frascos de miel de 500 g? ¿Y por 6?
3. Prueba `/reporte.php?categoria=<b>hola</b>`: ¿qué se ve y por qué es seguro?

## Parte E — Tipos estrictos
Llama `clasificar_stock('5')` en `pruebas.php`. ¿Qué error aparece? ¿Qué pasa si quitas `declare(strict_types=1);`?

## Reflexión
¿Qué ventajas tiene escribir la lógica en funciones pequeñas con tipos, en lugar de mezclarla con el HTML?
