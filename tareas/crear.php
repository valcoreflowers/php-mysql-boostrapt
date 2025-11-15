<?php
include("conexion.php");

if ($_POST) {
    $nombre = $_POST['nombre'];

    $query = "INSERT INTO tareas (nombre) VALUES ('$nombre')";
    $conexion->query($query);

    header("Location: index.php?mensaje=creado");
    exit();
}
?>
<form method="POST" class="container mt-4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <label>Nombre de la tarea:</label>
    <input type="text" name="nombre" class="form-control" required>

    <button class="btn btn-success mt-3">Guardar</button>
</form>
