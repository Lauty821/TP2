<?php
require_once 'claseAdmin/ControladorSesion.php';
if (isset($_POST['administrador']) && isset($_POST['clave']))
{
    $cs = new ControladorSesion();
    $result = $cs->create($_POST['administrador'], $_POST['nombre'], 
                          $_POST['apellido'], $_POST['email'], $_POST['clave']);
    if( $result[0] === true )
    {
        $redirigir = 'home.php?mensaje='.$result[1];
    }
    else
    {
        $redirigir = 'create.php?mensaje='.$result[1];
    }
    header('Location: ' . $redirigir);
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
        <h1>REGISTRO PARA ADMINISTRADORES</h1>
      </div>    
      <div class="text-center">
        <h3>Crear nuevo administrador</h3>

        <?php
            if (isset($_GET['mensaje']))
            {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="create.php" method="post">
            <input name="administrador" class="form-control form-control-lg" placeholder="Administrador"><br>
            <input name="clave" type="password" class="form-control form-control-lg" placeholder="Contraseña"><br>
            <input name="nombre" class="form-control form-control-lg" placeholder="Nombre"><br>
            <input name="apellido" class="form-control form-control-lg" placeholder="Apellido"><br>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"><br>
            <input type="submit" value="Registrarse" class="btn btn-primary">
        </form>        
      </div>

    </body>
</html>