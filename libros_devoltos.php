<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar libros venda</title>
    <style>
        th, td{
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Lista de libros para alugar actuales</h1>
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
// Select de la tabla libro_devolto
$libros_venda_selector ="SELECT * from libro_devolto";
$result = mysqli_query($conn, $libros_venda_selector);
if(mysqli_num_rows($result)>0):
?>
    <table style="border-collapse: collapse;">
        <tr >
            <th>Titulo</th>
            <th>Cantidade</th>
            <th>Descripcion</th>
            <th>Editorial</th>
            <th>Foto</th>
            <th>Usuario que alquilo el libro</th>
        </tr>
        <?php
        while ($row=mysqli_fetch_object($result)):?>
        <tr>
            <td><?php echo $row->titulo;?></td>
            <td><?php echo $row->cantidade;?></td>
            <td><?php echo $row->descripcion;?></td>
            <td><?php echo $row->editorial?></td>
            <td><img src="<?php echo $row->foto?>" alt=""></td>
            <td><?php echo $row->usuario;?></td>
        </tr>
        <?php endwhile;?>
         
    </table>  
    <?php
    else: ?>
    <h3>Sin resultados</h3>
    <?php endif;?>
    <form action="aceptar_libros_devoltos.php">
        <div>
            <label for="titulo">Titulo del libro devuelto</label>
            <input type="text" name="titulo">
        </div>
        <input type="submit" name="submit" value="Confirmar devolucion">
    </form>
    <a href="administradores.php"><button>Volver menu adminsitrador</button></a>
</body>
</html>