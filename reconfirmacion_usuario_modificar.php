<?php
// Script que recoge los valores de los input de modificar-usuario.php
// Y hace un update de los campos que han sido modificados por el usuario
// Con el fin de que pueda modificar los campos que el quiera, salvo su usuario

// Inicio de la session de logue para recoger el nombre de nuestro usuario actual
// A fin de que puedas hacer solo un update de ese usuario específico
// nevitando de otras maneras que un usuario pueda modificar otro usuario
// desde su porpia cuenta
session_start();
$usuario = $_SESSION['usuario'];

$contrasena = $_REQUEST['contrasinal'];
$nome = $_REQUEST['nome'];
$direccion = $_REQUEST['direccion'];
$telefono = $_REQUEST['telefono'];
$nifdni = $_REQUEST['nifdni'];

// echo "Modificando del usuario " .$usuario ."" .$contrasena ."" .$direccion ."" .$telefono ."" .$nifdni;
// Variables para realizar la conexión a nuestra bas de datos
$servername = "localhost";
$database = "catalogo";
$usuario_base_datos = "root@localhost";
$contraseña_base_datos = "Iazul123?";

// Variable donde se almacena/crea la conexiona 
$conn = mysqli_connect($servername, $usuario_base_datos, $contraseña_base_datos, $database);
// Verificamos si la conexion se realiza(las variables que le pasamos como argumento)
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Gracias a las sessions, podemos modificar el usuario por su username
// Modificamos todos los campos, salvo username, y tambien solo el porpio usuario puede modificar sus datos.
$query_update_usuario = "UPDATE usuario set contrasinal = '".$contrasena."', nome = '".$nome."', direccion ='".$direccion."', telefono ='".$telefono."', nifdni ='".$nifdni."' where usuario = '".$usuario."'"; 

if(mysqli_query($conn, $query_update_usuario)){
    echo "usuario modified";
    header("Location: libros.php");
}
// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>