<?php
// Variables recogidas desde los input de index.html
$usuario = $_REQUEST['usuario'];
$contrasena = $_REQUEST['contrasinal'];
$nome = $_REQUEST['nome'];
$direccion = $_REQUEST['direccion'];
$telefono = $_REQUEST['telefono'];
$dni = $_REQUEST['dni'];
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
$query_usuario_nombre = "SELECT * from usuario where usuario ='".$usuario."'";
$resultado_query = mysqli_query($conn, $query_usuario_nombre);
$numFilas = $resultado_query->num_rows;

if($numFilas > 0){
    echo "Nombre de usuario ya existentem, escoge otro";
    header("refresh:3; url = rexistro.html");
}else{
// En la variable $insert_query se ha creado la accion de inserccion en la tabla usuarios
//Se empelan las variables recibidas desde el html y se insertan como VALUES de mi insercción
$insert_query = "INSERT INTO novo_rexistro(usuario, contrasinal, nome, direccion, telefono, nifdni)
VALUES ('".$usuario."','".$contrasena."','".$nome."','".$direccion."',".$telefono.",'".$dni."')";

// En caso de que la inserccion saliese correctamente, salta este mensaje por pantalla
If (mysqli_query($conn, $insert_query)) {
    echo "Usuario registrado";
    header("refresh:3; url = index.html");
}
}


// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>


