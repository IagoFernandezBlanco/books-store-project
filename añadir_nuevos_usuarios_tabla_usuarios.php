<?php
session_start();
echo "Hola " .$_SESSION['usuario'];
echo "<br>"; 
// Variables de los libros
// Se usara el titulo para realizar las insercciones y deletes necesario
$usuario = $_REQUEST['usuario'];

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
$select_usuario_novo_rexistro = "SELECT * FROM novo_rexistro where usuario = '".$usuario."'";
$result =  mysqli_query($conn, $select_usuario_novo_rexistro);
// Recogemos la cantidad de filas que recibimos de la query $selec_usuario_novo_rexistro
// Si salen 0 filas, el usuario no existe y se deja manda mensaje
// En caso de que haya una fila, el usuario será insertado y se recibirá un msnaje.
$numFilas = $result->num_rows;
if ($numFilas < 1){
    echo "Usuario no existente en la tabla";
    header("refresh:3;url=admitir_nuevos_usuarios.php");
}else{
while ($row = mysqli_fetch_assoc($result)) {

    // Recogiendo todos los diferentes campos ue hay en la tabla usuario.
    $usuario_usuario = $row['usuario'];
    $usuario_contrasinal = $row['contrasinal'];
    $usuario_nome = $row['nome'];
    $usuario_direccion = $row['direccion'];
    $usuario_telefono = $row['telefono'];
    $usuario_nifdni = $row['nifdni'];
// Insertando nuevo usuario en la tabla de usuarios
$insertar_usuario_novo = "INSERT INTO usuario (usuario, contrasinal, nome, direccion, telefono, nifdni, tipo_usuario) VALUES ('".$usuario_usuario."', '".$usuario_contrasinal."', '".$usuario_nome."', '".$usuario_direccion."', '".$usuario_telefono."', '".$usuario_nifdni."', 'u')";
$result2 = mysqli_query($conn, $insertar_usuario_novo);

// Eliminando o usuario rexsitrado da táboa novo_rexistro
$borrar_usuario_rexistro = "DELETE FROM novo_rexistro where usuario = '".$usuario_usuario."'";
$result3 = mysqli_query($conn, $borrar_usuario_rexistro);
}

echo "Usuario admitido";
header("refresh:3;url=administradores.php");
}
mysqli_close($conn);
?>