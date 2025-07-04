<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Ventas</h2>
  <a href="index.php?page=ventas&action=create" class="btn btn-primary">Nueva venta</a>
</div>

<div class="table-responsive">
  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Cliente</th>
        <th>Fecha de venta</th>
        <th>Total (S/)</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($ventas as $v): ?>
      <tr>
        <td><?= htmlspecialchars($v['cliente_nombre']) ?></td>
        <td><?= htmlspecialchars($v['fecha_venta']) ?></td>
        <td><?= number_format($v['total'], 2) ?></td>
        <td class="text-end">
          <a href="index.php?page=ventas&action=edit&id=<?= $v['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
          <a href="index.php?page=ventas&action=delete&id=<?= $v['id'] ?>" 
             class="btn btn-sm btn-outline-danger"
             onclick="return confirm('¿Eliminar esta venta?')">
             Borrar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
