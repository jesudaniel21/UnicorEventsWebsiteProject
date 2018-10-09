<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Eventos Ingresados</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="Styles/Estilo.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="containerLista">
        <div class="tablaEventos">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Eventos</b></h2></div>
                    <div class="col-sm-4">
                        <a href="CrearEventos.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Eventos</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Evento</th>
                        <th>Nombre Evento</th>
                        <th>Costo Estudiantes</th>
						<th>Costo Particulares</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Finalización</th>
                        <th>Hora Inicio</th>
                        <th>Hora Finalización</th>
                        <th>Responsable</th>
                        <th>Organizadores</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
				<?php 
				include ('BaseDatos.php');
				$EventosU = new Database();
				$listado=$EventosU->read();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){

                        $IdEvento = $row->IdEvento;
                        $NombreE = $row->NombreE;
                        $CostoEestudiante = $row->CostoEestudiante;
                        $CostoEparticular = $row->CostoEparticular;
                        $FechaEinicio = $row->FechaEinicio;
                        $FechaEfinal = $row->FechaEfinal;
                        $HoraEinicio = $row->HoraEinicio;
                        $HoraEfinal = $row->HoraEfinal;
                        $ResponsableE = $row->ResponsableE;
                        $OrganizadoresE = $row->OrganizadoresE;
                        $DescripcionE = $row->DescripcionE;
                        
				?>
					<tr>
                        <td><?php echo $IdEvento;?></td>
                        <td><?php echo $NombreE;?></td>
                        <td><?php echo $CostoEestudiante;?></td>
                        <td><?php echo $CostoEparticular;?></td>
                        <td><?php echo $FechaEinicio;?></td>
                        <td><?php echo $FechaEfinal;?></td>
                        <td><?php echo $HoraEinicio;?></td>
                        <td><?php echo $HoraEfinal;?></td>
                        <td><?php echo $ResponsableE;?></td>
						<td><?php echo $OrganizadoresE;?></td>
                        <td><?php echo $DescripcionE;?></td>
                        <td>
						    <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>
                    
                    
                          
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>       