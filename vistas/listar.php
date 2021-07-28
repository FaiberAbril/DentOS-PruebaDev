<?php

require_once '../Clases/Usuario.php';
require_once '../Modelos/UsuarioModelos.php';
require_once '../controller/usuarioController.php';



$usuarios = new Usuario();
$model = new UsuarioModel();
?>





<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
<h1>Administrar Usuarios</h1>
    
    <a class="btn btn-primary" href="../vistas/Crear.php">Crear Nuevo usuario</a>

</div>
<br>

<div class="container">
    <div class="row">
    <table  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th >Nombre</th>
                            <th >Apellido</th>
                            <th >Sexo</th>
                            <th > Fecha Nacimiento</th>
                            <th> Telefono </th>
                            <th>direccion</th>
                            <th>Correo</th>
                            <th colspan=2>Administar</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombres'); ?></td>
                            <td><?php echo $r->__GET('Apellidos'); ?></td>
                            <td><?php echo $r->__GET('Sexo') == 1 ? 'Masculino' : 'Femenino'; ?></td>
                            <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                            <td><?php echo $r->__GET('Telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td><?php echo $r->__GET('correo'); ?></td>
                    

                            <td>
                                <a href="editar.php?id=<?php echo $r->id; ?>" class="btn btn-info">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
</table>  
    </div>
</div>
   


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



