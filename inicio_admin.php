<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Iconsv=<?php echo time(); ?>">
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
    <div>
        <h1 id="bienvenida">Hola,<?php echo htmlspecialchars($_SESSION["usuario"]); ?></h1>
        <p id="modo">Modo admin</p>
        <div id="botones">
            <button id="boton1"><a href="cambiarContrasenya.php">Cambia tu contraseña</a></button>
            <button id="boton2"><a class="sidenav-close" href="logout.php">Close</a></button>
            <!--<button id="boton3"><a href="tablas.php">Ver Tabla</a></button>!-->
        </div>
        <h2>Pide cita</h2>
        <div id="botones">
        
        </div>
    </div>


</body>

</html>