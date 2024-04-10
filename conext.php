<?php
include ("conex.php");
if($link){
    $query="SELECT * FROM historial ORDER BY id DESC";
    $resul=mysqli_query($link, $query);
    if($resul->num_rows>0){


while ($dato = mysqli_fetch_array($resul)){
$id = $dato['ID'];
$ser = $dato['servidor'];
$rec = $dato['recep'];
$tip = $dato['tipo'];
$mon = $dato['moneda'];
$sta = $dato['status'];
$can = $dato['cantidad'];
$bil1 = $dato['billetera1'];
$bil2 = $dato['billetera2'];
$fec = $dato['fecha'];

?>
<tr>
    <td><?= $id ?></td>
    <td><?= $ser ?></td>
    <td><?= $rec ?></td>
    <td><?= $tip ?></td>
    <td><?= $mon ?></td>
    <td><?= $sta ?></td>
    <td><?= $can ?></td>
    <td><?= $bil1 ?></td>
    <td><?= $bil2 ?></td>
    <td><?= $fec ?></td>
    </tr>

<?php
}
    }
}
?>

