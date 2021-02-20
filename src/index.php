<?php 

require 'views/SearchView.php';

$data = file_get_contents("Resources/data-1.json");
$products = json_decode($data, true);
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
new SearchView($products, $citysUnique, $typesUnique);
?>