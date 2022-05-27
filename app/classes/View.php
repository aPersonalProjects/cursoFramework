<?php

/**Clase para rendetizar las vistas (no necesita constructor)*/
class View
{
    //
    public static function render($view, $data = []) //nombre de la vista "view" y la informacion que se le proporcionara a la vista "dara"
    {
        //Convertir el array asociativo en objeto
        $d = to_object($data); //$data en array assoc o $d en objetos

        if (!is_file(VIEWS . CONTROLLER . DS . $view . 'View.php')) {
            die(sprintf('No existe la vista %sView en la carpeta %s', $view, CONTROLLER));
        }
        require_once VIEWS . CONTROLLER . DS . $view . 'View.php';
        exit();
    }
}
