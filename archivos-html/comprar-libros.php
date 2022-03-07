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
$seleccionar_usuario_compra = "SELECT * FROM usuario where usuario = '".$_SESSION['usuario']."'";
$result3 = mysqli_query($conn, $seleccionar_usuario_compra);
$seleccionar_libros_compra = "SELECT * FROM libro_venda where titulo = '".$titulo."'";
$result = mysqli_query($conn, $seleccionar_libros_compra);

// Con esta linea, recojo los valores del resultado del select
while ($row = mysqli_fetch_assoc($result3)) {
    while($row2 = mysqli_fetch_assoc($result)){

    
    // Recogiendo todos los diferentes campos ue hay en la tabla libros aluguer.
    $titulo_libro = $row2['titulo'];
    $cantidade_libros_actual = $row2['cantidade'];

    $fh = fopen("../COMPROBANTE/comprobante".$_SESSION['usuario'].date('Y-m-d').".txt", 'a+') or die("Se produjo un error al crear el archivo");
    $texto = 
    "FACTURA LIBRO
    \n NOMBRE:" .$row['nome'].
    " \n DIRECCION:" .$row['direccion'].
    " \n TELEFONO:" .$row['telefono']. 
    " \n NIF/DNI:" .$row['nifdni']. 
    
    " \n DATOS VENTA 
    \n LIBRO:" .$titulo. 
    " \n CANTIDADE: 1
     EDITORIAL: " .$row2['editorial'].
    " \n PREZO: " .$row2['prezo'].
     " \n \n VENTA REALIZADA CORRECTAMENTE";
    
      //escribimos en el archivo el texto
      fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
      //cerramos el archivo
      fclose($fh);

        if($cantidade_libros_actual > 0){
            $cantidade_libros_actualizada = $cantidade_libros_actual - 1;
            $libros_compra = "UPDATE libro_venda set cantidade = '".$cantidade_libros_actualizada."' where titulo = '".$titulo."'";
            $result2 = mysqli_query($conn, $libros_compra);
        }
    }

}
echo "Compra realizada, generando comprobante";
header("refresh:3; url = ../usuarios_libreria.php");
mysqli_close($conn);
?>