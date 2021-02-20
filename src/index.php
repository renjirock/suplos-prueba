<?php 

require 'views/SearchView.php';

$data = file_get_contents("Resources/data-1.json"); //primero se lee los datos por parte del json, inicialmente queria desarollarlo todo en un framework en el cual colabore un poco llamado infinitesimal, pero como era requerido en php puro decidi utilizar docker
$products = json_decode($data, true);
$citys = [];
$types = [];
foreach ($products as $product) {// se determina las ciudades disponibles
    $citys[] = $product['Ciudad'];
}
foreach ($products as $product) {// se determina los tipos de vivienda disponibles
    $types[] = $product['Tipo'];
}
$citysUnique = array_unique($citys);
$typesUnique = array_unique($types);
new SearchView($products, $citysUnique, $typesUnique);
?>