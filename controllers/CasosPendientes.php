<?php

// controllers/casospendientes.php

require '../fw/fw.php';
require '../models/Casos.php';
require '../views/CasosPendientes.php';


session_start();
if(count($_SESSION)==0){

    $v = new IngresoUsuario();
    $v->render();


    
}else{

    if(count($_POST ) >= 1){
        if(!isset($_POST["resolucion"])) die("error resolucion");

        $c = new Casos;
        $c->ResolucionPendiente($_POST["resolucion"], $_POST["numcaso"]);
         header("Location: ../proyectolaboratorio4/CasosPendientes");
                exit();
       
                

    }
    else{
        if($_SESSION['cargo']=="ope"){
            header("Location: ../proyectolaboratorio4/Inicio");
                exit();

        }
    $c = new casos();
    $todospendientes = $c->casospendientes();
    
    //var_dump($todospendientes);
    
    $v = new CasosPendientes();
    $v->casos = $todospendientes;
    $v->render();
    }
}

?>