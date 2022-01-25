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
    <title>Libros Galicia Rules</title>
    <style>
        div{
            margin-left: 10px;
        }
        
    </style>
</head>
<body>
       
    <!-- Menu con diversos botones, cada boton redirige a una nueva interfaz
    Botones-libros-aluguer muestra libros a para aalquilar
    Botones-libros-venda muestra libros a la venta
    Botones-libros-aluguer-venda libros alugados por el usuario
    Botones-libros-devoltos libros que el usuario ha devuelto de su alquiler, espera a un admionistrador
    Botones-libros-modificar el usuario puede modificar sus datos, salvo el usuario-->
    <div class="botones-libros">
        <a href="./archivos-html/libros-aluguer.html"><button type="button" class="botones-libros-aluguer">Libros Aluguer</button></a>
        <a href="./archivos-html/libros-venda.html"><button type="button" class="botones-libros-venda">Libros Venda</button></a>
        <a href="./archivos-html/libros-aluguer-venda.html"><button type="button" class="botones-libros-aluguer-venda">Libros alugados/vendidos</button></a>
        <a href="./archivos-html/libros-devoltos.html"><button type="button" class="botones-libros-devoltos">Libros devoltos</button></a>
        <a href="./archivos-html/modificar-usuario.php"><button type=button class="botones-libros-usuario-modificar">Modificar usuario</button></a>
    </div>
</body>
</html>