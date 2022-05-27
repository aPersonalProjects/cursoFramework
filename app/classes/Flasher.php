<?php

/**Clase encargada de crear notificaciones de forma dinamica conforme se requieran */
class Flasher
{
    //
    private $valid_types = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
    private $default = 'primary';
    private $type;
    private $msg;

    /**Setear el tipo de notificacion por defecto */
    public static function new($msg, $type = null)
    {
        $self = new self();
        if ($type == null) {
            $self->type = $self->defult;
        }
        if (in_array($type, $self->valid_types)) {
            $self->type = $self->default;
        }
        /**Guardar la notificacion en un array */
        if (is_array($msg)) {
            foreach ($msg as $m) {
                $_SESSION[$self->type][] = $m;
                return true;
            }
        }
        //$_SESSION['primary]['notificaciones];
        $_SESSION[$self->type][] = $msg;

        return true;
    }
}
