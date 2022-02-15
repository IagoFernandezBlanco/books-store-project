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
    <title>Administradores</title>
</head>
<body>
    <div>
    <a href="admitir_nuevos_usuarios.php"><button>Admitir nuevos usuarios</button></a>
    </div>
    <div>
    <a href="añadir_libro_aluguer.php"><button>Añadir libros aluguer</button></a>
    </div>
    <div>
    <a href="añadir_libro_venta.php"><button>Añadir libros venda</button></a>
    </div>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>