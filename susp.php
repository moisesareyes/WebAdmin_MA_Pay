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
    <title>MA Pay | Suspensiones</title>
    <style>
        .hidden {
            display: none;
        }

        .center-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src="logobl.png">
            <ul>
                <li><a href="menu.php">Inicio</a></li>
                <li><a href="usuario.php">Usuarios registrados</a></li>
                <li><a href="transac.php">Historial de Transacciones</a></li>
                <li><a href="opendi.php">Transacciones Pendientes</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Términos y Condiciones de MA Pay</h3>
                        <button id="toggleTerms" class="btn btn-primary mb-3">Mostrar Términos y Condiciones</button>
                        <div id="termsContent" class="hidden">
                            <div id="page1">
                            <p>
                                        <strong>1. MA Pay</strong><br>
                                        1.1. Nuestra aplicación ofrece servicios de monedero digital que permiten a los usuarios realizar transferencias, retiros y recargas en dólares y bolívares.
                                    </p>
                                    <p>
                                        <strong>2. Registro y Cuenta de Usuario</strong><br>
                                        2.1. Para utilizar nuestros servicios, los usuarios deben registrarse y crear una cuenta de usuario, además de por supuesto ser mayores de edad o tener supervisión de un adulto.<br>
                                        2.2. Los usuarios son responsables de mantener la confidencialidad de su información de inicio de sesión y son responsables de todas las actividades que ocurran en su cuenta.
                                    </p>
                                    <p>
                                        <strong>3. Transferencias y Pagos</strong><br>
                                        3.1. Los usuarios pueden realizar transferencias de fondos a otros usuarios de la aplicación o a cuentas bancarias externas.<br>
                                        3.2. Todas las transferencias y pagos están sujetos a las tarifas y límites establecidos por nuestra aplicación, que pueden estar sujetos a cambios sin previo aviso.
                                    </p>
                            </div>
                            <div id="page2" class="hidden">
                            <p>
                                        <strong>4. Retiros</strong><br>
                                        4.1. Los usuarios pueden retirar fondos de su billetera Ma Pay a cuentas bancarias externas o a través de otros métodos de pago disponibles en la aplicación.<br>
                                        4.2. Los retiros están sujetos a tarifas y límites establecidos por nuestra aplicación.
                                    </p>
                                    <p>
                                        <strong>5. Recargas</strong><br>
                                        5.1. Los usuarios pueden recargar fondos en su billetera Ma Pay mediante métodos de pago aceptados por nuestra aplicación.<br>
                                        5.2. Las recargas están sujetas a tarifas y límites establecidos por nuestra aplicación.
                                    </p>
                                    <p>
                                        <strong>6. Divisas</strong><br>
                                        6.1. Nuestra aplicación permite realizar transacciones en dólares y bolívares.<br>
                                        6.2. Los tipos de cambio aplicables a las transacciones en diferentes monedas están sujetos a fluctuaciones del mercado y pueden cambiar en cualquier momento sin previo aviso.
                                    </p>
                            </div>
                            <div id="page3" class="hidden">
                            <p>
                                        <strong>7. Seguridad</strong><br>
                                        7.1. Nos comprometemos a mantener la seguridad de la información del usuario y a protegerla contra el acceso no autorizado o el uso indebido.<br>
                                        7.2. Los usuarios son responsables de mantener la seguridad de su cuenta y deben informar cualquier actividad sospechosa de inmediato.
                                    </p>
                                    <p>
                                        <strong>8. Responsabilidad</strong><br>
                                        8.1. No nos hacemos responsables de cualquier pérdida, daño o costo incurrido como resultado del uso de nuestros servicios, excepto en la medida en que la ley lo permita.
                                    </p>
                                    <p>
                                        <strong>9. Modificaciones</strong><br>
                                        9.1. Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento sin previo aviso.<br>
                                        9.2. Los cambios entrarán en vigencia tan pronto como se publiquen en nuestra aplicación.
                                    </p>
                                    <p>
                                        <strong>10. Ley Aplicable</strong><br>
                                        10.1. Estos términos y condiciones se rigen por las leyes venezolanas.
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="center-buttons">
                        <button id="prevPage" class="btn btn-primary mr-2" disabled>Anterior</button>
                        <button id="nextPage" class="btn btn-primary" >Siguiente</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="text-center">Suspensiones</h2>
                        <p class="text-danger">Si algún usuario incumple algún término o condición de Ma Pay, será sancionado del servicio dependiendo de la gravedad.</p>
                        <form action="banned.php" method="post">
                            <div class="form-group">
                                <label for="user">Usuario: </label>
                                <input type="text" class="form-control" id="user" name="user" required>
                            </div>
                            <div class="form-group">
                                <label for="reason">Razón: </label>
                                <textarea class="form-control" id="razon" name="razon" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="banTime">Duración de la sanción:</label>
                                <select class="form-control" id="tiempo" name="tiempo" required>
                                    <option value="3">3 días</option>
                                    <option value="7">1 semana</option>
                                    <option value="14">2 semanas</option>
                                    <option value="30">1 mes</option>
                                    <option value="90">3 meses</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres tomar acciones contra este usuario?');">Sancionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var currentPage = 1;
        var totalPages = 3;
        document.getElementById('toggleTerms').addEventListener('click', function() {
            var termsContent = document.getElementById('termsContent');
            if (termsContent.classList.contains('hidden')) {
                termsContent.classList.remove('hidden');
                this.textContent = 'Ocultar Términos y Condiciones';
            } else {
                termsContent.classList.add('hidden');
                this.textContent = 'Mostrar Términos y Condiciones';
            }
        });

        document.getElementById('nextPage').addEventListener('click', function() {
            if (currentPage < totalPages) {
                document.getElementById('page' + currentPage).classList.add('hidden');
                currentPage++;
                document.getElementById('page' + currentPage).classList.remove('hidden');
                if (currentPage === totalPages) {
                    document.getElementById('nextPage').setAttribute('disabled', 'disabled');
                }
                document.getElementById('prevPage').removeAttribute('disabled');
            }
        });

        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                document.getElementById('page' + currentPage).classList.add('hidden');
                currentPage--;
                document.getElementById('page' + currentPage).classList.remove('hidden');
                if (currentPage === 1) {
                    document.getElementById('prevPage').setAttribute('disabled', 'disabled');
                }
                document.getElementById('nextPage').removeAttribute('disabled');
            }
        });
    </script>
</body>
</html>
