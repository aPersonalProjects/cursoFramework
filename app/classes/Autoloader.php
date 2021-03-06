<?php

class Autoloader
{
    /**Metodo para ejecutar el autocargado de forma estatica */
    public static function init()
    {
        //Funcion que se registre automaticamente
        spl_autoload_register([__CLASS__, 'autoload']);
    }
    private static function autoload($class_name)
    {
        if (is_file(CLASSES . $class_name . '.php')) {
            require_once CLASSES . $class_name . '.php';
        } elseif (is_file(CONTROLLERS . $class_name . '.php')) {
            require_once CONTROLLERS . $class_name . '.php';
        } elseif (is_file(MODELS . $class_name . '.php')) {
            require_once MODELS . $class_name . '.php';
        }
        return;
    }
}
