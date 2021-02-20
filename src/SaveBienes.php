<?php 
require 'Conexion.php';

$db = new Conexion();
$direccion = $_GET['Direccion'];
$ciudad = $_POST['Ciudad'];
$telefono = $_POST['Telefono'];
$codigoPostal = $_POST['CodigoPostal'];
$tipo = $_POST['Tipo'];
$precio = $_POST['Precio'];
$insert = $db->query('INSERT into save_bienes values (null, ?, ?, ?,?,?,?)', $direccion, $ciudad, $telefono, $codigoPostal, $tipo, $precio);
echo $insert->affectedRows();