<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insertar , mod y eliminar tablas</title>
    <link type="text/css" href="bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 4px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .main-wrapper {
            width: 60%;

            background: #E0E4E5;
            border: 1px solid #292929;
            padding: 25px;
            margin: auto;
        }

        hr {
            margin-top: 5px;
            margin-bottom: 5px;
            border: 0;
            border-top: 1px solid #eee;
        }

        h2 {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <h2>Insertar, Editar, Eliminar </h2>
        <br><br>
        <form action="" method="post">
            <div class="col-xs-3">
                <input class="form-control" name="DNI" type="text" placeholder="Tu dni">
            </div>
            <div class="col-xs-3">
                <input class="form-control" name="NOMBRE" type="text" placeholder="Tu nombre">
            </div>
            <div class="col-xs-3">
                <input class="form-control" name="EDAD" type="text" placeholder="Tu edad">
            </div>
            <div class="col-xs-3">
                <input class="form-control" name="POSITIVO" type="text" placeholder="Si o no">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Insertar">
        </form>
        <br>

        <?php
        if (isset($_POST) && array_key_exists('field', $_POST)) {
            //process PHP Code
        } else {
            //do nothing
        }
        include("funciones.php");
        if (isset($_POST['submit'])) {
            $field = array("name" => $_POST['name']);
            $tbl = "personas";
            insert($tbl, $field);
        }
        ?>
        <table border="1" width="50%">
            <tr>
                <th width="20%">DNI</th>
                <th width="20%">NOMBRE</th>
                <th width="20%">EDAD</th>
                <th width="20%">POSITIVO</th>
                <th width="20%">DNI_MED</th>
                <th width="20%">ID_HOSPITAL</th>
                <th width="13%">Opcion</th>
            </tr>
            <?php
            $sql = "SELECT * FROM proyecto_guille.personas";
            $result = db_query($sql);
            while ($row = mysqli_fetch_object($result)) {
            ?>
                <tr>
                    <td><?php echo $row->DNI; ?></td>
                    <td><?php echo $row->NOMBRE; ?></td>
                    <td><?php echo $row->EDAD; ?></td>
                    <td><?php echo $row->POSITIVO; ?></td>
                    <td><?php echo $row->DNI_MED; ?></td>
                    <td><?php echo $row->ID_HOSPITAL; ?></td>
                    <td>

                        <a class="btn btn-primary" href="editar.php?id=<?php echo $row->id; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                        <a class="btn btn-primary" href="borrar.php?id=<?php echo $row->id; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>