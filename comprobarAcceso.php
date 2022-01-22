<?php
// En esta sección se comprobará si el usuario + contraseña se encuentran registrados en la tabla usuario
// En caso afirmativo, se abre una nueva interfaz, con diversos botones
// EN caso negativo, se muestra unh mensaje de error por pantalla y se devuelve a la página inicial

// Variables para realizar la conexión a nuestra bas de datos
$servername = "localhost";
$database = "catalogo";
$usuario_base_datos = "root@localhost";
$contraseña_base_datos = "Iazul123?";

// Variables de los campos input de Index.html
$usuario = $_REQUEST['usuario'];
$contrasena = $_REQUEST['contrasena'];

// Create connection
$conn = mysqli_connect($servername, $usuario_base_datos, $contraseña_base_datos, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully ";

// Comprobar si existe el usuario en la base de datos existetes(tabla usuario)
// Un select es necesario, y con un numRows se verifica si existe o no

$select_query = "SELECT * from usuario where usuario ='".$usuario."' AND contrasinal='".$contrasena."'";

$result = mysqli_query($conn, $select_query);
$numFilas = $result->num_rows;


for ($x=0;$x<$numFilas;$x++){
    $fila = mysqli_fetch_array($result);//me traio
    
    echo "Nome:" . $fila['usuario'] . "<br/>";
     echo "Apelido:" . $fila['contrasinal'] . "<br/>";
     echo "Direccion:" . $fila['direccion'] . "<br/>";
     echo "<br/>";
    }
    
// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>