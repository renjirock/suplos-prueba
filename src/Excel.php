<?php
require 'Conexion.php';

$db = new Conexion();

$ciudad = $_GET['ciudad'];
$tipo = $_GET['tipo'];
if($ciudad === null && $tipo === null){
    $direccion = $db->query('SELECT * FROM save_bienes')->fetchAll();
}elseif($ciudad != null && $tipo != null){
    $direccion = $db->query('SELECT * FROM save_bienes WHERE ciudad = ? and tipo = ?', $ciudad, $tipo)->fetchAll();
}else{
    $direccion = $db->query('SELECT * FROM save_bienes WHERE ciudad = ? or tipo = ?', $ciudad, $tipo)->fetchAll();
}


header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=BienesGuardados.xls');

?>
<table border="1">
    <tr>
    <th><?php echo $ciudad; ?></th>
        <th>Direccion</th>
        <th>ciudad</th>
        <th>Telefono</th>
        <th>Codigo postal</th>
        <th>Tipo</th>
        <th>Precio</th>
    </tr>
<?php
foreach($direccion as $direc)
    {
        ?>

        
        <tr>
            <td><?php echo $direc['direccion']; ?></td>
            <td><?php echo $direc['ciudad']; ?></td>
            <td><?php echo $direc['telefono'];?></td>
            <td><?php echo $direc['codigoPostal'];?></td>
            <td><?php echo $direc['tipo']; ?></td>
            <td><?php echo $direc['precio']; ?></td>
        </tr>
        <?php
    }
?>
</table>