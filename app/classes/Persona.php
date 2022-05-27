<?php
//Clase ejemplo
class Persona
{
    //Atributos ejemplo
    // private= no puedes ser usada en ningun otro lado mas que en la clase duena
    //pretected= puede ser utilizada por la clase duena e hijas, pero no fuera
    //public= puede ser utilizado por fuera de la clase, dentro de la clase duena e hijas
    private $poslibles_generos = ['m', 'f'];
    private $posibles_nombres_m = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    private $posibles_nombres_f = ['i', 'j', 'k', 'l', 'm', 'n', 'o', 'p'];
    private $posibles_apellidos = ['q', 'r', 's', 't', 'u', 'v', 'w', 'x'];

    public $persona;
    public $nombres;
    public $apellidos;
    public $genero;

    public function __construct()
    {
        echo 'Soy el constructor de Persona.....<br>';
    }

    //Metodo para crear una persona aleatoria
    public function crear_persona()
    {
        $this->genero = $this->poslibles_generos[rand(0, 1)];
        $this->nombres = $this->obtener_nombre();
        $this->apellidos = $this->obtener_apellido() . ' ' . $this->obtener_apellido();
        $this->persona = $this->nombres . ' ' . $this->apellidos;
        return $this->persona;
    }
    //Metodo para seleccionar un nombre del array
    private function obtener_nombre()
    {
        if ($this->genero == 'm') {
            return $this->posibles_nombres_m[rand(0, count($this->posibles_nombres_m) - 1)];
        } else {
            return $this->posibles_nombres_f[rand(0, count($this->posibles_nombres_f) - 1)];
        }
    }
    private function obtener_apellido()
    {
        return $this->posibles_apellidos[rand(0, count($this->posibles_apellidos) - 1)];
    }
    //Metodo estatico para crear una persona
    public static function crear()
    {
        $persona = new self();
        return $persona->crear_persona();
    }
}
