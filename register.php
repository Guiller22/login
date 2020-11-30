<?php
require_once "config.php";
 
$usuario = "";
$contrasenya = ""; 
$confirmarContrasenya = "";
$errorUsuario = "";
$errorContrasenya = "";
$errorConfirmacion = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["usuario"]))){
        $errorUsuario = "Por favor ingrese un usuario.";
    } else{
        $sql = "SELECT id FROM usuarios WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            

            $param_username = trim($_POST["usuario"]);
            

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $errorUsuario = "Este usuario ya existe";
                } else{
                    $usuario = trim($_POST["usuario"]);
                }
            } else{
                echo "Hubo un error";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    

    if(empty(trim($_POST["contrasenya"]))){
        $errorContrasenya = "Ingrese una contraseña.";     
    } elseif(strlen(trim($_POST["contrasenya"])) < 6){
        $errorContrasenya = "Debe tener 6 caracteres";
    } else{
        $contrasenya = trim($_POST["contrasenya"]);
    }
    
    if(empty(trim($_POST["confirmarContrasenya"]))){
        $errorConfirmacion = "Confirma tu contraseña.";     
    } else{
        $confirmarContrasenya = trim($_POST["confirmarContrasenya"]);
        if(empty($errorContrasenya) && ($contrasenya != $confirmarContrasenya)){
            $errorConfirmacion = "Las contraseñas no coinciden";
        }
    }
    

    if(empty($errorUsuario) && empty($errorContrasenya) && empty($errorConfirmacion)){
        

        $sql = "INSERT INTO usuarios (usuario, contrasenya) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $usuario;
            $param_password = password_hash($contrasenya, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Hubo un error inesperado";
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
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($errorUsuario)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>">
                <span class="help-block"><?php echo $errorUsuario; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($errorContrasenya)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="contrasenya" class="form-control" value="<?php echo $contrasenya; ?>">
                <span class="help-block"><?php echo $errorContrasenya; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($errorConfirmacion)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirmarContrasenya" class="form-control" value="<?php echo $confirmarContrasenya; ?>">
                <span class="help-block"><?php echo $errorConfirmacion; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>