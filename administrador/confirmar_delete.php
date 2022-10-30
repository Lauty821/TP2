<?php
session_start();
if (isset($_SESSION['administrador']))
{
    $usuario = unserialize($_SESSION['administrador']);
}
else 
{
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Gestor del sistema</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container">
        <div class="jumbotron text-center">
            <h1>ELIMINAR ADMINISTRADOR</h1>
        </div>
        <div class="text-center">
            <div id="mensaje" class="alert alert-danger text-center">
                <p>Advertencia. Usted va a <strong>eliminar</strong> su administrador.
                Esta acción no se puede deshacer.</p>
            </div>

            <form action="delete.php" method="post">
                <label for="administrador">Escriba su nombre de administrador para <strong>eliminar</strong> su cuenta: </label><br>
                <input name="administrador" class="form-control form-control-lg" placeholder="Administrador"><br>
                <input type="submit" value="Eliminar administrador" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>
