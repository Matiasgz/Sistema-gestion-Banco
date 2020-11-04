<?php

// controllers/crearcaso.php

/*
require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Tipos_Usuarios.php';
require '../views/IngresoUsuario.php';
require '../views/InicioOperador.php';
 */
//require '../views/IngresoFallido.php';

require '../fw/fw.php';

//require '../models/Clientes.php';
require '../models/Casos.php';

require '../views/BuscarCaso.php';


session_start();


if(count($_SESSION)>0) {
    
  
  if(isset($_POST['txtbusca'])):
    
    $c= new Casos(); 
      $u=$c->BuscarCaso($_POST['txtbusca']);
      //$tabla="";
      //$tabla=$u;
      //$json = json_encode($tabla);
      //var_dump($json);
     
      //foreach ($u as $v){
      //$tabla.="<tr>";
      /* Un TD por cada datos que quieras mostrar */
      /*
      $tabla .="<td>".$v['fecha']."</td>"."<td>".$v['nombre_apellido']."</td>"."<td>".$v['DNI']."</td>"."<td>".$v['descripcion']."</td>";
      if($v['estado']==1)
      $tabla .= "<td>". "Finalizado"."</td>" ;
      else
      $tabla .= "<td>". "Iniciado"."</td>" ;
      
      $tabla .="</tr>";
      }*/
     
   echo (json_encode($u));
       //echo $tabla;
   
  else:
    $op = new BuscarCaso();
    $op->render();
    
  endif;
   
  
   
   
}else{
    header("Location: ../Gestion-Banco/Inicio");
  exit();
  }

?>