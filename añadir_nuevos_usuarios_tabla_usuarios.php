<?php
// Variables de los libros
// Se usara el titulo para realizar las insercciones y deletes necesario
$usuario = $_REQUEST['usuario'];

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
$select_usuario_novo_rexistro = "SELECT * FROM novo_rexistro where usuario = '".$usuario."'";
$result =  mysqli_query($conn, $select_usuario_novo_rexistro);

while ($row = mysqli_fetch_assoc($result)) {

    // Recogiendo todos los diferentes campos ue hay en la tabla libros aluguer.
    $usuario_usuario = $row['usuario'];
    $usuario_contrasinal = $row['contrasinal'];
    $usuario_nome = $row['nome'];
    $usuario_direccion = $row['direccion'];
    $usuario_telefono = $row['telefono'];
    $usuario_nifdni = $row['nifdni'];

$insertar_usuario_novo = "INSERT INTO usuario (usuario, contrasinal, nome, direccion, telefono, nifdni, tipo_usuario) VALUES ('".$usuario_usuario."', '".$usuario_contrasinal."', '".$usuario_nome."', '".$usuario_direccion."', '".$usuario_telefono."', '".$usuario_nifdni."', 'u')";
$result2 = mysqli_query($conn, $insertar_usuario_novo);

$borrar_usuario_rexistro = "DELETE FROM novo_rexistro where usuario = '".$usuario_usuario."'";
$result3 = mysqli_query($conn, $borrar_usuario_rexistro);
}
echo "Usuario admitido";
header("refresh:3;url=administradores.php");
mysqli_close($conn);
?>