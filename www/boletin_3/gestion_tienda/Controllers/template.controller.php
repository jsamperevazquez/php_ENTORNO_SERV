<?php
/**
 * 
 * Clase intermediaria entre usuario y app para renderizado del template
 */
class TemplateController
{
    public function controller_template()
    {
        include "Views/template.php";
    }
}