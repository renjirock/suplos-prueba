<?php
require 'views/SearchView.php';

$data = file_get_contents("Resources/data-1.json");

$products = json_decode($data, true);
$ciudad = $_GET['ciudad'];
$tipo = $_GET['tipo'];
$precio = $_GET['precio'];

$filtrado = array_filter($products, function($val) { return $val->Ciudad == "Los Angeles"; });

$citys = [];
$types = [];
foreach ($products as $product) {
    $citys[] = $product['Ciudad'];
}
foreach ($products as $product) {
    $types[] = $product['Tipo'];
}
$citysUnique = array_unique($citys);
$typesUnique = array_unique($types);


new SearchView($filtrado, $citysUnique, $typesUnique);