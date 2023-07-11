
<?php

$hostname = gethostname();
$esLocal = false;

if ($hostname === 'DESKTOP-7BU63PH') {
    $esLocal = true;
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "db_asistencia";
} else {
    $server   = "www.devzamora.com";
    $username = "JZ008US00001";
    $password = "Dayris97.";
    $database = "db_asistencia";
}

$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
