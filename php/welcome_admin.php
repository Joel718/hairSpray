<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Välkommen admin!</h1>
</body>



<?php

session_start();
echo 'Hej '.$_SESSION['username'];
echo '<br><a href="admin.php?action=logout">Logga ut</a>';


//Hämtar lista för nyhetsbrev
$query = "SELECT * FROM Person";
$select_Person = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($select_Person )) {
   echo $post_ID = $row['ID'];
   echo $post_Name = $row['Name'];
    echo $post_Email = $row['Email'];

}

?>
</html>