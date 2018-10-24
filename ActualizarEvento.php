<?php
	error_reporting(E_ALL ^ E_NOTICE);
	if(isset($_GET['IdEvento'])){
		$IdEvento = intval($_GET['IdEvento']);
	} else {
		header("location:ListarEventos.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar Eventos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="Styles/Estilo.css">

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Evento</b></h2></div>
                    <div class="col-sm-4">
                        <a href="ListarEventos.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Ver Eventos</a>
                    </div>
                </div>
            </div>
            <?php
				include ("BaseDatos.php");
				$EventosU = new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$NombreE = $EventosU->sanitize($_POST['NombreE']);
					$CuposE = $EventosU->sanitize($_POST['CuposE']);
					$CostoEestudiante = $EventosU->sanitize($_POST['CostoEestudiante']);
					$CostoEparticular = $EventosU->sanitize($_POST['CostoEparticular']);
					$FechaEinicio = $EventosU->sanitize($_POST['FechaEinicio']);
					$FechaEfinal = $EventosU->sanitize($_POST['FechaEfinal']);
					$HoraEinicio = $EventosU->sanitize($_POST['HoraEinicio']);
					$HoraEfinal = $EventosU->sanitize($_POST['HoraEfinal']);
					$ResponsableE = $EventosU->sanitize($_POST['ResponsableE']);
					$OrganizadoresE = $EventosU->sanitize($_POST['OrganizadoresE']);
					$DescripcionE = $EventosU->sanitize($_POST['DescripcionE']);
					$IdEvento = intval($_GET['IdEvento']);
					
					$res = $EventosU->update($NombreE,$CuposE,$CostoEestudiante,$CostoEparticular,$FechaEinicio,$FechaEfinal,$HoraEinicio,$HoraEfinal,$ResponsableE,$OrganizadoresE,$DescripcionE,$IdEvento);
					if($res){
						$message= "Evento actualizado con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudo actualizar este Evento";
						$class="alert alert-danger";
					}
			?>
				<div class="<?php echo $class ?>">
				  <?php echo $message;?>
				</div>	
				  <?php
				}
				$DatosEvento = $EventosU->single_record($IdEvento);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombre Del Evento:</label>
					<input type="text" name="NombreE" id="NombreE" class='form-control' maxlength="255" required value="<?php echo $DatosEvento->NombreE;?>">
				</div>
				<div class="col-md-6">
					<label>Cupos Del Evento:</label>
					<input type="number" name="CuposE" id="CuposE" class='form-control' required value="<?php echo $DatosEvento->CuposE;?>">
				</div><br><br><br><br>
				<div class="col-md-6">
					<label>Costo Para Estudiantes:</label>
					<input type="number" name="CostoEestudiante" id="CostoEestudiante" class='form-control' step="0.001" required value="<?php echo $DatosEvento->CostoEestudiante;?>">
				</div>
				<div class="col-md-6">
					<label>Costo Para Particulares:</label>
					<input type="number" name="CostoEparticular" id="CostoEparticular" class='form-control' step="0.001" required value="<?php echo $DatosEvento->CostoEparticular;?>">
				</div><br><br><br><br>
				<div class="col-md-6">
					<label>Fecha De Inicio Del Evento:</label>
					<input type="date" name="FechaEinicio" id="FechaEinicio" class='form-control' required value="<?php echo $DatosEvento->FechaEinicio;?>">
				</div>				
				<div class="col-md-6">
					<label>Fecha De Finalización Del Evento:</label>
					<input type="date" name="FechaEfinal" id="FechaEfinal" class='form-control' required value="<?php echo $DatosEvento->FechaEfinal;?>">
				</div><br><br><br><br>
				<div class="col-md-6">
					<label>Hora De Inicio Del Evento:</label>
					<input type="time" name="HoraEinicio" id="HoraEinicio" class='form-control' required value="<?php echo $DatosEvento->HoraEinicio;?>">
				</div>
				<div class="col-md-6">
					<label>Hora De Finalización Del Evento:</label>
					<input type="time" name="HoraEfinal" id="HoraEfinal" class='form-control' required value="<?php echo $DatosEvento->HoraEfinal;?>">
				</div><br><br><br><br>
				<div class="col-md-6">
					<label>Responsable Del Evento:</label>
					<input type="text" name="ResponsableE" id="ResponsableE" class='form-control' maxlength="60" required value="<?php echo $DatosEvento->ResponsableE;?>">
				</div>
				<div class="col-md-6">
					<label>¿Quién Organiza El Evento?:</label>
					<input type="text" name="OrganizadoresE" id="OrganizadoresE" class='form-control' maxlength="255" required value="<?php echo $DatosEvento->OrganizadoresE;?>">
				</div><br><br><br>
				<div class="col-md-12">
					<label>Descripción Del Evento:</label>
					<textarea  name="DescripcionE" id="DescripcionE" class='form-control' maxlength="800" required> <?php echo $DatosEvento->DescripcionE;?> </textarea>
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar Evento</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>