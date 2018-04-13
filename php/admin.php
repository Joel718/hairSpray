<?php




//Om inlogg på sida stämmer loggar in
if(isset($_POST['loggIn'])){
require 'admin_connect.php';
$uname=$_POST['username'];
$pw=$_POST['password'];
$result=mysqli_query($connect, "SELECT * FROM Admin WHERE username='$uname' AND password='$pw'");
if(mysqli_num_rows($result)==1){
    $_SESSION['username'] = $uname;
    header('Location: welcome_admin.php');
        //echo " Du har lyckats logga in"; 
    }else{
        echo "Du har skrivit in fel lösenord" .$uname;
        
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