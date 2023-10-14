<?php

// aquí se deberá copiar el hash MD5 obtenido con PHP CLI
// user: jorge
// pass: 1
define("HASH_ACCESO","49a0b5b764cfce738da74da8e8e4222d");
// formulario.html será el que pida el ingreso de user y pass al usuario
//const PAGINA_LOGIN = "formulario.html";
define("PAGINA_LOGIN","index.php");
// esta será una página cualquiera, co n acceso restringido, a la cual rediri gir al usuario después de iniciar su sesión en el sistema
//const PAGINA_RESTRINGIDA_POR_DEFECTO ="pagina_de_muestra";
define("PAGINA_RESTRINGIDA_POR_DEFECTO","panel.php");
?>