<?php
class Usuario{
    
    private $id;
    private $nombres;
    private $apellidos;
    private $Sexo;
    private $Telefono;
    private $fechaNacimiento;
    private $correo;
    private $password;
    private $direccion;
 
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}
?>