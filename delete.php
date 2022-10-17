<?php
session_start();

require_once 'claseUsuario/Usuario.php';
require_once 'claseUsuario/ControladorSesion.php';

if (isset($_SESSION['usuario']))
{
    $usuario = unserialize($_SESSION['usuario']);
} 
else 
{
    header('Location: index.php');
}

if (empty($_POST['usuario']) || $_POST['usuario'] != $usuario->getUsuario())
{
    header("Location: home.php?mensaje=Error al eliminar el usuario");
    die();
}

$cs = new ControladorSesion();

$result = $cs->eliminar($usuario);

$redirigir = 'index.php?mensaje='.$result[1];

session_destroy();
header("Location: $redirigir");
?>