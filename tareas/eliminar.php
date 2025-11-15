<?php
include("conexion.php");

$id = $_GET['id'];

$conexion->query("DELETE FROM tareas WHERE id=$id");

header("Location: index.php?mensaje=eliminado");
exit();
?>
