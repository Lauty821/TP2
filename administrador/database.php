<?php
	class Database
	{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="tp2";
		function __construct()
		{
			$this->connect_db();
		}

		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error())
			{
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var)
		{
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}

		public function create($nombre,$imagen){
			$sql = "INSERT INTO `myc` (nombre, imagen) VALUES (?, ?)";
			$query = $this->con->prepare ($sql);
			$query->bind_param("ss", $nombre, $imagen);
			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function read()
		{
			$sql = "SELECT * FROM myc";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id){
			$sql = "SELECT * FROM myc where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function update($nombre,$imagen, $id)
		{
			$sql = "UPDATE myc SET nombre='$nombre', imagen='$imagen' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function delete($id)
		{
			$sql = "DELETE FROM myc WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res)
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

