<?php 
require 'Conexion.php';
//Con una solucion de ajax se logra almacenar los datos sin la necesidad de recargar la pagina.
$db = new Conexion();
$direccion = $_POST['Direccion'];
$ciudad = $_POST['Ciudad'];
$telefono = $_POST['Telefono'];
$codigoPostal = $_POST['CodigoPostal'];
$tipo = $_POST['Tipo'];
$precio = $_POST['Precio'];
$insert = $db->query('INSERT into save_bienes values (null, ?, ?, ?,?,?,?)', $direccion, $ciudad, $telefono, $codigoPostal, $tipo, $precio);
echo $insert->affectedRows();