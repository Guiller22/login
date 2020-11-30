<?php
function db_query($query)
{
    $connection = mysqli_connect("localhost", "root", "toor", "proyecto_guille");
    $result = mysqli_query($connection, $query);

    return $result;
}
function insert($nombreTabla, $form_data)
{
    $fields = array_keys($form_data);
    $sql = "INSERT INTO " . $nombreTabla . "(" . implode(',', $fields) . ")  VALUES('" . implode("','", $form_data) . "')";

    return db_query($sql);
}
function delete($nombreTabla, $field_id, $id)
{

    $sql = "delete from " . $nombreTabla . " where " . $field_id . "=" . $id . "";

    return db_query($sql);
}
function edit($nombreTabla, $form_data, $field_id, $id)
{
    $sql = "UPDATE " . $nombreTabla . " SET ";
    $data = array();

    foreach ($form_data as $column => $value) {

        $data[] = $column . "=" . "'" . $value . "'";
    }
    $sql .= implode(',', $data);
    $sql .= " where " . $field_id . " = " . $id . "";
    return db_query($sql);
}
function select_id($nombreTabla, $field_name, $field_id)
{
    $sql = "Select * from " . $nombreTabla . " where " . $field_name . " = " . $field_id . "";
    $db = db_query($sql);
    $GLOBALS['row'] = mysqli_fetch_object($db);

    return $sql;
}
function verTabla()
{
    $link = mysqli_connect("localhost", "root", "toor", "proyecto_guille");
    $q = "SELECT * FROM Tabla1 ORDER BY DNI DESC";
    $rs = mysqli_query($q,$link);
    while ($row = mysqli_fetch_array($rs)) {
        echo '<p>' . $row['DNI'] . '</p>';
    }
}
