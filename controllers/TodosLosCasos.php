<?php

// controllers/TodosLosCasos.php

require '../fw/fw.php';
require '../models/Casos.php';
require '../views/TodosLosCasos.php';


session_start();
if(count($_SESSION)==0){

    $v = new IngresoUsuario();
    $v->render();


    
}else{
    if($_SESSION['cargo']=="ope"){
    header("Location: ../Gestion-Banco/Inicio");
        exit();

}
$c = new Casos();
$todos = $c->TodosLosCasos();

//var_dump($todospendientes);

$v = new TodosLosCasos();
$v->casos = $todos;
$v->render();
}

?>