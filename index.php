<html lang="en">
  <head>
    <title>Gestor del sistema</title>
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
            if (isset($_GET['mensaje']))
            {
              echo '<div id="mensaje" class="alert alert-primary text-center">
              <p>'.$_GET['mensaje'].'</p></div>';
            }
          ?>

            <div class="card-body">
              <form action="login.php" method="post">

                <div class = "form-group">
                  <label for="exampleInputUsername1">Usuario</label>
                  <input name="usuario" class="form-control" placeholder="Ingrese su usuario">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input name="clave" class="form-control" placeholder="Ingrese su contraseña">
                </div>

                <button type="submit" class="btn btn-primary">Ingresar</button></br>
                <label for="text">¿No estas registrado?</label></br>
                <p><a href="create.php">Crear nuevo usuario</a></p>
                
              </form>
            </div>
          </div>

        </div>
      </div>    
    </div>
    
  </body>
</html>