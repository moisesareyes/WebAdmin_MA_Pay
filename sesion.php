<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios</h2>
    <form action="sesion2.php" method="post">
        <label for="cargo">Cargo:</label><br>
        <input type="text" id="cargo" name="cargo" required><br><br>
        <label for="user">User:</label><br>
        <input type="text" id="user" name="user" required><br><br>
        <label for="pass">Contraseña:</label><br>
        <input type="pass" id="pass" name="pass" required><br><br>
        <label for="nom">Nombre:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
