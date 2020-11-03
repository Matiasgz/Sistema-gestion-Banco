<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <link type="text/css" href="../html/style/InicioOperador.css" rel="stylesheet"/>
  <link type="text/css" href="../html/style/navbar.css" rel="stylesheet"/>
  	<title>Derivados</title>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="topnav mb-3" id="nav"> <!-- NAVBAR NUEVO OPERADOR -->

<?php if($controlador == "Inicio") {?>
  <a class="active" href="../controllers/ingresousuario.php">Inicio</a>
  <a href="../controllers/CrearCaso.php">Crear caso</a>
  <a href="../controllers/BuscarCasos.php">Buscar casos</a>
    <?php   
    if(count($_SESSION)!=0) {
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../controllers/CasosPendientes.php">Casos pendientes</a>
        <a href="../controllers/TodosLosCasos.php">Area de trabajo</a>
        
    <?php }} ?>

  <a href="../controllers/CerrarSesion.php" style="float: right;">Salir</a>
<?php } ?>

<?php if($controlador == "BuscarCaso") {?>
  <a href="../controllers/ingresousuario.php">Inicio</a>
  <a href="../controllers/CrearCaso.php">Crear caso</a>
  <a class="active" href="../controllers/BuscarCasos.php">Buscar casos</a>
    <?php   
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../controllers/CasosPendientes.php">Casos pendientes</a>
        <a href="../controllers/TodosLosCasos.php">Area de trabajo</a>
        
    <?php } ?>

  <a href="../controllers/CerrarSesion.php" style="float: right;">Salir</a>
<?php } ?>

<?php if($controlador == "CasosPendientes") {?>
  <a href="../controllers/ingresousuario.php">Inicio</a>
  <a href="../controllers/CrearCaso.php">Crear caso</a>
  <a href="../controllers/BuscarCasos.php">Buscar casos</a>
    <?php   
    if($_SESSION["cargo"] == "int") {   ?>
        <a class="active" href="../controllers/CasosPendientes.php">Casos pendientes</a>
        <a href="../controllers/TodosLosCasos.php">Area de trabajo</a>
        
    <?php } ?>

  <a href="../controllers/CerrarSesion.php" style="float: right;">Salir</a>
<?php } ?>




<?php if($controlador == "CrearCaso") {?>
  <a href="../controllers/ingresousuario.php">Inicio</a>
  <a class="active"  href="../controllers/CrearCaso.php">Crear caso</a>
  <a href="../controllers/BuscarCasos.php">Buscar casos</a>
    <?php   
    if(count($_SESSION)!=0) {
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../controllers/CasosPendientes.php">Casos pendientes</a>
        <a href="../controllers/TodosLosCasos.php">Area de trabajo</a>
        
    <?php } ?>

  <a href="../controllers/CerrarSesion.php" style="float: right;">Salir</a>
<?php }} ?>



<?php if($controlador == "TodosLosCasos") {?>
  <a href="../controllers/ingresousuario.php">Inicio</a>
  <a href="../controllers/CrearCaso.php">Crear caso</a>
  <a href="../controllers/BuscarCasos.php">Buscar casos</a>
    <?php  if(count($_SESSION)!=0) { 
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../controllers/CasosPendientes.php">Casos pendientes</a>
        <a class="active" href="../controllers/TodosLosCasos.php">Area de trabajo</a>
        
    <?php } ?>

  <a href="../controllers/CerrarSesion.php" style="float: right;">Salir</a>
<?php }} ?>
</div>