<?php
// Validamos que el usuario tenga sesión iniciada:
session_start();
if (isset($_SESSION['usuario']))
{
    $usuario = unserialize($_SESSION['usuario']);
}
else 
{
    header('Location: index.php');
}

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Gestor del sistema</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>ELIMINAR USUARIO</h1>
      </div>
      <div class="text-center">
            <div id="mensaje" class="alert alert-danger text-center">
                    <p>Advertencia. Udted va a <strong>eliminar</strong> su usuario.
                        Esta acción no se puede deshacer.</p>
            </div>

            <form action="delete.php" method="post">
            <label for="usuario">Escriba su nombre de usuario para <strong>eliminar</strong> su cuenta: </label><br>
            <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
            <input type="submit" value="Eliminar usuario" class="btn btn-primary">
            </form>
      </div>
    </body>
</html>
