<?php
session_start();
echo "Modificando el usuario " .$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="../reconfirmacion_usuario_modificar.php">
        <div>
            <label for="contrasinal">Contrasinal</label>
            <input type="text" name="contrasinal" id="contrasinal">
        </div>
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" id="direccion">
        </div>
        <div>
            <label for="telefono">Telefono</label>
            <input type="number" name="telefono" id="telefono">
        </div>
        <div>
            <label for="nifdni">DNI</label>
            <input type="text" name="nifdni" id="nifdni"> 
        </div>
        <input type="submit" name="submit" value="Confirmar modificacion">

    </form>
</body>
</html>