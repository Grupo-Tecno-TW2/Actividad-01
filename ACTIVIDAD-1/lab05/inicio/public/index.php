<?php
// public/index.php — Catálogo agrupado por categoría, con diseño moderno de tarjetas.
declare(strict_types=1);
require __DIR__ . '/../src/cargar.php';

$catalogo = Catalogo::desdeArchivo(ARCHIVO_PRODUCTOS);
$etiquetas = ['agotado' => 'Agotado', 'bajo' => 'Últimas unidades', 'normal' => 'Disponible'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catálogo · Flor de la Chiquitanía</title>
  <style>
    :root {
      --primary: #d97706;
      --primary-dark: #b45309;
      --bg-main: #f8fafc;
      --card-bg: #ffffff;
      --text-main: #1e293b;
      --text-muted: #64748b;
      --border-color: #e2e8f0;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      background-color: var(--bg-main);
      color: var(--text-main);
      margin: 0;
      padding: 0;
    }

    header {
      background: linear-gradient(135deg, var(--primary-dark), var(--primary));
      color: white;
      padding: 2.5rem 1rem;
      text-align: center;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    header h1 {
      margin: 0 0 0.5rem 0;
      font-size: 2.2rem;
    }

    header p {
      margin: 0;
      font-size: 1.1rem;
      opacity: 0.95;
    }

    main {
      max-width: 1100px;
      margin: 2.5rem auto;
      padding: 0 1.5rem;
    }

    section {
      margin-bottom: 3rem;
    }

    section h2 {
      border-bottom: 2px solid var(--border-color);
      padding-bottom: 0.75rem;
      color: var(--primary-dark);
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    section h2 small {
      font-size: 0.95rem;
      color: var(--text-muted);
      font-weight: normal;
    }

    /* Cuadrícula de tarjetas adaptativa */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
    }

    /* Tarjeta de producto individual */
    .product-card {
      background: var(--card-bg);
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
      border: 1px solid var(--border-color);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 20px -4px rgba(0, 0, 0, 0.08);
    }

    .product-card h3 {
      margin: 0 0 1rem 0;
      font-size: 1.2rem;
    }

    .product-card h3 a {
      color: var(--text-main);
      text-decoration: none;
    }

    .product-card h3 a:hover {
      color: var(--primary);
      text-decoration: underline;
    }

    .product-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 1.25rem;
      padding-top: 0.85rem;
      border-top: 1px solid #f1f5f9;
    }

    .price {
      font-weight: bold;
      color: var(--primary-dark);
      font-size: 1.2rem;
    }

    /* Insignias de estado según disponibilidad */
    .badge {
      padding: 0.3rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.85rem;
      font-weight: 600;
    }

    .stock-normal {
      background-color: #dcfce7;
      color: #166534;
    }

    .stock-bajo {
      background-color: #fef3c7;
      color: #92400e;
    }

    .stock-agotado {
      background-color: #fee2e2;
      color: #991b1b;
    }
  </style>
</head>
<body>
<header>
  <h1>Apicultores Flor de la Chiquitanía</h1>
  <p><?= $catalogo->cantidad() ?> productos · <?= count($catalogo->disponibles()) ?> disponibles ·
     valor del inventario: <strong><?= bs($catalogo->valorInventario()) ?></strong></p>
</header>
<main>
<?php foreach ($catalogo->categorias() as $categoria): ?>
  <section id="<?= e($categoria->slug()) ?>">
    <h2><?= e($categoria->nombre()) ?> <small><?= e($categoria->descripcion()) ?></small></h2>
    <div class="product-grid">
    <?php foreach ($catalogo->deCategoria($categoria) as $p): ?>
      <div class="product-card">
        <div>
          <h3>
            <a href="/producto.php?codigo=<?= urlencode($p->codigo()) ?>"><?= e($p->nombre()) ?></a>
          </h3>
        </div>
        <div class="product-footer">
          <span class="price"><?= bs($p->precio()) ?></span>
          <span class="badge stock-<?= $p->estadoStock() ?>"><?= $etiquetas[$p->estadoStock()] ?></span>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </section>
<?php endforeach; ?>
</main>
</body>
</html>