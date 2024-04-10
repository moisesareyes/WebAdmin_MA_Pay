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
    <title>MA Pay | Retiros Pendientes</title>
</head>
<body>
    <header>
        <nav>
            <img src="logobl.png">
            <ul>
                <li><a href="menu.php">Inicio</a></li>
                <li><a href="usuario.php">Usuarios registrados</a></li>
                <li><a href="transac.php">Historial de Transacciones</a></li>
                <li><a href="susp.php">Suspensiones</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Retiros Pendientes</h2>
                        <form action="rpendien.php" method="post" id="operacionForm">
                            <div class="form-group">
                                <label for="elemento">Selecciona la operación:</label>
                                <select class="form-control" name="elemento" id="elemento" onchange="mostrarDetalles()">
                                    <?php
                                    include "conex.php";

                                    if ($link->connect_error) {
                                        die("Conexión fallida: " . $link->connect_error);
                                    }

                                    $sql = "SELECT id, usuario FROM retiros WHERE status = 'Pendiente'";
                                    $resul = $link->query($sql);

                                    if ($resul->num_rows > 0) {

                                        while($row = $resul->fetch_assoc()) {
                                            echo "<option value='". $row["id"]. "'>" . $row["usuario"]. "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay retiros pendientes</option>";
                                    }

                                    $link->close();
                                    ?>
                                </select>
                            </div>
                            <div id="detallesOperacion"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                <a href="opendi.php" class="btn btn-secondary">Volver a Operaciones Pendientes</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarDetalles() {
            var elementoSeleccionado = document.getElementById("elemento").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("detallesOperacion").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "detrpendi.php?id=" + elementoSeleccionado, true);
            xhttp.send();
        }
    </script>
</body>
</html>
