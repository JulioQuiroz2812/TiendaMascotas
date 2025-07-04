<?php
session_start();

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Autoload de controladores
require_once __DIR__ . '/../app/Controllers/ClienteController.php';
require_once __DIR__ . '/../app/Controllers/ProductoController.php';
require_once __DIR__ . '/../app/Controllers/PromocionController.php';
require_once __DIR__ . '/../app/Controllers/RecordatorioController.php';
require_once __DIR__ . '/../app/Controllers/VentaController.php';

// Determinar controlador según página
switch ($page) {
    case 'clientes':
        $controller = new ClienteController();
        break;
    case 'productos':
        $controller = new ProductoController();
        break;
    case 'promociones':
        $controller = new PromocionController();
        break;
    case 'recordatorios':
        $controller = new RecordatorioController();
        break;
    case 'ventas':
        $controller = new VentaController();
        break;
    default:
        $controller = null;
        break;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda Mascotas G</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Tienda Mascotas G</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link <?= $page==='clientes'?'active':'' ?>" href="index.php?page=clientes">Clientes</a></li>
        <li class="nav-item"><a class="nav-link <?= $page==='ventas'?'active':'' ?>" href="index.php?page=ventas">Ventas</a></li>
        <li class="nav-item"><a class="nav-link <?= $page==='promociones'?'active':'' ?>" href="index.php?page=promociones">Promociones</a></li>
        <li class="nav-item"><a class="nav-link <?= $page==='productos'?'active':'' ?>" href="index.php?page=productos">Productos</a></li>
        <li class="nav-item"><a class="nav-link <?= $page==='recordatorios'?'active':'' ?>" href="index.php?page=recordatorios">Recordatorios</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="flex-grow-1 container py-4">
<?php if (!empty($_SESSION['flash'])): ?>
  <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['flash']['message'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<?php
if ($controller) {
    if ($action === 'create') {
        $controller->create();
    } elseif ($action === 'edit' && $id) {
        $controller->edit($id);
    } elseif ($action === 'delete' && $id) {
        $controller->delete($id);
    } else {
        $controller->index();
    }
} else {
    echo '<div class="text-center py-5">
            <h1>Bienvenido a Tienda Mascotas G</h1>
            <p>Selecciona un módulo del menú superior para comenzar.</p>
          </div>';
}
?>
</main>

<footer class="bg-light text-center py-3 mt-auto">
  <small>&copy; <?= date('Y') ?> Tienda Mascotas G</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
