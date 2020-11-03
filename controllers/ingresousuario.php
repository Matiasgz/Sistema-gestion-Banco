<?php

// controllers/ingresousuario.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Casos.php';
require '../models/Tipos_Usuarios.php';
require '../views/IngresoUsuario.php';
require '../views/Inicio.php';


//require '../views/IngresoFallido.php';

session_start();

if(count($_POST)>= 1 ){

    $nombre=$_POST['usuario'];
    $clave=$_POST['clave'];

    $u = new Usuarios();
    $encontrado=$u->ValidarUsuario($nombre,$clave);
    $id = $u->GetID($nombre,$clave);
    //var_dump($encontrado);


    if($encontrado=="operador"){
    
    $_SESSION['logueado']=true;
    $_SESSION['cargo']= "ope";
    $_SESSION['id_usuario'] = $id;
    }
    if($encontrado=="interviniente"){
            
        $_SESSION['logueado']=true;
        $_SESSION['cargo']= "int";
        $_SESSION['id_usuario'] = $id;
    }

    
  

}
if(count($_SESSION)==0){

    $v = new IngresoUsuario();
    $v->render();


    
}else{
    $Listacaso = new Casos();
    $v = new Inicio();
	$v->casos =  $Listacaso->getTodos();
	$v->render();
}
   








   
    
    
    
   



