<?php

require_once "controladores/plantillaC.php";

require_once "controladores/usuariosC.php";
require_once "modelos/usuariosM.php";

require_once "controladores/carrerasC.php";
require_once "modelos/carrerasM.php";

require_once "controladores/ajustesC.php";
require_once "modelos/ajustesM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();