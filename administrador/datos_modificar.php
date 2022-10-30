<?php
require_once 'claseAdmin/Administrador.php';
require_once 'claseAdmin/ControladorSesion.php';

session_start();
if (isset($_SESSION['administrador']))
{
    $usuario = unserialize($_SESSION['administrador']);
    $nombre_administrador = $usuario->getAdministrador();
    $nombre = $administrador->getNombre();
    $apellido = $administrador->getApellido();
    $email = $administrador->getEmail();

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
      <h1>MODIFICADOR DE DATOS</h1>
      </div>
      <div class="text-center">
        <h3>Modificar datos de administrador</h3>
        <form action="modificar.php" method="post">
            <label for="administrador">Nombre de administrador</label>
            <input name="administrador" class="form-control form-control-lg" placeholder="Administrador" value="<?php echo $nombre_usuario;?>"><br>
            <label for="nombre">Nombre</label>
            <input name="nombre" class="form-control form-control-lg" placeholder="Nombre" value="<?php echo $nombre;?>"><br>
            <label for="administrador">Apellido</label>
            <input name="apellido" class="form-control form-control-lg" placeholder="Apellido" value="<?php echo $apellido;?>"><br>
            <label for="administrador">Email</label>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?php echo $email;?>"><br>
            <input type="submit" value="Modificar datos" class="btn btn-primary">
        </form>
      </div>
    </body>
</html>
