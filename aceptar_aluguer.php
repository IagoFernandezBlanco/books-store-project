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

// Seleciono la cantidad de libros que tiene un titulo
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
  
// Selecciono toda la tabla de libros_alugados por titulo, y guardo la cantidad en una variable
$libros_alugados_datos = "SELECT * FROM libros_alugados where titulo = '".$titulo."'";
$result4 = mysqli_query($conn, $libros_alugados_datos);
$libro_xa_alugado = $result4->num_rows;

// Si el libro esta alugado, hace update de la cantidad que hay alugados
// Si no esta alugado, lo inserta
if($libro_xa_alugado < 0){
    $insertar_libros_alugados = "INSERT INTO libro_alugado(titulo, cantidade, descripcion, editorial, foto) VALUES ('".$titulo_libro."','".$cantidade_libros_actual."','".$descripcion_libro."','".$editorial_libro."','".$foto_libro."')";
    $result3 = mysqli_query($conn, $insertar_libros_alugados);
}else{
    $modificar_cantidade_libros_alugados = "UPDATE libro_alugado set cantidade = '".$cantidade_libros_actual."' where titulo = '".$titulo."'";
    $result5 = mysqli_query($conn,$modificar_cantidade_libros_alugados);
}
}
header("Location: alugar_libros.php");
}
?>