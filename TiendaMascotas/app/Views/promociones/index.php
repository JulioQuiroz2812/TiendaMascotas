<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Promociones</h2>
    <a href="index.php?page=promociones&action=create" class="btn btn-primary">Nueva Promoción</a>
</div>

<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Tipo de Descuento</th>
                <th>Valor</th>
                <th>Vigencia</th>
                <th>Criterio</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promociones as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td><?= htmlspecialchars($p['tipo_descuento']) ?></td>
                    <td><?= $p['tipo_descuento'] === 'PORCENTAJE' ? $p['valor_descuento'] . '%' : 'S/ ' . number_format($p['valor_descuento'], 2) ?></td>
                    <td><?= htmlspecialchars($p['fecha_inicio']) ?> a <?= htmlspecialchars($p['fecha_fin']) ?></td>
                    <td><?= htmlspecialchars($p['criterio_segmentacion']) ?></td>
                    <td class="text-end">
                        <a href="index.php?page=promociones&action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <a href="index.php?page=promociones&action=delete&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta promoción?')">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
