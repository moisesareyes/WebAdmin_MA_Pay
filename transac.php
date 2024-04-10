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
    <title>MA Pay | Historial</title>
    
</head>
    <body>

        <header>
            <nav>
                    <img src="logobl.png">
                <ul>
                    <li><a href="menu.php">Inicio</a></li>
                    <li><a href="usuario.php">Usuarios registrados</a></li>
                    <li><a href="opendi.php">Transacciones Pendientes</a></li>
                    <li><a href="susp.php">Suspensiones</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>
        <table class="table table-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Servidor</th>
                <th scope="col">Receptor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Moneda</th>
                <th scope="col">Status</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Billetera1</th>
                <th scope="col">Billetera2</th>
                <th scope="col">Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php require_once 'conext.php' ?>
              <tr></tr>
            </tbody>
          </table>