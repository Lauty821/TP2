<?php include("../template/cabecera.php"); ?>

<?php

?>

    <div class="col-md-5">

        <div class="card">
            <div class="card-header">
                Datos del libro
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipat/form-data">
                    <div class = "form-group">
                        <label for="txtID">ID:</label>
                        <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                    </div>

                    <div class = "form-group">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre del manga o cómic">                                                           
                    </div>

                    <div class = "form-group">
                        <label for="txtImagen">Imagen:</label>
                        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre del manga o cómic">                                                           
                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="button" name="action" class="btn btn-success">Agregar</button>
                        <button type="submit" name="action" class="btn btn-warning">Modificar</button>
                        <button type="submit" name="action" class="btn btn-info">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <div class="col-md-7">

        <table class="table table-bordered">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Seleccionar | Borrar</td>
                </tr>

            </tbody>
        </table>

    </div>

<?php include("../template/pie.php"); ?>