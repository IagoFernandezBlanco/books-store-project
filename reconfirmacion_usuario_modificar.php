<?php
// Script que recoge los valores de los input de modificar-usuario.php
// Y hace un update de los campos que han sido modificados por el usuario
// Con el fin de que pueda modificar los campos que el quiera, salvo su usuario

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
// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>