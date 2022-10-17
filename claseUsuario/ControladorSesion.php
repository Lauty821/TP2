<?php
require_once 'Usuario.php';
require_once 'RepositorioUsuario.php';

class ControladorSesion
{
    protected $usuario = null;

    public function login($nombre_usuario, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);
        if ($usuario === false)
        {
            return [false, "Error de credenciales"];
        } 
        else 
        {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario autenticado correctamente"];
        }
    }

    public function create($nombre_usuario, $nombre, $apellido, $email, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = new Usuario($nombre_usuario, $nombre, $apellido, $email);
        $id = $repo->save($usuario, $clave);
        if ($id === false)
        {
            return [ false, "Error al crear el usuario"];
        }
        else 
        {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [ true, "Usuario creado correctamente" ];
        }
    }

    public function modificar($nombre_usuario, $nombre, $apellido, $email, Usuario $usuario)
    {
        $repo = new RepositorioUsuario();
        $usuario->setDatos($nombre_usuario, $nombre, $apellido, $email);

        if ($repo->actualizar($usuario))
        {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Datos actualizados correctamente"];
        } 
        else
        {
            return [false, "Error al actualizar datos"];
        }
    }

    public function eliminar(Usuario $usuario)
    {
        $repo = new RepositorioUsuario();
        if($repo->eliminar($usuario))
        {
            return [true, "Usuario eliminado correctamente"];
        } 
        else
        {
            return [false, "Error al eliminar el usuario"];
        }
    }
}
?>