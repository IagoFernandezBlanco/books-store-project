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

// Seleciono todos los datos de la lista de libros en aluguer mediante el titulo
$libros_aluguer_selector = "SELECT * from libro_aluguer where titulo = '".$titulo."'";
// Ejecuto el select
$result = mysqli_query($conn, $libros_aluguer_selector);

// Con esta linea, recojo los valores del resultado del select
while ($row = mysqli_fetch_assoc($result)) {

// Recogiendo todos los diferentes campos ue hay en la tabla libros aluguer.
$cantidade_libros_actual = $row['cantidade'];
$editorial_libro = $row['editorial'];
$descripcion_libro = $row['descripcion'];
$titulo_libro = $row['titulo'];
$foto_libro = $row['foto'];


// Si la cantidad es mayor que cero, hace un update y elimina una unidad
if($cantidade_libros_actual > 0){
$cantidade_libros_actualizada = $cantidade_libros_actual - 1;
$libros_aluguer_actualizar = "UPDATE libro_aluguer set cantidade = '".$cantidade_libros_actualizada."' where titulo = '".$titulo."'";
$result2 = mysqli_query($conn, $libros_aluguer_actualizar);
  
$insertar_libros_alugados = "INSERT INTO libro_alugado(titulo, cantidade, descripcion, editorial, foto) VALUES ('".$titulo_libro."','1','".$descripcion_libro."','".$editorial_libro."','".$foto_libro."')";
$result3 = mysqli_query($conn, $insertar_libros_alugados);
}
header("Location: alugar_libros.php");
}
// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>



