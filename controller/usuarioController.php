<?php

require_once '../Clases/Usuario.php';
require_once '../Modelos/UsuarioModelos.php';

$usuario = new Usuario();
$model = new UsuarioModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $usuario->__SET('id',          $_REQUEST['id']);
            $usuario->__SET('Nombres',          $_REQUEST['Nombres']);
            $usuario->__SET('Apellidos',        $_REQUEST['Apellidos']);
            $usuario->__SET('sexo',            $_REQUEST['sexo']);
            $usuario->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
            $usuario->__SET('Telefono', $_REQUEST['Telefono']);
            $usuario->__SET('direccion', $_REQUEST['direccion']);
            $usuario->__SET('correo', $_REQUEST['correo']);
            $usuario->__SET('password', $_REQUEST['password']);

            $model->Actualizar($usuario);
            header('Location: listar.php');
            break;

        case 'registrar':
            $usuario->__SET('Nombres',          $_REQUEST['Nombres']);
            $usuario->__SET('Apellidos',        $_REQUEST['Apellidos']);
            $usuario->__SET('sexo',            $_REQUEST['sexo']);
            $usuario->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
            $usuario->__SET('Telefono', $_REQUEST['Telefono']);
            $usuario->__SET('direccion', $_REQUEST['direccion']);
            $usuario->__SET('correo', $_REQUEST['correo']);


            $usuario->__SET('password',password_hash($_REQUEST['password'],PASSWORD_DEFAULT) );

            $model->crear($usuario);
            header('Location: listar.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: listar.php');
            break;

        case 'editar':
            header('Location: editar.php');
            break;
    }
}

?>

