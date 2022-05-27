<?php
//Saber si se trabaja de forma local o remota
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

//Definir el uso horario o timezone del sistema
date_default_timezone_set('America/Mexico_City');

//Define el lenguaje del sistema
define('LANG', 'es');

//Ruta base de nuestro proyecto
define('BASEPATH', IS_LOCAL ? '/CursoFramework/' : '___EL BASEPATH EN PRODUCCION___');

//Sal del sistema
define('AUTH_SALTH', '*SalecitaPorFavor*');

//Puerto y la URL del sitio
define('PORT', '8848'); //Por comprobar
define('URL', IS_LOCAL ? 'http://127.0.0.1:' . PORT . '/CursoFramework/' : '___EL BASEPATH EN PRODUCCION___');

//Las rutas de directorios y archivos
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);

define('APP', ROOT . 'app' . DS);
define('CLASSES', APP . 'classes' . DS);
define('CONFIG', APP . 'config' . DS);
define('CONTROLLERS', APP . 'controllers' . DS);
define('FUNCTIONS', APP . 'functions' . DS);
define('MODELS', APP . 'models' . DS);

define('TEMPLATES', ROOT . 'templates' . DS);
define('INCLUDES', TEMPLATES . 'includes' . DS);
define('MODULES', TEMPLATES . 'modules' . DS);
define('VIEWS', TEMPLATES . 'views' . DS);

define('ASSETS', URL . 'assets/');
define('CSS', ASSETS . 'css/');
define('FAVICON', ASSETS . 'favicon/');
define('FONTS', ASSETS . 'fonts/');
define('IMAGES', ASSETS . 'images/');
define('JS', ASSETS . 'js/');
define('PLUGGINS', ASSETS . 'pluggins/');
define('UPLOADS', ASSETS . 'uploads/');

/***Credenciales de la base de datos*/

// Set para conexion local o de desarrollo
define('LDB_ENGINE', 'mysql');
define('LDB_HOST', 'localhost');
define('LDB_NAME', '----------');
define('LDB_USER', 'root');
define('LDB_PASS', '');
define('LDB_CHARSET', 'urf8');

//Set para la conexion en produccion o servidor real
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'locahost');
define('DB_NAME', '----------');
define('DB_USER', '----------');
define('DB_PASS', '----------');
define('DB_CHARSET', '----------');

//El controlador por defecto / el metodo por defecto / el controlador de errores por defecto.

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ERROR_CONTROLLER', 'error');
define('DEFAULT_METHOD', 'index');
