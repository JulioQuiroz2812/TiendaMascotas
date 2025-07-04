<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Productos</h2>
  <a href="index.php?page=productos&action=create" class="btn btn-primary">Nuevo producto</a>
</div>

<div class="table-responsive">
  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio (S/)</th>
        <th>Stock</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($productos as $p): ?>
      <tr>
        <td><?= htmlspecialchars($p['nombre']) ?></td>
        <td><?= htmlspecialchars($p['descripcion']) ?></td>
        <td><?= number_format($p['precio'], 2) ?></td>
        <td><?= $p['stock'] ?></td>
        <td class="text-end">
          <a href="index.php?page=productos&action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
          <a href="index.php?page=productos&action=delete&id=<?= $p['id'] ?>" 
             class="btn btn-sm btn-outline-danger"
             onclick="return confirm('¿Eliminar este producto?')">
             Borrar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
