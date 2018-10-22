<?php 
if (isset($_GET['IdEvento'])){
	include('BaseDatos.php');
	$EventosU = new Database();
	$IdEvento=intval($_GET['IdEvento']);
	$res = $EventosU->delete($IdEvento);
	if($res){
		header('location: ListarEventos.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>