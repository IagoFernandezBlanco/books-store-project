<?php
session_start();
echo "Hola " .$_SESSION['usuario'];

$_SESSION ['titulo'] = $_REQUEST['titulo'];
echo "<br>";
echo "Titulo del libro: " .$_SESSION['titulo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar libros venda</title>
</head>
<body>
    <h1>Modificar todos los datos</h1>
    <form action="modificar_datos_libros_aluguer.php">
        <div>
            <label for="titulo">Titulo del libro</label>    
            <input type="text" name="titulo" >
        </div>
        <div>
            <label for="cantidade">Cantidad del libro</label>    
            <input type="text" name="cantidade">
        </div>
        <div>
            <label for="descripcion">Descripcion del libro</label>    
            <input type="text" name="descripcion">
        </div>
        <div>
            <label for="editorial">Editorial del libro</label>    
            <input type="text" name="editorial">
        </div>
        <div>
            <label for="prezo">Precio del libro</label>    
            <input type="text" name="prezo">
        </div>
        <div>
            <label for="foto">Foto del libro</label>    
            <input type="text" name="foto">
        </div>
        <input type="submit" name="submit" value="Modificar datos del libro">
    </form>
</body>
</html>