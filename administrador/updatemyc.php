<?php
if (isset($_GET['id']))
{
	$id=intval($_GET['id']);
}
else
{
	header("location:Listamyc.php");
}
?>

<?php include("template/cabecera.php"); ?>

	<div class="table-title">
		<div class="row">
			<div class="col-md-10"><h2>Editar <b>Mangas y Cómics</b></h2></div>
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
					$id=intval($_POST['id']);
					$res = $myc->update($nombre, $imagen,$id);
					if($res)
					{
						$message= "Los datos se actualizaron con éxito";
						$class="alert alert-success";
					}
					else
					{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
				?>
				<div class="<?php echo $class?>">
				<?php echo $message;?>
				</div>
				<?php
				}
				$datos_myc=$myc->single_record($id);
				?>

				<div class="col-md-12">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_myc->nombre;?>">
					<input type="hidden" name="id" id="id" class='form-control' maxlength="100"   value="<?php echo $datos_myc->id;?>">
				</div>

				<div class = "col-md-12">
                	<label for="Imágen">Imagen:</label>
                	<input type="file" class="form-control" name="imagen" id="imagen">                                                           
					<label form="imagenactuak" id="imagenactual"><?php echo $datos_myc->imagen;?></label>
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>

			</form>
		</div>
	</div>
	
<?php include("template/pie.php");?>                   