<?php
require_once 'claseUsuario/Usuario.php';
require_once 'claseUsuario/ControladorSesion.php';

session_start();
if (isset($_SESSION['usuario']))
{
    $usuario = unserialize($_SESSION['usuario']);
} 
else 
{
    header('Location: index.php');
}

if (
    !empty($_POST['usuario'])
    && !empty($_POST['nombre'])
    && !empty($_POST['apellido'])
    && !empty($_POST['email'])
) 
{
    $cs = new ControladorSesion();
    $result = $cs->modificar(
        $_POST['usuario'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['email'],
        $usuario
    );
    $redirigir = 'home.php?mensaje='.$result[1];
} 
else 
{
    $mensaje = "No fue posible modificar tus datos.";
    $redirigir = "home.php?mensaje=$mensaje";
}
header("Location: $redirigir");
?>