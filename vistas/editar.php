<?php

require_once '../Clases/Usuario.php';
require_once '../Modelos/UsuarioModelos.php';
require_once '../controller/usuarioController.php';


$usuario = $model->Obtener($_REQUEST['id']);

?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form action="?action=actualizar" method="post" class="pure-form pure-form-stacked">

    <br>
    <div class="container">
    <h1>Editar Usuario</h1>
    <input type="hidden" id="id" name="id" value="<?php echo($usuario->__GET('id')); ?>" />
        <div class="form-group ">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nombres" name="Nombres" value="<?php echo $usuario->__GET('Nombres'); ?>" required minlength="3" maxlength="20">
            </div>


            <div class="form-group ">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="<?php echo $usuario->__GET('Apellidos'); ?>" required minlength="3" maxlength="20">
                </div>
            </div>

            <div class="form-group ">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Sexo</label>
                <div class="col-sm-10">
                    <select class="form-control" id="sexo" name="sexo">
                    <option value="1" <?php echo $usuario->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="2" <?php echo $usuario->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                    </select>
                </div>
            </div>


            <div class="form-group ">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo($usuario->__GET('Telefono')); ?>" required minlength="3" maxlength="20">
                </div>
            </div>


            <div class="form-group ">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="FechaNacimiento" name="FechaNacimiento" required value="<?php echo($usuario->__GET('FechaNacimiento')); ?>" required minlength="3" maxlength="20">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label for="inputEmail3" class="col-sm-2 col-form-label">direccion</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="direccion" name="direccion" required value="<?php echo($usuario->__GET('direccion')); ?>" required minlength="3" maxlength="20">
            </div>
        </div>

        <div class="form-group ">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="Correo" name="correo" required value="<?php echo($usuario->__GET('correo')); ?>" required minlength="3" maxlength="20">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Contrasena</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required value="<?php echo($usuario->__GET('password')); ?>" required minlength="3" maxlength="20">
            </div>
        </div>
 <br>
        <button type="submit" class=" btn btn-primary">Actualizar</button>
        <a href="../vistas/listar.php" class=" btn btn-secondary">volver</a>
    </div>



</form>


<!-- JavaScript Bundle with Popper -->


