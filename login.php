<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}

require_once "config.php";
$usuario = "";
$contrasenya = "";
$usuarioError ="";
$contrasenyaError = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["usuario"]))){
        $usuarioError = "Por favor ingrese su usuario.";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    if(empty(trim($_POST["contrasenya"]))){
        $contrasenyaError = "Por favor ingrese su contraseña.";
    } else{
        $contrasenya = trim($_POST["contrasenya"]);
    }
    
    if(empty($usuarioError) && empty($contrasenyaError)){
        $sql = "SELECT id, usuario, contrasenya FROM usuarios WHERE usuario = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $usuario;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $usuario, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($contrasenya, $hashed_password)){
                            session_start();
                            
                            //Almaceno las variables en la sesion
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["usuario"] = $usuario;                            
                            
                            header("location: welcome.php");
                        } else{
                            $contrasenyaError = "Contraseña incorrecta.";
                        }
                    }
                } else{

                    $usuarioError = "No existe esa cuenta";
                }
            } else{
                echo "Hubo un error intenta de nuevo.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Inicie sesión</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($usuarioError)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>">
                <span class="help-block"><?php echo $usuarioError; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($contrasenyaError)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="contrasenya" class="form-control">
                <span class="help-block"><?php echo $contrasenyaError; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>Si aún no tienes cuenta <a href="register.php"> regístrate</a>.</p>
        </form>
    </div>    
</body>
</html>