<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <link type="text/css" href="../proyectolaboratorio4/html/style/InicioOperador.css" rel="stylesheet"/>
  <link type="text/css" href="../proyectolaboratorio4/html/style/navbar.css" rel="stylesheet"/>
  	<title>Derivados</title>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="topnav mb-3" id="nav"> <!-- NAVBAR NUEVO OPERADOR -->

<?php if($controlador == "Inicio") {?>
  <a class="active" href="../proyectolaboratorio4/Inicio">Inicio</a>
  <a href="../proyectolaboratorio4/CrearCaso">Crear caso</a>
  <a href="../proyectolaboratorio4/BuscarCasos">Buscar casos</a>
    <?php   
    if(count($_SESSION)!=0) {
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../proyectolaboratorio4/CasosPendientes">Casos pendientes</a>
        <a href="../proyectolaboratorio4/AreaDeTrabajo">Area de trabajo</a>
        
    <?php }} ?>

  <a href="../proyectolaboratorio4/Salir" style="float: right;">Salir</a>
<?php } ?>

<?php if($controlador == "BuscarCaso") {?>
  <a href="../proyectolaboratorio4/Inicio">Inicio</a>
  <a href="../proyectolaboratorio4/CrearCaso">Crear caso</a>
  <a class="active" href="../proyectolaboratorio4/BuscarCasos">Buscar casos</a>
    <?php   
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../proyectolaboratorio4/CasosPendientes">Casos pendientes</a>
        <a href="../proyectolaboratorio4/AreaDeTrabajo">Area de trabajo</a>
        
    <?php } ?>

  <a href="../proyectolaboratorio4/Salir" style="float: right;">Salir</a>
<?php } ?>

<?php if($controlador == "CasosPendientes") {?>
  <a href="../proyectolaboratorio4/Inicio">Inicio</a>
  <a href="../proyectolaboratorio4/CrearCaso">Crear caso</a>
  <a href="../proyectolaboratorio4/BuscarCasos">Buscar casos</a>
    <?php   
    if($_SESSION["cargo"] == "int") {   ?>
        <a class="active" href="../proyectolaboratorio4/CasosPendientes">Casos pendientes</a>
        <a href="../proyectolaboratorio4/AreaDeTrabajo">Area de trabajo</a>
        
    <?php } ?>

  <a href="../proyectolaboratorio4/Salir" style="float: right;">Salir</a>
<?php } ?>




<?php if($controlador == "CrearCaso") {?>
  <a href="../proyectolaboratorio4/Inicio">Inicio</a>
  <a class="active"  href="../proyectolaboratorio4/CrearCaso">Crear caso</a>
  <a href="../proyectolaboratorio4/BuscarCasos">Buscar casos</a>
    <?php   
    if(count($_SESSION)!=0) {
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../proyectolaboratorio4/CasosPendientes">Casos pendientes</a>
        <a href="../proyectolaboratorio4/AreaDeTrabajo">Area de trabajo</a>
        
    <?php } ?>

  <a href="../proyectolaboratorio4/Salir" style="float: right;">Salir</a>
<?php }} ?>



<?php if($controlador == "TodosLosCasos") {?>
  <a href="../proyectolaboratorio4/Inicio">Inicio</a>
  <a href="../proyectolaboratorio4/CrearCaso">Crear caso</a>
  <a href="../proyectolaboratorio4/BuscarCasos">Buscar casos</a>
    <?php  if(count($_SESSION)!=0) { 
    if($_SESSION["cargo"] == "int") {   ?>
        <a href="../proyectolaboratorio4/CasosPendientes">Casos pendientes</a>
        <a class="active" href="../proyectolaboratorio4/AreaDeTrabajo">Area de trabajo</a>
        
    <?php } ?>

  <a href="../proyectolaboratorio4/Salir" style="float: right;">Salir</a>
<?php }} ?>
</div>