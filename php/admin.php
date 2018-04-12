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



//inlogg till admin startar HÄR
// mysql_connect($dbsettings,$servername,$username,$password);
// mysql_select_db($dbname);



//Om inlogg på sida stämmer loggar in
if(isset($_POST['loggIn'])){
require 'admin_connect.php';
$username=$_POST['username'];
$password=$_POST['password'];
$result=mysqli_query($sql, "SELECT * FROM Admin WHERE username='".$username."'AND password='".$password.'"');
if(mysqli_num_rows($result)==1){
    $_SESSION['username'] = $username;
    header('Location: welcome_admin.php');
        //echo " Du har lyckats logga in"; 
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
    <input type="submit" name="loggIn" value="Logga in">
</form>
</div>



    
</body>
</html>