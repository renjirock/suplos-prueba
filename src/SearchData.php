<?php
require 'views/SearchView.php';

function number($valor){ //Se desarrolla esta funcion para eliminar el signo $ y la , que se encuentra en el precio de los bienes, con esto facilitamos la busqueda por valor deseado
    return(int)preg_replace('/[^\-\d]*(\-?\d*),*/','$1',$valor);
}

$data = file_get_contents("Resources/data-1.json");

$products = json_decode($data, true);

$ciudad = $_GET['ciudad'];
$tipo = $_GET['tipo'];
$precio = $_GET['precio'];

$precios = explode(";", $precio); // utilizamos esto para dividir el valor del precio seleccionado en el front y logramos optener dos valores diferentes

if($ciudad == null && $tipo == null){// aunque me hubiese gustado utilizar array_filter para la optencion de los datos, el constante error y la falta de tiempo me inclinaron a hacer una solucion menos elegante pero igual de efectiva.
    foreach ($products as $product) {
        if(number($product['Precio']) >= intval($precios[0]) && number($product['Precio']) <= intval($precios[1])){
            $filtrado[] = $product;
        }
    }
}elseif($ciudad != null && $tipo != null){
    foreach ($products as $product) {
        if($product['Ciudad'] == $ciudad && $product['Tipo'] == $tipo && (number($product['Precio']) >= intval($precios[0]) && number($product['Precio']) <= intval($precios[1]))){
            $filtrado[] = $product;
        }
    }
}else{
    foreach ($products as $product) {
        if(($product['Ciudad'] == $ciudad || $product['Tipo'] == $tipo) && (number($product['Precio']) >= intval($precios[0]) && number($product['Precio']) <= intval($precios[1]))){
            $filtrado[] = $product;
        }
    }
}

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