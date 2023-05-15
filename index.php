<?php

require_once "controladores/plantillaC.php";

require_once "controladores/usuariosC.php";
require_once "modelos/usuariosM.php";

require_once "controladores/carrerasC.php";
require_once "modelos/carrerasM.php";

require_once "controladores/ajustesC.php";
require_once "modelos/ajustesM.php";

require_once "controladores/materiasC.php";
require_once "modelos/materiasM.php";

require_once "controladores/examenesC.php";
require_once "modelos/examenesM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();