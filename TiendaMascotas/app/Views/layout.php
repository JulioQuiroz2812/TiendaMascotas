<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda Mascotas G</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Tienda Mascotas G</a>
      <button class="navbar-toggler" type="button" 
              data-bs-toggle="collapse" data-bs-target="#mainNav" 
              aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="/clientes">Clientes</a></li>
          <li class="nav-item"><a class="nav-link" href="/ventas">Ventas</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="/promociones">Promociones</a></li>
          <li class="nav-item"><a class="nav-link" href="/productos">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="/recordatorios">Recordatorios</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main class="flex-grow-1 container py-4">
    <!-- Flash message -->
    <?php if (!empty($_SESSION['flash'])): ?>
      <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <?= $content ?>
  </main>

  <!-- FOOTER -->
  <footer class="bg-light text-center py-3 mt-auto">
    <small>&copy; <?= date('Y') ?> Tienda Mascotas G</small>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
