<?php

$dbsettings = parse_ini_file('./database.ini');
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

$Email = $_POST['email'];

$sql = "INSERT INTO Person (Name,Email) VALUES ('$Email')";

    if(!mysqli_query($connect, $sql))
    {
        echo 'Inget satt';
    }
    else {
        echo 'Du prenumererar nu för nyhetsbrevet';
    }

?>