<?php
class Administrador
{
    protected $id;
    protected $administrador;
    protected $nombre;
    protected $apellido;
    protected $email;

    public function __construct($administrador, $nombre, $apellido, $email, $id = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->usuario = $administrador;
        $this->email = $email;
    }

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}
    public function getAdministrador() {return $this->administrador;}
    public function getNombre() {return $this->nombre;}
    public function getApellido() {return $this->apellido;}
    public function getNombreApellido() {return "$this->nombre $this->apellido";}
    public function getEmail() {return $this->email;}

    public function setDatos($nombre_administrador, $nombre, $apellido, $email)
    {
        $this->administrador = $nombre_administrador;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
    }
}
?>