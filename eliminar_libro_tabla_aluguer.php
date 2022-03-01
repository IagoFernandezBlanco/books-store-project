<?php
session_start();
echo "Hola " .$_SESSION['usuario'];
echo "<br>"; 
// Variables de los libros
// Se usara el titulo para realizar las insercciones y deletes necesario
$titulo = $_REQUEST['titulo'];

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

$borrar_libro_tabla_venda = "DELETE FROM libro_aluguer where titulo = '".$titulo."'";
$result = mysqli_query($conn, $borrar_libro_tabla_venda);
echo "Libro de aluguer eliminado";
header("refresh:3;url=eliminar_libros_aluguer.php");

mysqli_close($conn);
?>