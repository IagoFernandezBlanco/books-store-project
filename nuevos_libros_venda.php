<?php
// Variables recogidas de añadir_libro_aluguer.html
$titulo = $_REQUEST['titulo'];
$cantidade = $_REQUEST['cantidade'];
$descripcion = $_REQUEST['descripcion'];
$editorial = $_REQUEST['editorial'];
$prezo = $_REQUEST['prezo'];
$foto = $_REQUEST['foto'];

// Variables de conexion con la base de datos
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
$insertar_libro_aluguer = "INSERT INTO libro_venda(titulo, cantidade, descripcion, editorial, prezo, foto) VALUES ('".$titulo."', '".$cantidade."', '".$descripcion."', '".$editorial."', '".$prezo."', '".$foto."')";
$result = mysqli_query($conn, $insertar_libro_aluguer);
echo "Nuevo libro a la venta";
header("refresh:3; url = administradores.php");
mysqli_close($conn);
?>