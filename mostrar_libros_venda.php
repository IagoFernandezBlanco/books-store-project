<?php
session_start();
echo "Hola " .$_SESSION['usuario'];
?>
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
// Seleccionando todos los libros a la venta, para poder mostrarlos.
$libros_venda_selector ="SELECT * from libro_venda";
$result = mysqli_query($conn, $libros_venda_selector);
if(mysqli_num_rows($result)>0):
?>
    <table style="border-collapse: collapse;">
        <tr >
            <th>Titulo</th>
            <th>Cantidade</th>
            <th>Descripcion</th>
            <th>Editorial</th>
            <th>Prezo</th>
            <th>Foto</th>
        </tr>
        <?php
        while ($row=mysqli_fetch_object($result)):?>
        <tr>
            <td><?php echo $row->titulo;?></td>
            <td><?php echo $row->cantidade;?></td>
            <td><?php echo $row->descripcion;?></td>
            <td><?php echo $row->editorial?></td>
            <td><?php echo $row->prezo?></td>
            <td><img src="<?php echo $row->foto?>" alt=""></td>
        </tr>
        <?php endwhile;?>
         
    </table>  
    <?php
    else: ?>
    <h3>SIn resultados</h3>
    <?php endif;?>
    <a href="administradores.php"><button>Volver menu adminsitrador</button></a>
</body>
</html>