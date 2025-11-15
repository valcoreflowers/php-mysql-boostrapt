<?php
include("conexion.php");

$filtro = isset($_GET['estado']) ? $_GET['estado'] : '';

if ($filtro != "") {
    $resultado = $conexion->query("SELECT * FROM tareas WHERE estado='$filtro'");
} else {
    $resultado = $conexion->query("SELECT * FROM tareas");
}
?>

<div class="container mt-4">
    <h2>Lista de tareas</h2>

    <a href="crear.php" class="btn btn-success mb-3">Nueva tarea</a>

    <!-- FILTROS -->
    <form class="mb-3" method="GET">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <select name="estado" class="form-select" style="width:200px; display:inline-block;">
            <option value="">Todas</option>
            <option value="pendiente" <?= $filtro=='pendiente'?'selected':'' ?>>Pendientes</option>
            <option value="completada" <?= $filtro=='completada'?'selected':'' ?>>Completadas</option>
        </select>

        <button class="btn btn-primary">Filtrar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarea</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['estado'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
