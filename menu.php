<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

include "conex.php";

if ($link->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $link->connect_error);
}

$cons = "SELECT nom FROM web WHERE user = '" . $_SESSION["user"] . "'";
$resuln = $link->query($cons);

if (!$resuln) {
    die("Error en la consulta: " . $link->error);
}

if ($resuln->num_rows > 0) {
    $fila = $resuln->fetch_assoc();
    $nomb = $fila["nom"];
} else {
    $nomb = "Nombre Desconocido";
}

$link->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="stilou.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA Pay | Admin</title>
    <style>
        body {
            position: relative;
        }
        .welcome-text {
            position: absolute;
            bottom: 1px;
            left: 85px;
            font-size: 14px;
            font-family: "Sora", sans-serif;
            color: #fff;
            font-weight: 600;
        }
        .status-dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            position: absolute;
            bottom: -40px;
            left: 42%;
            transform: translateX(-50%);
            background-color: <?php echo ($_SERVER['REMOTE_ADDR'] === '192.168.0.100:3306') ? 'red' : 'green'; ?>;
        }
        .status-message {
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src="logobl.png">
            <ul>
                <li><a href="transac.php">Historial de Transacciones</a></li>
                <li><a href="usuario.php">Usuarios registrados</a></li>
                <li><a href="opendi.php">Transacciones Pendientes</a></li>
                <li><a href="susp.php">Suspensiones</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <p class="welcome-text">Bienvenido, <?php echo $nomb; ?></p>
    <div class="status-dot"></div>
    <p class="status-message"><?php echo ($_SERVER['REMOTE_ADDR'] === '192.168.0.100:3306') ? 'El servicio no está activo' : 'El servicio está activo'; ?></p>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
