<?php
session_start();
require_once "config/database.php";

// Obtener el último ID insertado del usuario logueado
$id_user = $_SESSION['id_user'];

// Realizar el UPDATE en la tabla "historico" con la hora de salida actual
$updateQuery = mysqli_query($mysqli, "UPDATE historico SET salida = NOW() WHERE id = (SELECT MAX(id) FROM historico WHERE usuario = '$id_user')")
    or die('Error: ' . mysqli_error($mysqli));

// Eliminar la sesión y redirigir a la página de inicio de sesión con una alerta
session_destroy();
header('Location: index.php?alert=2');


