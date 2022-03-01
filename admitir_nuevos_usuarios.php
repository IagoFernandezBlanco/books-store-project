<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admitir usuarios</title>
    <style>
        th, td{
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Admitir usuario</h1>
    <?php
    session_start();
    echo "Hola " .$_SESSION['usuario'];
    echo "<br>"; 
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

    // Seleccionamos todos los campos de la tabla novo_rexistro, los vamos a mostrar
    $novo_usuario_selector="SELECT * from novo_rexistro";
    $result = mysqli_query($conn, $novo_usuario_selector);
    if(mysqli_num_rows($result)>0):
    ?>
    <table style="border-collapse: collapse;">
        <tr >
            <th>Usuario</th>
            <th>Contrasinal</th>
            <th>Nome</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>DNI</th>
        </tr>
        <?php
        while ($row=mysqli_fetch_object($result)):?>
        <tr>
            <td><?php echo $row->usuario;?></td>
            <td><?php echo $row->contrasinal;?></td>
            <td><?php echo $row->nome;?></td>
            <td><?php echo $row->direccion;?></td>
            <td><?php echo $row->telefono;?></td>
            <td><?php echo $row->nifdni?></td>        
        </tr>
        <?php endwhile;?>
         
    </table>  
    <?php
    else: ?>
    <h3>Sin resultados</h3>
    <?php endif;?>
    <form action="añadir_nuevos_usuarios_tabla_usuarios.php">
        <div>
            <label for="usuario">Nombre de usuario a añadir</label>
            <input type="text" name="usuario" >
        </div>
        <input type="submit" name="submit" value="Añadir usuario">
    </form>
    <a href="administradores.php"><button> Volver menu admin</button></a>
</body>
</html>