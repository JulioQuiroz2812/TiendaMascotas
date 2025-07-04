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
  <!-- Agregar Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Estilos generales */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f1f1f1; /* Fondo suave gris claro */
        color: #333; /* Color de texto oscuro */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Estilo para el encabezado */
    nav.navbar {
        background-color: #2c3e50; /* Gris oscuro azulado */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    nav.navbar .navbar-brand {
        font-size: 1.7rem;
        font-weight: 600;
        color: #ecf0f1; /* Blanco suave */
    }

    nav.navbar .navbar-nav .nav-link {
        color: #ecf0f1 !important;
        font-size: 1rem;
        padding: 10px 20px;
    }

    nav.navbar .navbar-nav .nav-link.active {
        font-weight: bold;
        background-color: #34495e; /* Fondo oscuro para el enlace activo */
        border-radius: 5px;
    }

    /* Estilo para el contenedor principal */
    main.container {
        background-color: #ffffff; /* Fondo blanco */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* Estilo de alertas */
    .alert {
        margin-top: 20px;
        border-radius: 8px;
        font-size: 1rem;
        padding: 12px;
    }

    /* Estilo para el pie de página */
    footer {
        background-color: #ecf0f1;
        padding: 20px;
        font-size: 0.9rem;
        color: #7f8c8d; /* Gris claro */
    }

    footer small {
        color: #2c3e50; /* Gris oscuro */
    }

    /* Estilos para botones */
    button {
        font-size: 1rem;
        padding: 12px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        border: none;
        margin-top: 10px;
    }

    button.btn-primary {
        background-color: #3498db; /* Azul suave */
        color: #fff;
        margin-right: 10px;
    }

    button.btn-primary:hover {
        background-color: #2980b9; /* Azul más oscuro */
    }

    button.btn-secondary {
        background-color: #95a5a6; /* Gris oscuro */
        color: #fff;
    }

    button.btn-secondary:hover {
        background-color: #7f8c8d; /* Gris más oscuro */
    }

    /* Estilo para los enlaces */
    a {
        text-decoration: none;
        color: #3498db; /* Azul suave */
        font-weight: 600;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }

        .navbar-nav .nav-link {
            font-size: 0.9rem;
            padding: 8px 12px;
        }

        .container {
            padding: 20px;
        }

        footer {
            font-size: 0.8rem;
        }
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
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
