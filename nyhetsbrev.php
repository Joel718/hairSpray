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

?>

<?php

$Email = $_POST['email'];

$sql = "INSERT INTO Person (Email) VALUES ('$Email')";

    if(!mysqli_query($connect, $sql) || ($Email == NULL))
    {
        echo 'Tyvärr, det gick ej.';
    }
    else {
        echo 'Du prenumererar nu för nyhetsbrevet';
    }

?>