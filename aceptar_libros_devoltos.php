<?php
session_start();
$usuario = $_SESSION['usuario'];

$titulo = $_REQUEST['titulo'];

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
$selector_libros_devoltos = "SELECT * FROM libro_aluguer where titulo ='".$titulo."'";
$result = mysqli_query($conn, $selector_libros_devoltos);

while ($row = mysqli_fetch_assoc($result)) {

    // Recogiendo todos los diferentes campos ue hay en la tabla libros aluguer.
    $cantidade_libros_actual = $row['cantidade'];
    
    
    // Si la cantidad es mayor que cero, hace un update y elimina una unidad
    if($cantidade_libros_actual > 0){
    $cantidade_libros_actualizada = $cantidade_libros_actual + 1;
    $libros_aluguer_actualizar = "UPDATE libro_aluguer set cantidade = '".$cantidade_libros_actualizada."' where titulo = '".$titulo."'";
    $result2 = mysqli_query($conn, $libros_aluguer_actualizar);
      
    $borrar_libro_devolto = "DELETE FROM libro_devolto where titulo = '".$titulo."'";
    $result3 = mysqli_query($conn, $borrar_libro_devolto);
    }
    echo "Titulo devuelto";
    header("refresh:3; url = administradores.php");
    }
mysqli_close($conn);
?>