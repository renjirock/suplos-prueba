<?php
include 'HeadView.php';
include 'ScriptView.php';
//se desplega la pagina de busqueda
class SearchView
{
    public function __construct($products, $citys, $types)
    {
        ?>
            <?php new HeadView(); ?>
            <body>
                <video src="img/video.mp4" id="vidFondo"></video>

                <div class="contenedor">
                    <div class="card rowTitulo">
                        <h1>Bienes Intelcost</h1>
                    </div>
                    <div class="colFiltros">
                        <form id="formulario">
                            <div class="filtrosContenido">
                                <div class="tituloFiltros">
                                    <h5>Filtros</h5>
                                </div>
                                <div class="filtroCiudad input-field">
                                    <p><label for="selectCiudad">Ciudad:</label><p></p>
                                    <select name="ciudad" id="selectCiudad">
                                        <option value="" selected>Elige una ciudad</option>
                                        <?php
                                            foreach ($citys as $city) {
                                                echo '<option value="'.$city.'">';
                                                echo $city;
                                                echo '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="filtroTipo input-field">
                                    <p><label for="selecTipo">Tipo:</label></p>
                                    <p>
                                    <select name="tipo" id="selectTipo">
                                        <option value="">Elige un tipo</option>
                                        <?php
                                            foreach ($types as $type) {
                                                echo '<option value="'.$type.'">';
                                                echo $type;
                                                echo '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="filtroPrecio">
                                    <label for="rangoPrecio">Precio:</label>
                                    <input type="text" id="rangoPrecio" name="precio" value="" />
                                </div>
                                <div class="botonField">
                                    <button class="btn white" type="button" id="submitButton" onclick="search()">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="tabs" style="width: 75%;">
                        <ul>
                            <li><a href="#tabs-1">Bienes disponibles</a></li>
                            <li><a href="#tabs-2" id="tab2">Mis bienes</a></li>
                            <li><a href="#tabs-3" id="tab3">Reportes</a></li>
                        </ul>
                        <div id="tabs-1">
                            <div  id="divResultadosBusqueda">
                                <?php
                                    
                                    foreach ($products as $product) {
                                        ?>
                                            <div class="tituloContenido card filterDiv <?php echo str_replace(" ", "_", $product['Ciudad']); echo " "; echo str_replace(" ", "_", $product['Tipo']); ?>" style="justify-content: center;">
                                                <img src="https://media.istockphoto.com/photos/for-sale-sign-in-yard-of-house-picture-id109350668?k=6&m=109350668&s=612x612&w=0&h=8Y7iXu1b1GL7nqGoKG2VG7sUCeSOCmRiNtzuPmFss5w=" alt="Smiley face" width="200" height="200">
                                                <div>
                                                <?php
                                                    echo '<p><h6><b>Direccion:</b></h6>';
                                                    echo '<p id="Direccion'.$product['Id'].'">'.$product['Direccion'].'</p>';
                                                    echo '</p>';
                                                    echo '<p><h6><b>Ciudad:</b></h6>';
                                                    echo '<p id="Ciudad'.$product['Id'].'">'.$product['Ciudad'].'</p>';
                                                    echo '</p>';
                                                    echo '<p><h6><b>Telefono:</b></h6>';
                                                    echo '<p id="Telefono'.$product['Id'].'">'.$product['Telefono'].'</p>';
                                                    echo '</p>';
                                                    echo '<p><h6><b>Codigo Postal:</b></h6>';
                                                    echo '<p id="Codigo_Postal'.$product['Id'].'">'.$product['Codigo_Postal'].'</p>';
                                                    echo '</p>';
                                                    echo '<p><h6><b>Tipo:</b></h6>';
                                                    echo '<p id="Tipo'.$product['Id'].'">'.$product['Tipo'].'</p>';
                                                    echo '</p>';
                                                    echo '<p><h6><b>Precio:</b></h6>';
                                                    echo '<p id="Precio'.$product['Id'].'">'.$product['Precio'].'</p>';
                                                    echo '</p>';
                                                ?>
                                                </div>
                                                <div class="divider">
                                                </div>
                                                <?php
                                                    echo '<button type="button"  Id="saveBtn'.$product['Id'].'" onclick="save('.$product['Id'].')" value="'.$product['Id'].'" class="btn btn-warning btn-icon-split">save';

                                                ?>
                                                <div class="divider">
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    
                        <div id="tabs-2" >
                            <div class="colContenido" id="divResultadosBusqueda">
                            <div class="tituloContenido card" style="justify-content: center;">
                                <h5>Bienes guardados:</h5>
                                <span id="resultado"></span>
                                <div class="divider"></div>
                            </div>
                            </div>
                        </div>
                        <div id="tabs-3" >
                            <div class="colContenido" id="divResultadosBusqueda">
                                <div class="tituloContenido card" style="justify-content: center;">
                                    <h5>Exportar reporte:</h5>
                                    <form id="formulario">
                                        <div class="filtrosContenido">
                                            <div class="tituloFiltros">
                                                <h5>Filtros</h5>
                                            </div>
                                            <div class="filtroCiudad input-field">
                                                <p><label for="selectCiudad">Ciudad:</label><p></p>
                                                <select name="ciudad" id="selectCiudadExcel">
                                                    <option value="" selected>Elige una ciudad</option>
                                                    <?php
                                                        foreach ($citys as $city) {
                                                            echo '<option value="'.$city.'">';
                                                            echo $city;
                                                            echo '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="filtroTipo input-field">
                                                <p><label for="selecTipo">Tipo:</label></p>
                                                <p>
                                                <select name="tipo" id="selectTipoExcel">
                                                    <option value="">Elige un tipo</option>
                                                    <?php
                                                        foreach ($types as $type) {
                                                            echo '<option value="'.$type.'">';
                                                            echo $type;
                                                            echo '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="botonField">
                                                <button class="btn white" type="button" onclick="excelOpen()" id="excelButton">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php new ScriptView(); ?>
                    <script>
                        function save(Id) { // esta funcion guardara los bienes en la base de datos 
                            let Direccion = document.getElementById('Direccion'+Id).innerHTML;
                            let Ciudad = document.getElementById('Ciudad'+Id).innerHTML;
                            let Telefono = document.getElementById('Telefono'+Id).innerHTML;
                            let CodigoPostal = document.getElementById('Codigo_Postal'+Id).innerHTML;
                            let Tipo = document.getElementById('Tipo'+Id).innerHTML;
                            let Precio = document.getElementById('Precio'+Id).innerHTML;
                            let lastPrecio = Precio.replace("$","");
                            let precio = lastPrecio.replace(",","");
                            var parametros = {
                                "Direccion" : Direccion,
                                "Ciudad" : Ciudad,
                                "Telefono" : Telefono,
                                "CodigoPostal" : CodigoPostal,
                                "Tipo" : Tipo,
                                "Precio" : precio,
                            }
                            $.ajax({
                                data:  parametros, //datos que se envian a traves de ajax
                                url:   'SaveBienes.php', //archivo que recibe la peticion
                                type:  'post', //método de envio
                                beforeSend: function () {
                                        $("#saveBtn"+Id).html("Procesando, espere por favor...");
                                    },
                                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                    $('#saveBtn'+Id).hide();
                                }
                            });
                        }
                        function myBienes(){//buscara los bienes guardados y los imprimira en pantalla
                            $.ajax({
                                url:   'sendBienes.php', //archivo que recibe la peticion
                                beforeSend: function () {
                                        $("#resultado").html("Procesando, espere por favor...");
                                    },
                                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                    $("#resultado").html(response);
                                }
                            });
                        }
                        function deleteBienes(Id){//eliminara los bienes seleccionados
                            var parametros = {
                                "Id" : Id,
                            }
                            $.ajax({
                                data:  parametros, //datos que se envian a traves de ajax
                                url:   'Delete.php', //archivo que recibe la peticion
                                type:  'post', //método de envio
                                beforeSend: function () {
                                        $("#deletehide"+Id).html("Procesando, espere por favor...");
                                    },
                                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                    $('#'+Id).hide();
                                }
                            });
                        }
                        document.getElementById("tab2").onclick = function() {myBienes()};
                        $( document ).ready(function() {
                            $( "#tabs" ).tabs();
                        });

                        function excelOpen(){
                            var ciudad = document.getElementById("selectCiudadExcel").value;
                            var tipo = document.getElementById("selectTipoExcel").value;
                            location.href="Excel.php?ciudad="+ciudad+"&tipo="+tipo;
                        }
                        function search(){//buscara los bienes guardados y los imprimira en pantalla
                            let ciudad = document.getElementById('selectCiudad').value;
                            let tipo = document.getElementById('selectTipo').value;
                            let precio = document.getElementById('rangoPrecio').value;
                            location.href="SearchData.php?ciudad="+ciudad+"&tipo="+tipo+"&precio"+precio;
                        }
                    </script>
                </body>
            </html>
        <?php
    }
}

