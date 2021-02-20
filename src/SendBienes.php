<?php
require 'Conexion.php';

$db = new Conexion();

$direccion = $db->query('SELECT * FROM save_bienes')->fetchAll();
foreach($direccion as $direc)
{
    echo '<span id="'.$direc['id'].'">';
        echo '<div>';
            echo '<p><h6><b>Direccion:</b></h6>';
            echo '<p id="Direccion'.$direc['id'].'">'.$direc['direccion'].'</p>';
            echo '</p>';
            echo '<p><h6><b>Ciudad:</b></h6>';
            echo '<p id="Ciudad'.$direc['id'].'">'.$direc['ciudad'].'</p>';
            echo '</p>';
            echo '<p><h6><b>Telefono:</b></h6>';
            echo '<p id="Telefono'.$direc['id'].'">'.$direc['telefono'].'</p>';
            echo '</p>';
            echo '<p><h6><b>Codigo Postal:</b></h6>';
            echo '<p id="Codigo_Postal'.$direc['id'].'">'.$direc['codigoPostal'].'</p>';
            echo '</p>';
            echo '<p><h6><b>Tipo:</b></h6>';
            echo '<p id="Tipo'.$direc['id'].'">'.$direc['tipo'].'</p>';
            echo '</p>';
            echo '<p><h6><b>Precio:</b></h6>';
            echo '<p id="Precio'.$direc['id'].'">$'.$direc['precio'].'</p>';
            echo '</p>';
        echo '</div>';
        echo '<div class="divider">';
        echo '</div>';
        echo '<button type="button"  id="deleteBtn'.$direc['id'].'" onclick="deleteBienes('.$direc['id'].')" value="'.$direc['id'].'" class="btn btn-warning btn-icon-split">delete </button>';
        echo '<span id="deletehide'.$direc['id'].'"></span>';
        echo '<hr>';
    echo '</span>';
}