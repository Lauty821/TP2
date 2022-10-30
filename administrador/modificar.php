<?php
require_once 'claseAdmin/Administrador.php';
require_once 'claseAdmin/ControladorSesion.php';

session_start();
if (isset($_SESSION['administrador']))
{
    $administrador = unserialize($_SESSION['aministrador']);
} 
else 
{
    header('Location: index.php');
}

if (
    !empty($_POST['administrador'])
    && !empty($_POST['nombre'])
    && !empty($_POST['apellido'])
    && !empty($_POST['email'])
) 
{
    $cs = new ControladorSesion();
    $result = $cs->modificar(
        $_POST['administrador'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['email'],
        $administradors
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