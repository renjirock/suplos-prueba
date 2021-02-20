<?php

require 'Conexion.php';

$db = new Conexion();

$Id = $_POST['Id'];
$result = $db->query('DELETE FROM save_bienes WHERE Id = ?', $Id);
echo $result;