<?php
require_once 'claseAdmin/ControladorSesion.php';

if (! isset($_POST['administrador']) || ! isset($_POST['clave']))
{
    $redirigir = 'indexadmin.php?mensaje=Error: Falta un campo obligatorio';
} 
else 
{
    $cs = new ControladorSesion();
    $login = $cs->login($_POST['administrador'], $_POST['clave']);
    if ($login[0] === true) 
    {
        $redirigir = 'home.php';
    } 
    else 
    {
        $redirigir = 'index.php?mensaje=' . $login[1];
    }
}
header('Location: '.$redirigir);
?>