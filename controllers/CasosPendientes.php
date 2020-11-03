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
    $c = new casos();
    $todospendientes = $c->casospendientes();
    
    //var_dump($todospendientes);
    
    $v = new CasosPendientes();
    $v->casos = $todospendientes;
    $v->render();
    
}

?>