<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registrar Eventos</title>
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
                    <div class="col-sm-8"><h2>Agregar <b>Eventos</b></h2></div>
                    <div class="col-sm-4">
                        <a href="ListarEventos.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Ver Eventos</a>
                    </div>
                </div>
            </div>
            <?php
            	error_reporting(E_ALL ^ E_NOTICE);
				include ("BaseDatos.php");
				$EventosU = new Database();
				if(isset($_POST) && !empty($_POST)){
					$NombreE = $EventosU->sanitize($_POST['NombreE']);
					$CuposE = $EventosU->sanitize($_POST['CuposE']);
					if(!empty($ImagenE)){
						$ImagenE = addslashes(file_get_contents($_FILES['ImagenE']['tmp_name']));
					}else{ $ImagenE = ""; }
					$UrlE = $EventosU->sanitize($_POST['UrlE']);
					$CostoEestudiante = $EventosU->sanitize($_POST['CostoEestudiante']);
					$CostoEparticular = $EventosU->sanitize($_POST['CostoEparticular']);
					$FechaEinicio = $EventosU->sanitize($_POST['FechaEinicio']);
					$FechaEfinal = $EventosU->sanitize($_POST['FechaEfinal']);
					$HoraEinicio = $EventosU->sanitize($_POST['HoraEinicio']);
					$HoraEfinal = $EventosU->sanitize($_POST['HoraEfinal']);
					$ResponsableE = $EventosU->sanitize($_POST['ResponsableE']);
					$OrganizadoresE = $EventosU->sanitize($_POST['OrganizadoresE']);
					$DescripcionE = $EventosU->sanitize($_POST['DescripcionE']);
					
					$res = $EventosU->create($NombreE,$CuposE,$ImagenE,$UrlE,$CostoEestudiante,$CostoEparticular,$FechaEinicio,$FechaEfinal,$HoraEinicio,$HoraEfinal,$ResponsableE,$OrganizadoresE,$DescripcionE);
					if($res){
						$message= "Evento insertado con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudo insertar el Evento";
						$class="alert alert-danger";
					}
			?>
				<div class="<?php echo $class ?>">
				  <?php echo $message;?>
				</div>	
		    <?php
				}
	
			?>
			<div class="row">
				<form method="POST" enctype="multipart/form-data">
					<div class="col-md-6">
						<label>Nombre Del Evento:</label>
						<input type="text" name="NombreE" id="NombreE" class='form-control' maxlength="255" required>
					</div>
					<div class="col-md-6">
						<label>Cupos Del Evento:</label>
						<input type="number" name="CuposE" id="CuposE" class='form-control' required>
					</div><br><br><br><br>
					<div class="col-md-6">
						<label>Inserte imagen del evento:</label>
						<input type="file" name="ImagenE" id="ImagenE">
					</div>
					<div class="col-md-6">
						<label>Inserte URL del evento:</label>
						<input type="text" name="UrlE" id="UrlE" class='form-control'>
					</div><br><br><br><br>
					<div class="col-md-6">
						<label>Costo Para Estudiantes:</label>
						<input type="number" name="CostoEestudiante" id="CostoEestudiante" class='form-control' step="0.001" required>
					</div>
					<div class="col-md-6">
						<label>Costo Para Particulares:</label>
						<input type="number" name="CostoEparticular" id="CostoEparticular" class='form-control' step="0.001" required>
					</div><br><br><br><br>
					<div class="col-md-6">
						<label>Fecha De Inicio Del Evento:</label>
						<input type="date" name="FechaEinicio" id="FechaEinicio" class='form-control' required>
					</div>				
					<div class="col-md-6">
						<label>Fecha De Finalización Del Evento:</label>
						<input type="date" name="FechaEfinal" id="FechaEfinal" class='form-control' required>
					</div><br><br><br><br>
					<div class="col-md-6">
						<label>Hora De Inicio Del Evento:</label>
						<input type="time" name="HoraEinicio" id="HoraEinicio" class='form-control' required>
					</div>
					<div class="col-md-6">
						<label>Hora De Finalización Del Evento:</label>
						<input type="time" name="HoraEfinal" id="HoraEfinal" class='form-control' required>
					</div><br><br><br><br>
					<div class="col-md-6">
						<label>Responsable Del Evento:</label>
						<input type="text" name="ResponsableE" id="ResponsableE" class='form-control' maxlength="60" required >
					</div>
					<div class="col-md-6">
						<label>¿Quién Organiza El Evento?:</label>
						<input type="text" name="OrganizadoresE" id="OrganizadoresE" class='form-control' maxlength="255" required >
					</div><br><br><br><br>
					<div class="col-md-12">
						<label>Descripción Del Evento:</label>
						<textarea  name="DescripcionE" id="DescripcionE" class='form-control' maxlength="800" required></textarea>
					</div>
					
					<div class="col-md-12 pull-right">
					<hr>
						<button type="submit" class="btn btn-success">Guardar Evento</button>
					</div>
			 </form>
			</div>
        </div>
    </div>     
</body>
</html>