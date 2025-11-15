<?php
include("conexion.php");

$id = $_GET['id'];

$consulta = $conexion->query("SELECT * FROM tareas WHERE id=$id");
$tarea = $consulta->fetch_assoc();

if ($_POST) {
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];

    $conexion->query("UPDATE tareas SET nombre='$nombre', estado='$estado' WHERE id=$id");

    header("Location: index.php?mensaje=editado");
    exit();
}
?>

<form method="POST" class="container mt-4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <label>Tarea:</label>
    <input type="text" name="nombre" value="<?= $tarea['nombre'] ?>" class="form-control">

    <label class="mt-3">Estado:</label>
    <select name="estado" class="form-control">
        <option value="pendiente" <?= $tarea['estado']=='pendiente'?'selected':'' ?>>Pendiente</option>
        <option value="completada" <?= $tarea['estado']=='completada'?'selected':'' ?>>Completada</option>
    </select>

    <button class="btn btn-primary mt-3">Actualizar</button>
</form>
