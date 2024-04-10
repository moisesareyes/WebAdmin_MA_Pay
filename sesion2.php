<?php
include('conex.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $nom = $_POST["nom"];
    $cargo = $_POST["cargo"];


    $sql_select = "SELECT * FROM web WHERE user = ?";
    if ($stmt_select = $link->prepare($sql_select)) {
        $stmt_select->bind_param("s", $user);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows > 0) {
            echo "El nombre de usuario ya está en uso.";
        } else {

            $sql_insert = "INSERT INTO web (cargo, user, pass, nom) VALUES (?, ?, ?, ?)";
            if ($stmt_insert = $link->prepare($sql_insert)) {
                
                $encrip = password_hash($pass, PASSWORD_DEFAULT);
                $stmt_insert->bind_param("ssss", $cargo, $user, $encrip, $nom);
                if ($stmt_insert->execute()) {
                    echo "Usuario registrado exitosamente.";
                } else {
                    echo "Error al registrar el usuario.";
                }
            } else {
                echo "Error en la preparación de la consulta.";
            }
        }
        $stmt_select->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }
    $link->close();
}
?>

