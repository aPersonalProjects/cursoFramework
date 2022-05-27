<?php

class Bee
{
    //Propiedades del framework
    private $framework = 'Bee Framework';
    private $version = '1.0.0.0';
    private $uri = [];

    //Funcion principal que se ejecuta al instanciar nuestra clase
    function __construct()
    {
        $this->init();
    }
    /**Metodo para ejecutar cada metodo de forma subsecuente */
    private function init()
    { //Todos los metodos que queremos ejecutar consecutivamente
        $this->init_session();
        $this->init_load_config();
        $this->init_load_functions();
        $this->init_autoload();
        $this->dispatch();
    }
    /**Metodo para iniciar la sesion en el sistema */
    private function init_session()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return;
    }
    /**Metodo para cargar la configuracion del sistema */
    private function init_load_config()
    {
        $file = 'bee_config.php';
        if (!is_file('app/config/' . $file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
        }
        //Cargando el archivo de configuracion
        require_once 'app/config/' . $file;
        return;
    }
    /**Metodo para cargar todas las funciones del sistema y del usuario */
    private function init_load_functions()
    {
        $file = 'bee_core_functions.php';
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
        }
        //Cargando el archivo de funciones core
        require_once FUNCTIONS . $file;
        return;

        $file = 'bee_custom_functions.php';
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
        }
        //Cargando el archivo de funciones custom
        require_once FUNCTIONS . $file;
        return;
    }

    /**Metodo para cargar todos los archivos de manera automatica*/
    private function init_autoload()
    {
        require_once CLASSES . 'Autoloader.php';
        Autoloader::init();
        // require_once CLASSES . 'Db.php';
        //require_once CLASSES . 'Model.php';
        //require_once CLASSES . 'Controller.php';
        //require_once CLASSES . 'View.php';


        // require_once CONTROLLERS . DEFAULT_CONTROLLER . 'Controller.php';
        //require_once CONTROLLERS . DEFAULT_ERROR_CONTROLLER . 'Controller.php';

        return;
    }
    /**Metodo para filtrar y descomponer los elementos de nuestra url y uri
     */
    private function filter_url()
    {
        if (isset($_GET['uri'])) {
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode('/', strtolower($this->uri));
            return $this->uri;
        }
    }
    /**Metodo para ejecutar y cargar de forma automatica el controlador solicitado por el usuario, su metodo y pasar parametros a el este controlador*/
    private function dispatch()
    {
        // Filtrar la URL y separar la URI
        $this->filter_url();
        ////////////////////////////////////////////////////////////
        //Necesitamos saber si se esta pasando el nombre de un controlador en nuestro URI
        //$this->uri[0] es el controlador en cuestion
        if (isset($this->uri[0])) {
            $current_controller = $this->uri[0]; // ejemploController.php
            unset($this->uri[0]);
        } else {
            $current_controller = DEFAULT_CONTROLLER; //homeController.php
        }
        //Ejecutando controlador
        //Verificamos si existe una clase con el controlador solicitado
        $controller = $current_controller . 'Controller';
        if (!class_exists($controller)) {
            $controller = DEFAULT_ERROR_CONTROLLER . 'Controller'; //errorController
            $current_controller = DEFAULT_ERROR_CONTROLLER; //Para que el controlador sea error
        }
        ////////////////////////////////////////////////////////////
        //Ejecucion del metodo solicitado
        if (isset($this->uri[1])) {
            $method = str_replace('-', '_', $this->uri[1]);

            //Existe o no el metodo de la clase a ejecutar (controlador)
            if (!method_exists($controller, $method)) {
                $controller = DEFAULT_ERROR_CONTROLLER . 'Controller';
                $current_method = DEFAULT_METHOD;
                $current_controller = DEFAULT_ERROR_CONTROLLER; //Error
            } else {
                $current_method = $method;
            }
            unset($this->uri[1]);
        } else {
            $current_method = DEFAULT_METHOD; //index
        }
        ////////////////////////////////////////////////////////////
        //Creando constantes para utilizar mas adelante
        define('CONTROLLER', $current_controller);
        define('METHOD', $current_method);

        ////////////////////////////////////////////////////////////

        //Ejecutando controlador y metodo segun se haga la peticion
        $controller = new $controller;

        //Obtener los parametros del URI
        $params = array_values(empty($this->uri) ? [] : $this->uri);

        //Llamada al metodo que solicita el usuario en curso
        if (empty($params)) {
            call_user_func([$controller, $current_method]);
        } else {
            call_user_func_array([$controller, $current_method], $params);
        }
        return;
    }
    /**Correr nuestro framework */
    public static function fly()
    {
        $bee = new self();
        return;
    }
}
