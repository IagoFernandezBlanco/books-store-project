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
$usuario_base_datos = "root@127.0.0.1";
$contraseña_base_datos = "";

// Variable donde se almacena/crea la conexiona 
$conn = mysqli_connect($servername, $usuario_base_datos, $contraseña_base_datos, $database);
// Verificamos si la conexion se realiza(las variables que le pasamos como argumento)
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$libros_alugados = "SELECT * from libro_alugado where titulo ='".$titulo."'";
$result = mysqli_query($conn, $libros_alugados);
$numFilas = $result->num_rows;
// Comprobando si el tlibro por titulo existe o no
//Caso afirmativo
if ($numFilas > 0){
// Con esta linea, recojo los valores del resultado del select
while ($row = mysqli_fetch_assoc($result)) {
    // Recogiendo todos los diferentes campos ue hay en la tabla libros aluguer.
    $cantidade_libros_actual = $row['cantidade'];
    $editorial_libro = $row['editorial'];
    $descripcion_libro = $row['descripcion'];
    $titulo_libro = $row['titulo'];
    $foto_libro = $row['foto'];
    
    // Si la cantidad es mayor que cero, resta una unidad y luego borras de la tabla libro-alugado los libros con cantidad = 0
    if($cantidade_libros_actual > 0){
        $cantidade_libros_actualizada = $cantidade_libros_actual -1;
        $libros_devolucion = "UPDATE libro_alugado set cantidade = '".$cantidade_libros_actualizada."' where titulo = '".$titulo."'";
        $result2 = mysqli_query($conn, $libros_devolucion);
    
        $eliminar_libros = "DELETE FROM libro_alugado where cantidade = 0";
        $result3 = mysqli_query($conn, $eliminar_libros);

        // insertar en la tabla libro_devolto, a la espera de un admin
        $insertar_libro = "INSERT INTO libro_devolto(titulo, cantidade, descripcion, editorial, foto, usuario) VALUES ('".$titulo_libro."', '".$cantidade_libros_actual."', '".$descripcion_libro."', '".$editorial_libro."', '".$foto_libro."', '".$_SESSION['usuario']."')";
        $result4 =  mysqli_query($conn, $insertar_libro);

        echo "Libro devuelto, a la espera de un administrador para confirmar";
        header("refresh:3; url = ../usuarios_libreria.php");
    }
}
}else{
    // Caso negativo, no existe el libro recoigod en el formulario
        echo "No has seleccionado un titulo que tu hayas alquilado";
        header("refresh:3; url = libros-alugados-devolucion.php");
    }


mysqli_close($conn);
?>