<?php
session_start();
echo "Hola " .$_SESSION['usuario'];
echo "<br>";

$_SESSION ['titulo'] = $_REQUEST['titulo'];
// Variables recogidas de modificar_libro_tabla_venda
$titulo = $_REQUEST['titulo'];
$cantidade = $_REQUEST['cantidade'];
$descripcion = $_REQUEST['descripcion'];
$editorial = $_REQUEST['editorial'];
$prezo = $_REQUEST['prezo'];
$foto = $_REQUEST['foto'];

// Variables para realizar la conexión a nuestra base de datos
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
$selector_libros_venda = "SELECT * FROM libro_venda";
$result =  mysqli_query($conn, $selector_libros_venda);

$numFilas = $result->num_rows;

if($numFilas > 0){
$modificar_datos_libro_venda = "UPDATE libro_venda set titulo = '".$titulo."', cantidade = '".$cantidade."', descripcion = '".$descripcion."', editorial = '".$editorial."', prezo = '".$prezo."', foto = '".$foto."' where titulo = '".$_SESSION['titulo']."'";
$result2 = mysqli_query($conn, $modificar_datos_libro_venda);
echo "Datos del libro " .$_SESSION['titulo']. " han sido modificados";
header("refresh:5;url=administradores.php");
}
mysqli_close($conn);
?>