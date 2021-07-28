<?php
// inicializacion de sesion.
session_start();
 
require_once "database/config.php";
 

$correo = $password = "";
$correo_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["correo"]))){
        $correo_err = "Por favor ingrese su correo.";
    } else{
        $correo = trim($_POST["correo"]);
    }
    
 
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($correo_err) && empty($password_err)){
        $sql = "SELECT id, correo, password FROM Usuarios WHERE correo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_correo);
            
            
            $param_correo = $correo;

            /*borrar antes de subir*/
            header("location: vistas/listar.php");
    
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $correo, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                          
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["correo"] = $correo;                            
                            
                            
                            header("location: vistas/listar.php");
                        } else{
                            
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                  
                    $correo_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login ConfiguroWeb</h2>
        <p>Por favor, complete sus credenciales para iniciar sesión.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                <label>CorreoElectronico</label>
                <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>">
                <span class="help-block"><?php echo $correo_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
        </form>
    </div>    
</body>
</html>