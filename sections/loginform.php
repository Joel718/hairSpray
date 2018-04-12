<?php 

session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "root", "hairspray");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //check if two passwords are equal to each other
  if ($_POST['password'] == $_POST['confirmpassword']) {

            //define other variables with submitted values from $_POST
            $username = $mysqli->real_escape_string($_POST['username']);
            $email = $mysqli->real_escape_string($_POST['email']);
    
            //md5 hash password for security
            $password = md5($_POST['password']);

            //create SQL query string for inserting data into the database
            $sql = "INSERT INTO konton (Username, Mail, Password) "
            . "VALUES ('$username', '$email', '$password')";
  }

}


?>











<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="logincss.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="loginform.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>