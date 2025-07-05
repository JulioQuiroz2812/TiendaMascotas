<?php
// vistas/ventas/index.php

// suponemos que $ventas llega desde el controlador
$fechas = [];
$totales = [];
foreach ($ventas as $v) {
    $fechas[]  = $v['fecha_venta'];          // p. ej. "2025-07-03"
    $totales[] = (float) $v['total'];        // p. ej. 150.75
}
// codificamos en json para javascript
$fechas_json  = json_encode($fechas);
$totales_json = json_encode($totales);
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ventas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-capitalize">ventas</h2>
      <a href="index.php?page=ventas&action=create" class="btn btn-primary">nueva venta</a>
    </div>

    <!-- gráfico de ventas -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <canvas id="ventas-chart" height="100"></canvas>
      </div>
    </div>

    <!-- tabla de ventas -->
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>cliente</th>
            <th>fecha de venta</th>
            <th>total (s/)</th>
            <th class="text-end">acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ventas as $v): ?>
          <tr>
            <td><?= htmlspecialchars($v['cliente_nombre']) ?></td>
            <td><?= htmlspecialchars($v['fecha_venta']) ?></td>
            <td><?= number_format($v['total'], 2) ?></td>
            <td class="text-end">
              <a href="index.php?page=ventas&action=edit&id=<?= $v['id'] ?>"
                 class="btn btn-sm btn-outline-secondary">editar</a>
              <a href="index.php?page=ventas&action=delete&id=<?= $v['id'] ?>"
                 class="btn btn-sm btn-outline-danger"
                 onclick="return confirm('¿eliminar esta venta?')">borrar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    const etiquetas = <?= $fechas_json ?>;
    const datos     = <?= $totales_json ?>;
    const ctx = document.getElementById('ventas-chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',    // gráfico de barras
      data: {
        labels: etiquetas,
        datasets: [{
          label: 'total ventas (s/)',
          data: datos,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            title: { display: true, text: 'fecha de venta' }
          },
          y: {
            title: { display: true, text: 'monto (s/)' },
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
