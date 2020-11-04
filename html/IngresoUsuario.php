<!DOCTYPE html>
<html>

  <head>

      <title>Bienvenido</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../Gestion-Banco/html/style/IngresoUsuario.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  
<body>


  <div class="container">

    <img src="../Gestion-Banco/html/img/bpbalogo.png" id="logo">

      <form action="" method="post">
        
        <div class="form-group">
            <label for="Usuario">Usuario:</label>
            <input type="text" class="form-control" id="Usuario" placeholder="Usuario" name="usuario" maxlength="20">
        </div>

        <div id="advertenciadatos" style="text-align: center;"> </div>
          
        <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="password" class="form-control" id="clave" placeholder="Clave" name="clave" maxlength="20">
        </div>
          
        <div class="form-group form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Recordar usuario
            </label>

          <br>
          <button type="submit" class="btn btn-sm btn-success" id="Submit">Ingresar</button>

        </div>
          
      </form>
  </div> 

  <script type="text/javascript" src="../html/js/IngresoUsuario.js"></script>

</body>
</html>