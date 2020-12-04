<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
require_once "config.php";

$nuevaContrasenya = "";
$confirmarContrasenya = "";
$nuevaContrasenyaError = "";
$confirmarContrasenyaError = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["nuevaContrasenya"]))){
        $nuevaContrasenyaError = "Introduzca la nueva contraseña";     
    } elseif(strlen(trim($_POST["nuevaContrasenya"])) < 6){
        $nuevaContrasenyaError = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $nuevaContrasenya = trim($_POST["nuevaContrasenya"]);
    }

    if(empty(trim($_POST["confirmarContrasenya"]))){
        $confirmarContrasenyaError = "Confirme la contraseña.";
    } else{
        $confirmarContrasenya = trim($_POST["confirmarContrasenya"]);
        if(empty($nuevaContrasenyaError) && ($nuevaContrasenya != $confirmarContrasenya)){
            $confirmarContrasenyaError = "Las contraseñas no coinciden.";
        }
    }
        
    if(empty($nuevaContrasenyaError) && empty($confirmarContrasenyaError)){
        $sql = "UPDATE usuarios SET contrasenya = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($nuevaContrasenya, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            

            if(mysqli_stmt_execute($stmt)){
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Algo salió mal, por favor vuelva a intentarlo.";
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
    <title>Cambia tu contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<nav>
    <ul>
      <a href="index.html"><h1>Hospital San Juan</h1></a>
      <li><a href="login.php">Iniciar Sesion</a></li>
      <li><a href="register.php">Registrarte</a></li>
    </ul>
    <div class="form">
        <h2>Cambiar contraseña</h2>
        <p>Introduzca los nuevos datos</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($nuevaContrasenyaError)) ? 'has-error' : ''; ?>">
                <label>Nueva contraseña</label>
                <input type="password" name="nuevaContrasenya" class="form-control" value="<?php echo $nuevaContrasenya; ?>">
                <span class="help-block"><?php echo $nuevaContrasenyaError; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirmarContrasenyaError)) ? 'has-error' : ''; ?>">
                <label>Confirmar contraseña</label>
                <input type="password" name="confirmarContrasenya" class="form-control">
                <span class="help-block"><?php echo $confirmarContrasenyaError; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <a class="btn btn-link" href="javascript:history.go(-1)">Cancelar</a>
            </div>
        </form>
    </div>    
</body>
</html>