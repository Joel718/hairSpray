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


//Om inlogg på sida stämmer loggar in
if(isset($_POST['submit'])){
require 'admin_connect.php';
$username=$_POST['username'];
$password=$_POST['password'];
$result=mysqli_connect($sql, 'SELECT * FROM Admin WHERE username="'.$username.'" AND password="'.$password.'"limit 1"');
if(mysqli_num_rows($result)==NULL){ 
    $_SESSION['username'] = $username;
    header('Location: welcome_admin.php');
        echo " Du har lyckats logga in"; 
    }else{
        echo "Du har skrivit in fel lösenord";
        
    }
    if(isset($_GET['logout']))
    session_unregister('username');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
<div id="inlogg">

<!--Inlogg formulär-->
<form method="POST" action="admin.php">
    <input type="text" name="username" placeholder="Namn">
    <input type="password" name="password" placeholder="Lösenord">
    <input type="submit" name="submit" value="Loggain">
</form>
</div>
    
</body>
</html>