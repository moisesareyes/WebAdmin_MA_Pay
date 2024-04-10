<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stilou.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA Pay | Recargas Pendientes</title>
</head>

<body>
    <header>
        <nav>
            <img src="logobl.png">
            <ul>
                <li><a href="menu.php">Inicio</a></li>
                <li><a href="usuario.php">Usuarios registrados</a></li>
                <li><a href="Transac.php">Historial de Transacciones</a></li>
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
                        <h2 class="text-center">Operaciones Pendientes</h2>
                        <?php
                        session_start();

                        if (!isset($_SESSION["user"])) {
                            header("Location: index.php");
                            exit;
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            $elemento_id = $_POST["elemento"];

                            include "conex.php";

                            if ($link->connect_error) {
                                die("Conexión fallida: " . $link->connect_error);
                            }

                            $sql_select = "SELECT * FROM recarga WHERE id = $elemento_id";
                            $result_select = $link->query($sql_select);

                            if ($result_select->num_rows > 0) {
                                $row = $result_select->fetch_assoc();
                                $cantidad = $row['cantidad'];
                                $poseedor = $row['usuario'];
                                $tipo_moneda = $row['tipo'];

                                $billeteraID = $poseedor . "-" . ($tipo_moneda == "Bs.D" ? "BSD" : "USD");

                                $sql_check_billetera = "SELECT * FROM billetera WHERE billeteraID = '$billeteraID'";
                                $result_check_billetera = $link->query($sql_check_billetera);

                                if ($result_check_billetera->num_rows > 0) {
                                    $sql_update_billetera = "UPDATE billetera SET cantidad = cantidad + $cantidad WHERE billeteraID = '$billeteraID'";
                                    if ($link->query($sql_update_billetera) === TRUE) {
                                        $sql_update_recarga = "UPDATE recarga SET status = 'Confirmado' WHERE id = $elemento_id";
                                        if ($link->query($sql_update_recarga) === TRUE) {
                                            
                                            $sql_update_historial = "UPDATE historial SET status = 'Confirmado' WHERE servidor = '$poseedor' AND cantidad = $cantidad";
                                            if ($link->query($sql_update_historial) === TRUE) {
                                                echo "<center><font color='green'>Operación confirmada con éxito.<br>";
                                                echo "<button onclick='window.history.back();'>Volver al formulario</button>";
                                            } else {
                                                echo "Error al actualizar el estado en la tabla historial: " . $link->error;
                                            }
                                        } else {
                                            echo "Error al actualizar el estado de la operación pendiente: " . $link->error;
                                        }
                                    } else {
                                        echo "Error al actualizar la cantidad en la billetera: " . $link->error;
                                    }
                                } else {
                                    echo "No se encontró una billetera asociada para el usuario y la moneda: $billeteraID";
                                }
                            } else {
                                echo "No se encontraron datos para la operación pendiente con ID: $elemento_id";
                            }

                            $link->close();
                        } else {
                            header("Location: menu.php");
                            exit;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
