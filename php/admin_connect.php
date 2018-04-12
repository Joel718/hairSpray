<?php
    //Hämtar databas
    session_start();

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

?>