<?php
// public/index.php — El catálogo lo GENERA el servidor a partir de los datos.
// Completa los TODO y comprueba con:  php verificar.php
declare(strict_types=1);
date_default_timezone_set('America/La_Paz');

// TODO 1: cargar el arreglo de productos desde ../datos.php con require (datos FUERA de public/)
$productos = [];

/** Escapa texto para HTML (evita que un dato como "<b>" se interprete como etiqueta). */
function e(string $texto): string
{
    // TODO 2: usar htmlspecialchars con ENT_QUOTES y 'UTF-8'
    return $texto;
}

/** Formato boliviano: Bs 1.234,50 */
function bs(float $monto): string
{
    // TODO 3: number_format con 2 decimales, coma decimal y punto de miles, precedido de "Bs "
    return (string) $monto;
}

// TODO 4: contar en $disponibles los productos con stock mayor a 0 (usa foreach)
$disponibles = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catálogo · Apicultores Flor de la Chiquitanía</title>
  <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
  <header>
    <h1>Apicultores Flor de la Chiquitanía</h1>
    <p><?= count($productos) ?> productos · <?= $disponibles ?> disponibles</p>
  </header>
  <main>
    <table>
      <caption>Catálogo de la asociación</caption>
      <thead>
        <tr><th scope="col">Código</th><th scope="col">Producto</th><th scope="col">Categoría</th>
            <th scope="col">Socio</th><th scope="col">Precio</th><th scope="col">Stock</th></tr>
      </thead>
      <tbody>
      <?php foreach ($productos as $p): ?>
        <tr>
          <!-- TODO 5: si el stock es 0, la fila lleva class="agotado" y en la columna Stock va
               <span class="insignia">Agotado</span> en lugar del número. Usa e() en todos los textos y bs() en el precio. -->
          <td><?= $p['codigo'] ?></td>
          <td><?= $p['nombre'] ?></td>
          <td><?= $p['categoria'] ?></td>
          <td><?= $p['socio'] ?></td>
          <td class="num"><?= $p['precio'] ?></td>
          <td class="num"><?= $p['stock'] ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </main>
  <footer>
    <!-- TODO 6: "Generado por el servidor el dd/mm/aaaa a las hh:mm con PHP x.y" (date() y PHP_MAJOR_VERSION/PHP_MINOR_VERSION) -->
    <p>Generado por el servidor</p>
  </footer>
</body>
</html>
