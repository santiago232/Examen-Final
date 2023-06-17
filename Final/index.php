<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Final</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <?php
function introduccion(){
    $Mivariable = "Santiago";
    echo "<h1>Hola" . $Mivariable . "</h1>";
    $val1 = 10;
    $val2 = 20;
    $suma = $val1 + $val2;
    $resta = $val1 - $val2;

    if ($suma > 10){
        echo "La suma es mayor a 10 " . $suma;
    }
    else {
        echo "La suma es menor a 10 " . $suma;
    }
    for($contador = 1 ; $contador <10 ; $contador ++){
        echo "Contador" .$contador . "<br/>";
    }
}
//introduccion();

$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$conexion = new PDO('mysql:host=localhost;dbname=FinalSantiago09072325457', 'root', '', $pdo_options);

if (isset($_POST['accion']) &&
    $_POST['accion'] == "crear"){
        
        $insert = $conexion->prepare("INSERT INTO producto (codigo,nombre,precio,
        existencia) VALUES (:codigo,:nombre,precio,:existencia)");
        $insert->bindValue('codigo', $_POST['codigo']);
        $insert->bindValue('nombre', $_POST['nombre']);
        $insert->bindValue('precio', $_POST['precio']);
        $insert->bindValue('existencia', $_POST['existencia']);
        $insert->execute();
    }


$select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM producto");
?>

<a href="crear.php">Crear Boton</a>
    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
</tr>
</thead>
<tbody>
    <?php foreach($select->fetchAll() as $producto) { ?>
        <tr>
            <td> <?php echo $producto["codigo"] ?> </td>
            <td> <?php echo $producto["nombre"] ?> </td>
            <td> <?php echo $producto["precio"] ?> </td>
            <td> <?php echo $producto["existencia"] ?> </td>
            <td>
                <form action="editar.php" method="POST">
                    <button type="submit">Editar</button>
                    <input type="hidden" name="codigo"
                    value="<?php echo $producto["codigo"]?>">
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </body>
</html>