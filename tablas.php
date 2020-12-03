<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
<p>Introduce el formulario para pedir una cita</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
      <label>Nombre</label>
      <input type="text" name="nombre" class="form-control" value="">
    </div>
    <div class="form-group">
      <label>Contraseña</label>
      <input type="password" name="contrasenya" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Ingresar">

    </div>
</body>

</html>
<?php
include_once 'config.php';
$resultado = mysqli_query($link, "SELECT * FROM hospital");
$nombresArray = array();
echo '<div id="centrarTabla"><table class="tabla">
        <tr class="data-heading">';
while ($propiedad = mysqli_fetch_field($resultado)) {
  echo '<td>' . $propiedad->name . '</td>';
  array_push($nombresArray, $propiedad->name);
}
echo '</tr>';
while ($row = mysqli_fetch_array($resultado)) {
  echo "<tr>";
  foreach ($nombresArray as $item) {
    echo '<td>' . $row[$item] . '</td>';
  }
  echo '</tr>';
}
echo "</table></div>";
?>