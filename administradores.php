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
        <a href="añadir_libro_aluguer.html"><button>Añadir libros aluguer</button></a>
    </div>
    <div>
        <a href="añadir_libro_venda.html"><button>Añadir libros venda</button></a>
    </div>
    <div>
        <a href="eliminar_libros_venda.php"><button>Eliminar libros venda</button></a>
    </div>
    <div>
        <a href="eliminar_libros_aluguer.php"><button>Eliminar libros aluguer</button></a>
    </div>
    <div>
        <a href="modificar_libros_venda.php"><button>Modificar libros venda</button></a>
    </div>
    <div>
        <a href="modificar_libros_aluguer.php"><button>Modificar libros aluguer</button></a>
    </div>
    <div>
        <a href="mostrar_libros_venda.php"><button>Mostrar libros venda</button></a>
    </div>
    <div>
        <a href="mostrar_libros_aluguer.php"><button>Mostar libros aluguer</button></a>
    </div>  
    <a href="index.html"><button>Volver</button></a>
</body>
</html>