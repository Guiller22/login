<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<style>
    
</style>
<body>
<nav>
    <ul>
      <a href="index.html"><h1>Hospital San Juan</h1></a>
      <li><a href="login.php">Iniciar Sesion</a></li>
      <li><a href="register.php">Registrarte</a></li>
    </ul>
        <h1 class="bienvenido">Hola, <b><?php echo htmlspecialchars($_SESSION["usuario"]); ?></b>. Bienvenido</h1>
        <div class="botones">
        <a href="cambiarContrasenya.php" class="btn btn-warning">Cambia tu contraseña</a>
        <a href="logout.php" class="btn btn-danger">Cierra la sesión</a>
        </div>
        <div class="cita">
        <a href="tablas.php"><button id="boton3">Cita</button></a>
        </div>
        
        
    </p>


</body>
</html>