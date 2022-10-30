<?php include("template/cabecera.php"); ?>

    <div class="table-title">
        <div class="row">
            <div class="col-md-10"><h2>Lista de <b>Mangas y Comics</b></h2></div>
            <div class="col-md-2">
                <a href="createmyc.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Imágenes</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <?php 
        include ('database.php');
	    $myc = new Database();
	    $listado=$myc->read();
        ?>

        <tbody>
            <?php 
            while ($row=mysqli_fetch_object($listado))
            {
                $id=$row->id;
			    $nombre=$row->nombre;
			    $imagen=$row->imagen;
						
		    ?>
            <tr>
            <td><?php echo $nombre;?></td>
            <td><?php echo $imagen;?></td>

            <td>
                <a href="updatemyc.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                <a href="deletemyc.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
            </td>
            </tr>
		    <?php
            }
		    ?>
        </tbody>
    </table>

<?php include("template/pie.php");?>            