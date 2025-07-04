<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Recordatorios</h2>
  <a href="index.php?page=recordatorios&action=create"
     class="btn btn-primary">Nuevo recordatorio</a>
</div>

<?php if (!empty($_SESSION['flash'])): ?>
  <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
    <?= htmlspecialchars($_SESSION['flash']['message']) ?>
    <?php unset($_SESSION['flash']); ?>
  </div>
<?php endif; ?>

<div class="table-responsive">
  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Descripción</th>
        <th>Fecha</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recordatorios as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['descripcion']) ?></td>
        <td><?= htmlspecialchars($r['fecha_recordatorio']) ?></td>
        <td class="text-end">
          <a href="index.php?page=recordatorios&action=edit&id=<?= $r['id'] ?>"
             class="btn btn-sm btn-outline-secondary">Editar</a>
          <a href="index.php?page=recordatorios&action=delete&id=<?= $r['id'] ?>"
             class="btn btn-sm btn-outline-danger"
             onclick="return confirm('¿Eliminar este recordatorio?')">
             Borrar
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
