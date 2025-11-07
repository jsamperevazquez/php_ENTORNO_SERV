<?php 
require_once("Controllers/template.Controller.php");
include("Controllers/usuarios.controller.php");
include("Models/usuarios.php");


$template = new TemplateController();
$template->controller_template();
?>
