<?php 
header("Content-Type: text/html; charset=UTF-8");
require_once("Controllers/template.Controller.php");
include("Controllers/usuarios.controller.php");
include("Controllers/tareas.controller.php");
include("Models/usuarios.php");
include("Models/tareas.php");




$template = new TemplateController();
$template->controller_template();
?>
