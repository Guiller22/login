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
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["usuario"]); ?></b>. Bienvenido admin</h1>
        <div>
            <button id="boton1"><a href="reset-password.php">Cambia tu contraseña</a></button>
            <button id="boton2"><a class="sidenav-close" href="logout.php">Close</a></button>
            <a href="#!" class="sidenav-close">Close </a>

            <button id="boton3"><a href="tablas.php">Ver Tabla</a></button>
            
            
        </div>



    </div>


</body>

</html>