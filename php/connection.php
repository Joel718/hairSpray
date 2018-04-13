<?php
session_start();
ini_set('display_errors', 1);

if (!isset($GLOBALS['connection']) or !$GLOBALS['connection']->ping()){

    $dbsettings = parse_ini_file('../database.ini');
    $servername = $dbsettings['address'];
    $username = $dbsettings['username'];
    $password = $dbsettings['password'];
    $dbname = $dbsettings['dbname'];
    // Vi loggar in i databasen
    $connect = new mysqli($servername, $username, $password, $dbname);
    // Testa om det funkar
    if ($connect->connect_error) {
    die("FEL: " . $connect->connect_error);
    }

$GLOBALS['connection'] = $connect;

}
?>
