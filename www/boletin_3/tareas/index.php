<?php 
require_once("Controllers/template.Controller.php");
include("Controllers/usuarios.controller.php");
include("Controllers/tareas.controller.php");
include("Models/usuarios.php");
include("Models/tareas.php");


$template = new TemplateController();
$template->controller_template();
?>
