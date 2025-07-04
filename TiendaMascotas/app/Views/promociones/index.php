<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Promociones</h2>
  <a href="index.php?page=promociones&action=create" class="btn btn-primary">Nueva promoción</a>
</div>

<div class="table-responsive">
  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Nombre</th>
        <th>Descuento</th>
        <th>Vigencia</th>
        <th>Criterio</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($promociones as $p): ?>
      <tr>
        <td><?= htmlspecialchars($p['nombre']) ?></td>
        <td>
          <?= $p['tipo_descuento']==='PORCENTAJE'
               ? $p['valor_descuento'].'%' 
               : 'S/ '.$p['valor_descuento'] ?>
        </td>
        <td><?= $p['fecha_inicio'] ?> → <?= $p['fecha_fin'] ?></td>
        <td><?= htmlspecialchars($p['criterio_segmentacion']) ?></td>
        <td class="text-end">
          <a href="index.php?page=promociones&action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
          <a href="index.php?page=promociones&action=delete&id=<?= $p['id'] ?>" 
             class="btn btn-sm btn-outline-danger"
             onclick="return confirm('¿Eliminar esta promoción?')">
             Borrar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
