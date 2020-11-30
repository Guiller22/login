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
    <link rel="stylesheet" href="css/estilo.css">
</head>
<style>
    #boton1{
    background-color: green;
    border: 1px solid black;
    size: 5cm;
}
#boton2{
    background-color: red;
    border: 1px solid black;
}
</style>
<body>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["usuario"]); ?></b>. Bienvenido admin</h1>
        <div>
            <a id="boton1" href="reset-password.php">Cambia tu contraseña</a>
            <a id="boton2" href="logout.php">Cierra la sesión</a>
            <a href="tablas.php">Ver Tabla</a>
        </div>



    </div>


</body>

</html>