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
    <title>MA Pay | Registros</title>
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
    </style>
</head>
    <body>

        <header>
            <nav>
                    <img src="logobl.png">
                <ul>
                    <li><a href="menu.php">Inicio</a></li>
                    <li><a href="transac.php">Historial de Transacciones</a></li>
                    <li><a href="opendi.php">Transacciones Pendientes</a></li>
                    <li><a href="susp.php">Suspensiones</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>

        <table class="table table-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Fecha de Registro</th>
              </tr>
            </thead>
            <tbody>
              <?php require_once 'conexu.php' ?>
              <tr></tr>
            </tbody>
          </table>