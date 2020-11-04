<?php

// controllers/crearcaso.php


require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Casos.php';
require '../models/Naturaleza.php';
require '../models/Motivo.php';
require '../models/SubMotivo.php';
require '../models/Clientes.php';
require '../views/CrearCaso.php';



session_start();


if(count($_SESSION)>0) {


  if(count($_POST ) >= 1){
    //aca vemos q lleguen todos los datos

       if(!isset($_POST["nomApe"])) die("error nombre");
       if(!isset($_POST["tipodoc"])) die("error tipodoc");
       if(!isset($_POST["numerodoc"])) die("error numerodoc");
       if(!isset($_POST["telefono"])) die("error telefono");
       if(!isset($_POST["observaciones"])) die("error observaciones");
    //   if(!isset($_FILES["fileName"])) die("error archivo");
    
    

    //verifico que lleguen la naturaleza, motivos , sub motivos..
    if(!isset($_POST["naturaleza"])) die("error naturaleza");
       if(!isset($_POST["motivo"])) die("error motivo");
       if(!isset($_POST["submotivo"])) die("error submotivo");

/////
   /*  var_dump($_FILES["fileName"]);
     die($_FILES["fileName"]);
    */
    

      $cliente = new Clientes();
      //busco si existe el cliente
      $numerodoc = intval($_POST["numerodoc"]); 
    
      $id = $cliente->getID($numerodoc);
      if(!$id){
        //si no existe lo creo
        $cliente->CrearCliente($_POST["nomApe"],$numerodoc,$_POST["mail"],$_POST["telefono"]);
      }

      //lo busco devuelta y saco el id
      $id = $cliente->getID($numerodoc);
      $id = $id['id_cliente'];
     
      

      $id_usuario = $_SESSION['id_usuario'];

     

      if($_POST["naturaleza"]!= "Asesoramiento")
        $estado = 1;
      else
        $estado = 0;
      
        
      $submotivo = intval($_POST["submotivo"]); 
      
      $c = new Casos;
      $c->CrearCaso($_POST["observaciones"], $estado, $submotivo, $id ,  $id_usuario);




      header("Location: ../proyectolaboratorio4/CasosPendientes");
      exit();

      


  }else{

    $n = new Naturaleza ();
    $n = $n->getTodos();
    $v = new CrearCaso();
    $v->naturaleza = $n; 


    $m = new Motivo();
    $m = $m->getTodos();
    $v->motivo = $m;

    $sm = new SubMotivo();
    $sm = $sm->getTodos();
    $v->submot = $sm;

   
    $v->render();
    }
   
     
}
else{
  header("Location: ../proyectolaboratorio4/Inicio.php");
exit();
}
?>
