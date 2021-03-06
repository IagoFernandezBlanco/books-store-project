<?php

// En esta sección se comprobará si el usuario + contraseña se encuentran registrados en la tabla usuario
// En caso afirmativo, se abre una nueva interfaz, con diversos botones
// EN caso negativo, se muestra unh mensaje de error por pantalla y se devuelve a la página inicial

// Variables para realizar la conexión a nuestra bas de datos
$servername = "localhost";
$database = "catalogo";
$usuario_base_datos = "root@127.0.0.1";
$contraseña_base_datos = "";

// Variables de los campos input de Index.html
$usuario = $_REQUEST['usuario'];
$contrasena = $_REQUEST['contrasena'];

// Create connection
$conn = mysqli_connect($servername, $usuario_base_datos, $contraseña_base_datos, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Comprobar si existe el usuario en la base de datos existetes(tabla usuario)
// Un select es necesario, y con un numRows se verifica si existe o no
$select_query_nombre = "SELECT * from usuario where usuario ='".$usuario."'";

// $select_query = "SELECT * from usuario where usuario ='".$usuario."' AND contrasinal='".$contrasena."'";

// La variable result almacena la query_select de antes
// y numFilas nos da la cantidad exacta de filas que cumple nuestro select
$result = mysqli_query($conn, $select_query_nombre);
$numFilas = $result->num_rows;

// Si las filas son mayores de 0, significa que nuestro usuario esta registrado y pasa a la siguiente fase
// Si las filas son 0, el usuario no está registraod y regresa a la primera página
if($numFilas < 1){
    echo "Usuario no existente";
    header("refresh:3, url= rexistro.html");
}else{
    // Al ser el numero de filas superior  1 significa que el usuario esta registrado actualemente.
    $select_query_nombre_contrasena = "SELECT * from usuario where usuario ='".$usuario."' AND contrasinal='".$contrasena."'";
    $result2 = mysqli_query($conn, $select_query_nombre_contrasena);
    $numFilas2 = $result2->num_rows;
    if($numFilas2 < 1){
        echo "Usuario inexistente, contraseña incorrecta, redirigiendo al registro";
        header("refresh:3; url = rexistro.html");
    }else{
    // Comprobación si un usuario es administrador o no
    while ($row = mysqli_fetch_assoc($result2)) {
    $tipo_usuario = $row['tipo_usuario'];
    $numFilas2 = $result2->num_rows;
    }
    // Si el campo tipo_usuario es igual a distinto a u (a) --> se abre el menu de administrador
        if($tipo_usuario != "u"){
            session_start();
            $_SESSION['usuario'] = $_REQUEST ['usuario'];
            echo "Accediendo al menu administrador";
            header("refresh:3; url = administradores.php");
        }else{
            // Si el tipo_usuario es igual a u, --> se abre el menu de usuario
            session_start();
            $_SESSION['usuario'] = $_REQUEST['usuario'];
            echo "accediendo al menu de usuario";
            header("refresh:3; url = usuarios_libreria.php");
        }
    
}
    }
// Es necesario cerrar la conexion con nuestra base de datos.
mysqli_close($conn);
?>