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
require '../models/Usuarios.php';

require '../views/IngresoUsuario.php';

session_start();
unset($_SESSION['logueado']);
unset($_SESSION['cargo']);
unset($_SESSION['id_usuario']);

header("Location: ../controllers/ingresousuario.php");
exit();

