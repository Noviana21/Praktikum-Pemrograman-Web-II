<?php
include 'Koneksi.php';

function selectalldata($koneksi) {
    $sql = "SELECT * FROM $koneksi";
    return mysqli_query($GLOBALS['koneksi'], $sql);
}

function selectdatabyid($table, $id, $primarykey) {
    $sql = "SELECT * FROM $table WHERE $primarykey='$id'";
    $result = mysqli_query($GLOBALS['koneksi'], $sql);
    return mysqli_fetch_array($result);
}

function insert($data, $table) {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columns) VALUES ($values)";
    return mysqli_query($GLOBALS['koneksi'], $query);
}

function update($data, $table, $id, $primarykey) {
    $set = "";
    foreach ($data as $column => $value) {
        $set .= "$column='$value', ";
    }
    $set = rtrim($set, ", ");
    $query = "UPDATE $table SET $set WHERE $primarykey='$id'";
    return mysqli_query($GLOBALS['koneksi'], $query);
}

function delete($table, $id, $primarykey) {
    $query = "DELETE FROM $table WHERE $primarykey='$id'";
    return mysqli_query($GLOBALS['koneksi'], $query);
}

function selectJoin($query) {
    global $koneksi;
    return mysqli_query($koneksi, $query);
}

?>