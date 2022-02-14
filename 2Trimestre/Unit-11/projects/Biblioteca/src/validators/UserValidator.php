<?php
namespace App\validators;

class UserValidator extends Validator {
    public function validate(): bool {
        
        $_REQUEST['dni'];
        $_REQUEST['nombre'];
        $_REQUEST['apellidos'];
        $_REQUEST['domicilio'];
        $_REQUEST['poblacion'];
        $_REQUEST['provincia'];
        $_REQUEST['birthday'];
        
        return false;
    }
}