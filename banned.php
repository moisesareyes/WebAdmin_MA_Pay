<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stilou.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA Pay | Baneos</title>
</head>
<body>
    <header>
        <nav>
            <img src="logobl.png">
            <ul>
                <li><a href="menu.php">Inicio</a></li>
                <li><a href="usuario.php">Usuarios registrados</a></li>
                <li><a href="Transac.php">Historial de Transacciones</a></li>
                <li><a href="opendi.php">Transacciones Pendientes</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <?php
    include ("conex.php");

    if ($link->connect_error) {
        die("Conexión fallida: " . $link->connect_error);
    }

    $user = $_POST['user'] ?? '';
    $razon = $_POST['razon'] ?? '';
    $tiempo = $_POST['tiempo'] ?? '';

    if (!empty($tiempo)) {
        $sql = "INSERT INTO bans (user, razon, tiempo) VALUES ('$user', '$razon', DATE_ADD(NOW(), INTERVAL $tiempo DAY))";

        if ($link->query($sql) === TRUE) {
            echo "<center><font color='white'>Usuario baneado correctamente.";
        } else {
            echo "<center><font color='white'>Error al banear al usuario: " . $link->error;
        }
    } else {
        echo "<center><font color='white'>Error: El valor de tiempo está vacío.<br>";
        echo "<button onclick='window.history.back();'>Volver al formulario</button>";
    }

    $link->close();
    ?>
</body>
</html>
