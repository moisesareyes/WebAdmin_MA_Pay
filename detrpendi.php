<?php
include "conex.php";

if ($link->connect_error) {
    die("Conexión fallida: " . $link->connect_error);
}

$elemento_id = $_GET["id"];

$sql = "SELECT * FROM retiros WHERE id = $elemento_id";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h3>Detalles de la operación:</h3>";
    echo "<p>Usuario: " . $row["usuario"] . "</p>";
    echo "<p>Documento: " . $row["documento"] . "</p>";
    echo "<p>Entidad: " . $row["banco"] . "</p>";
    echo "<p>Contacto: " . $row["tlf"] . "</p>";
    echo "<p>Cantidad: " . $row["cantidad"] . "</p>";
} else {
    echo "<p>No se encontraron detalles para la operación seleccionada.</p>";
}

$link->close();
?>
