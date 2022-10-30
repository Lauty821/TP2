<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">

        <div class="col-md-4">
            
        </div>

          <div class="col-md-4">
            </br></br></br>
            
            <div class="card">
              <div class="card-header">
                Inicie sesión
            </div>

            <?php
            if (isset($_POST['mensaje']))
            {
              echo '<div id="mensaje" class="alert alert-primary text-center">
              <p>'.$_POST['mensaje'].'</p></div>';
            }
            ?>

            <div class="card-body">
              <form action="home.php" method="post">

                <div class = "form-group">
                  <label for="exampleInputUsername1">Administrador</label>
                  <input type="administrador" class="form-control" placeholder="Ingrese el nombre del aministrador">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input type="clave" class="form-control" placeholder="Ingrese una contraseña">
                </div>

                <button type="submit" class="btn btn-primary">Ingresar al administrador de la página</button></br>
                <label for="text">¿No estas registrado?</label></br>
                <p><a href="create.php">Crear nuevo administrador</a></p>

              </form>
            </div>
          </div>

        </div>
      </div>    
    </div>
    
  </body>
</html>