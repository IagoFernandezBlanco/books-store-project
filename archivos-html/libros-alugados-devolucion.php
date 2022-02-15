
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros alugados devolucion</title>
    <style>
        th, td{
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Lista de libros alugados actualmente</h1>
<!-- Comienzo del backend PHP-->
<?php
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
$libros_aluguer_selector ="SELECT * from libro_alugado";
$result = mysqli_query($conn, $libros_aluguer_selector);
if(mysqli_num_rows($result)>0):
?>
    <table style="border-collapse: collapse;">
        <tr >
            <th>Titulo</th>
            <th>Cantidade</th>
            <th>Descripcion</th>
            <th>Prezo</th>
            <th>Foto</th>
        </tr>
        <?php
        while ($row=mysqli_fetch_object($result)):?>
        <tr>
            <td><?php echo $row->titulo;?></td>
            <td><?php echo $row->cantidade;?></td>
            <td><?php echo $row->descripcion?></td>
            <td><?php echo $row->editorial?></td>
            <td><img src="<?php echo $row->foto?>" alt=""></td>
        </tr>
        <?php endwhile;?>
         
    </table>  
    <?php
    else: ?>
    <h3>Sin resultados</h3>
    <?php endif;?>
    <form action="libros-devolucion.php">
        <div>
            <label for="titulo">Escribe o titulo do libro que queres devoltar</label>
        </div>
       <div>
           <input type="text" name="titulo" id="titulo">
       </div>
        <input type="submit" name="submit" id="submit" value="Enviar"/> 
    </form>
    <a href="../usuarios_libreria.php"><button type="button"> Volver </button></a>
</body>
</html>