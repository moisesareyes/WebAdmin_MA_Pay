<?php
include ("conex.php");
if($link){
    $query="SELECT * FROM usuario ORDER BY id DESC";
    $resul=mysqli_query($link, $query);
    if($resul->num_rows>0){


while ($dato = mysqli_fetch_array($resul)){
$id = $dato['ID'];
$user = $dato['UserID'];
$nom = $dato['Nombre'];
$ape = $dato['Apellido'];
$usna = $dato['User_name'];
$email = $dato['Email'];

$tlf = $dato['Tlf'];
$reg = $dato['Reg'];

?>
<tr>
    <td><?= $id ?></td>
    <td><?= $user ?></td>
    <td><?= $nom ?></td>
    <td><?= $ape ?></td>
    <td><?= $usna ?></td>
    <td><?= $email ?></td>
    <td><?= $tlf ?></td>
    <td><?= $reg ?></td>
    </tr>

<?php
}
    }
}
?>

