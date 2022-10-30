<?php
require_once '.env.php';
require_once 'Administrador.php';

class RepositorioAdmin
{
    private static $conexion = null;

    public function __construct()
    {
        if (is_null(self::$conexion))
        {
            $credenciales = credenciales();
            self::$conexion = new mysqli(   $credenciales['servidor'],
                                            $credenciales['usuario'],
                                            $credenciales['clave'],
                                            $credenciales['base_de_datos']);
            if(self::$conexion->connect_error)
            {
                $error = 'Error de conexión: '.self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8');
        }
    }

    public function login($nombre_administrador, $clave)
    {
        $q = "SELECT id, clave, nombre, apellido, email FROM administradores ";
        $q.= "WHERE administrador = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $nombre_administrador);
        if ( $query->execute() )
        {
            $query->bind_result($id, $clave_encriptada, $nombre, $apellido, $email);
            if ( $query->fetch() )
            {
                if( password_verify($clave, $clave_encriptada) === true)
                {
                    return new Administrador($nombre_administrador, $nombre, $apellido, $email, $id);
                }
            }
        }
        return false;
    }

    public function save(Administrador $a, $clave)
    {
        $q = "INSERT INTO administradores (administrador, nombre, apellido, email, clave) ";
        $q.= "VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $administrador = $a->getAdministrador();
        $nombre = $a->getNombre();
        $apellido = $a->getApellido();
        $email = $a->getEmail();
        $clave = password_hash($clave, PASSWORD_DEFAULT);
        $query->bind_param("sssss", $administrador, $nombre, $apellido, $email, $clave);

        if ( $query->execute() )
        {
            return self::$conexion->insert_id;
        }
        else
        {
            return false;
        }
    }

    public function actualizar(Administrador $a)
    {
        $q = "UPDATE administradores ";
        $q.= "SET administrador = ?, nombre = ?, apellido = ?, email = ? ";
        $q.= "WHERE id = ?";
        $query = self::$conexion->prepare($q);

        $administrador = $a->getAdministrador();
        $nombre = $a->getNombre();
        $apellido = $a->getApellido();
        $email = $a->getEmail();
        $id = $a->getId();

        $query->bind_param("ssssd", $administrador, $nombre, $apellido, $email, $id);

        if ($query->execute())
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function eliminar(Administrador $a)
    {
        $q = "DELETE FROM administraadores WHERE id = ?";
        $query = self::$conexion->prepare($q);

        $id = $a->getId();

        $query->bind_param("d", $id);

        if ($query->execute())
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
}
?>