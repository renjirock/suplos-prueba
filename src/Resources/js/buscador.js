
function search(){//buscara los bienes guardados y los imprimira en pantalla
  let ciudad = document.getElementById('selectCiudad').value;
  let tipo = document.getElementById('selectTipo').value;
  let precio = document.getElementById('rangoPrecio').value;
  location.href="SearchData.php?ciudad="+ciudad+"&tipo="+tipo+"&precio="+precio;
}