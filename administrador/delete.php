<?php
session_start();

require_once 'claseAdmin/Administrador.php';
require_once 'claseAdmin/ControladorSesion.php';

if (isset($_SESSION['administrador']))
{
    $administrador = unserialize($_SESSION['administrador']);
} 
else 
{
    header('Location: index.php');
}

if (empty($_POST['administrador']) || $_POST['administrador'] != $administrador->getAdministrador())
{
    header("Location: home.php?mensaje=Error al eliminar al administrador");
    die();
}

$cs = new ControladorSesion();

$result = $cs->eliminar($administrador);

$redirigir = 'index.php?mensaje='.$result[1];

session_destroy();
header("Location: $redirigir");
?>