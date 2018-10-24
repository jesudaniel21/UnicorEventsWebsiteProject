<?php

	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="eventosunicor";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function create($NombreE,$CuposE,$CostoEestudiante,$CostoEparticular,$FechaEinicio,$FechaEfinal,$HoraEinicio,$HoraEfinal,$ResponsableE,$OrganizadoresE,$DescripcionE){
			$sql = "INSERT INTO `eventos` (NombreE, CuposE, CostoEestudiante, CostoEparticular, FechaEinicio, FechaEfinal, HoraEinicio, HoraEfinal, ResponsableE, OrganizadoresE, DescripcionE) VALUES ('$NombreE','$CuposE','$CostoEestudiante','$CostoEparticular','$FechaEinicio','$FechaEfinal','$HoraEinicio','$HoraEfinal','$ResponsableE','$OrganizadoresE','$DescripcionE')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM eventos";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($IdEvento){
			$sql = "SELECT * FROM eventos where IdEvento='$IdEvento'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return;
		}
		public function update($NombreE,$CuposE,$CostoEestudiante,$CostoEparticular,$FechaEinicio,$FechaEfinal,$HoraEinicio,$HoraEfinal,$ResponsableE,$OrganizadoresE,$DescripcionE,$IdEvento){
			$sql = "UPDATE eventos SET NombreE='$NombreE', CuposE='$CuposE',CostoEestudiante='$CostoEestudiante', CostoEparticular='$CostoEparticular', FechaEinicio='$FechaEinicio', FechaEfinal='$FechaEfinal', HoraEinicio='$HoraEinicio', HoraEfinal='$HoraEfinal', ResponsableE='$ResponsableE', OrganizadoresE='$OrganizadoresE', DescripcionE='$DescripcionE' WHERE IdEvento=$IdEvento";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM eventos WHERE IdEvento=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	