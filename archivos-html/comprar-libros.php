<?php
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
$seleccionar_libros_compra = "SELECT * FROM libro_venda where titulo = '".$titulo."'";
$result = mysqli_query($conn, $seleccionar_libros_compra);

// Con esta linea, recojo los valores del resultado del select
while ($row = mysqli_fetch_assoc($result)) {
    // Recogiendo todos los diferentes campos ue hay en la tabla libros aluguer.
    $titulo_libro = $row['titulo'];
    $cantidade_libros_actual = $row['cantidade'];
    $descripcion_libro = $row['descripcion'];
    $editorial_libro = $row['editorial'];
    $prezo_libro = $row['prezo'];
    $foto_libro = $row['foto'];

    if($cantidade_libros_actual > 0){
        $cantidade_libros_actualizada = $cantidade_libros_actual -1;
        $libros_compra = "UPDATE libro_venda set cantidade = '".$cantidade_libros_actualizada."' where titulo = '".$titulo."'";
        $result2 = mysqli_query($conn, $libros_compra);
    }
}
header("Location: ../usuarios_libreria.php");
mysqli_close($conn);
?>