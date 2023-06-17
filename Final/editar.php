<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$conexion = new PDO('mysql:host=localhost;dbname=intro2023b', 'root', '', $pdo_options);

?>
    <form action="index.php" method="POST">
        <input type="text" name="codigo" placeholder="ingrese el codigo">
        <br/>
        <input type="text" name="nombre" placeholder="ingrese el nombre">
        <br/>
        <input type="text" name="precio" placeholder="ingrese el precio">
        <br/>
        <input type="text" name="existencia" placeholder="ingrese el existencia">
        <br/>
        <input type="hidden" name="accion" value="crear">
        <button type="submit">Guardar</button>

</form>
</body>
</html>