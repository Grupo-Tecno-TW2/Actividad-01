<?php
// src/inventario.php — Funciones de la asociación: precios, stock, filtros, reportes y textos.
declare(strict_types=1);

/** Descuento por volumen: docena o más 10 %, media docena o más 5 %, si no, precio normal. */
function precio_con_descuento(float $precio, int $cantidad): float
{
    // TODO: con match(true): 12 o más unidades 10 % de descuento, 6 o más 5 %, si no 0 %. Redondea a 2 decimales (round).
    return 0.0;
}

/** Nivel de stock para alertas del acopio. */
function clasificar_stock(int $stock): string
{
    // TODO: con match(true): 0 → 'Agotado', hasta 5 → 'Bajo', hasta 20 → 'Normal', más → 'Alto'.
    return '';
}

/** Productos de una categoría (sin distinguir mayúsculas), con índices 0, 1, 2… */
function filtrar_por_categoria(array $productos, string $categoria): array
{
    // TODO: array_filter con una función flecha que compare en minúsculas (mb_strtolower) y array_values para reindexar.
    return [];
}

/** Copia ordenada por precio (ascendente o descendente) con el operador nave espacial <=>. */
function ordenar_por_precio(array $productos, bool $descendente = false): array
{
    usort($productos, fn(array $a, array $b): int => $descendente ? $b['precio'] <=> $a['precio'] : $a['precio'] <=> $b['precio']);
    return $productos;
}

/** Valor del inventario: suma de precio × stock. */
function valor_inventario(array $productos): float
{
    // TODO: suma de precio × stock con array_map y array_sum.
    return 0.0;
}

/** Resumen por categoría: ['Miel' => ['productos' => 3, 'unidades' => 50], …] ordenado por nombre. */
function resumen_por_categoria(array $productos): array
{
    $resumen = [];
    foreach ($productos as $p) {
        $c = $p['categoria'];
        $resumen[$c] ??= ['productos' => 0, 'unidades' => 0];
        $resumen[$c]['productos']++;
        $resumen[$c]['unidades'] += $p['stock'];
    }
    ksort($resumen);
    return $resumen;
}

/** Texto apto para URL: "Miel de cusí 350 g" → "miel-de-cusi-350-g" (tildes y ñ incluidas). */
function slug(string $texto): string
{
    // TODO: minúsculas con mb_strtolower, reemplazar tildes y ñ con strtr, lo que no sea a-z o 0-9 por '-' (preg_replace) y quitar guiones de los extremos.
    return '';
}

/** Código de producto válido: 3 letras mayúsculas, guion y 2 a 4 letras o dígitos (MIE-500, CER-1K). */
function codigo_valido(string $codigo): bool
{
    // TODO: preg_match con la expresión /^[A-Z]{3}-[A-Z0-9]{2,4}$/ (devuelve 1 si coincide).
    return false;
}

/** Iniciales de un nombre con tildes: "Élida Chuvé" → "ÉC". */
function iniciales(string $nombre): string
{
    $partes = preg_split('/\s+/', trim($nombre), -1, PREG_SPLIT_NO_EMPTY);
    return implode('', array_map(fn(string $p): string => mb_strtoupper(mb_substr($p, 0, 1)), $partes));
}
