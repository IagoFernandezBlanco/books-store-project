<?php
// Variables recogidas desde los input de index.html
$usuario = $_REQUEST['usuario'];
$contrasena = $_REQUEST['contrasena'];
// Variables para realizar la conexión a nuestra bas de datos
$servername = "localhost";
$database = "catalogo";
$usuario_base_datos = "root@localhost";
$contraseña_base_datos = "Iazul123?";

// Create connection
$conn = mysqli_connect($servername, $usuario_base_datos, $contraseña_base_datos, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// En la variable $insert_query se ha creado la accion de inserccion en la tabla usuarios
//Se empelan las variables recibidas desde el html y se insertan como VALUES de mi insercción
$insert_query = "INSERT INTO usuario(usuario, contrasinal, nome, direccion, telefono, nifdni, tipo_usuario)
VALUES ('".$usuario."','".$contrasena."','iago','Vigo',12345,'12345678A','a')";

// En caso de que la inserccion saliese correctamente, salta este mensaje por pantalla
If (mysqli_query($conn, $insert_query)) {
 echo 'Foi todo ben na inserción';
}
// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>


