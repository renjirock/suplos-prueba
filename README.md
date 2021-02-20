# suplos-prueba
Prueba tecnica para trabajo en suplos

Se desarrolla junto a la herramienta de Docker, se agrega en la carpeta DB el script para la creacion de la tabla donde se guardan los datos, en dado caso que la aplicacion no encuentre la base de datos, se recomienda utilizar el comando

docker container ls -a

para buscar el contenedor de mysql, luego de eso copiar el container Id y utilizarlo con el comando 

docker container inspect (container Id)

y remplazar en el archivo conexion.php el IPAddress