<?php include("template/cabecera.php"); ?>

	<div class="table-title">
		<div class="row">
			<div class="col-md-10"><h2>Agregar <b>Mangas o Cómics</b></h2></div>
			<div class="col-md-2">
				<a href="Listamyc.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
        	</div>
		</div>
	</div>
	
	<div class="col-md-3">

	</div>

	<div class="col-md-3">
        
    </div>

	<div class="card">
		<div class="card-header">
			<form method="post">
				
				<?php
				include ("database.php");
				$myc= new Database();
				if(isset($_POST) && !empty($_POST))
				{
					$nombre = $myc->sanitize($_POST['nombre']);
					$imagen = $myc->sanitize($_POST['imagen']);
					$res = $myc->create($nombre, $imagen);
					if($res)
					{
						$message= "Los datos fueron insertados con éxito";
						$class="alert alert-success";
					}
					else
					{
						$message= "No se pudieron insertar los datos";
						$class="alert alert-danger";
					}				
				?>
				<div class="<?php echo $class?>">
				<?php echo $message;?>
				</div>	
				<?php
				}
				?>

				<div class = "form-group">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
				</div>

				<div class = "form-group">
					<label for="Imágen">Imagen:</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Nombre del manga o cómic">                                                           
                </div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				
			</form>
		</div>
	</div>
	
<?php include("template/pie.php"); ?>                        