<?php
require_once 'Administrador.php';
require_once 'RepositorioAdmin.php';

class ControladorSesion
{
    protected $administrador = null;

    public function login($nombre_administrador, $clave)
    {
        $repo = new RepositorioAdmin();
        $administrador = $repo->login($nombre_administrador, $clave);
        if ($administrador === false)
        {
            return [false, "Error de credenciales"];
        } 
        else 
        {
            session_start();
            $_SESSION['administrador'] = serialize($administrador);
            return [true, "Administrador autenticado correctamente"];
        }
    }

    public function create($nombre_administrador, $nombre, $apellido, $email, $clave)
    {
        $repo = new RepositorioAdmin();
        $administrador = new Administrador($nombre_administrador, $nombre, $apellido, $email);
        $id = $repo->save($administrador, $clave);
        if ($id === false)
        {
            return [ false, "Error al crear un administrador"];
        }
        else 
        {
            $administrador->setId($id);
            session_start();
            $_SESSION['administrador'] = serialize($administrador);
            return [ true, "Administrador creado correctamente" ];
        }
    }

    public function modificar($nombre_administrador, $nombre, $apellido, $email, Administrador $administrador)
    {
        $repo = new RepositorioAdmin();
        $administrador->setDatos($nombre_administrador, $nombre, $apellido, $email);

        if ($repo->actualizar($administrador))
        {
            session_start();
            $_SESSION['administrador'] = serialize($administrador);
            return [true, "Los datos se actualizaron correctamente"];
        } 
        else
        {
            return [false, "Error al actualizar los datos"];
        }
    }

    public function eliminar(Administrador $administrador)
    {
        $repo = new RepositorioAdmin();
        if($repo->eliminar($administrador))
        {
            return [true, "El administrador se elimino correctamente"];
        } 
        else
        {
            return [false, "Error al eliminar al administrador"];
        }
    }
}
?>