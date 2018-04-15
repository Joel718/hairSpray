<?php
  include "./connection.php"; 

?>

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

echo 'Hej '.$_SESSION['username'];
echo '<br><a href="admin.php?action=logout">Logga ut</a>';


//Hämtar lista för nyhetsbrev
$query = "SELECT * FROM Person";
$select_Person = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($select_Person )) { 
  echo $post_ID = $row['ID'];
  echo $post_Email = $row['Email'];
  echo "<br/>";
 
}
?>

<?php

echo "<br/><br/>";
$query = "SELECT * FROM tbl_product WHERE Antal IS NOT NULL";
$select_stock = mysqli_query($connect, $query);


while ($row = mysqli_fetch_assoc($select_stock))
{
    echo '<br/><form method="POST" action="../functions/updateStock.php">' .$row['Antal'];
    echo '<input type="submit" name="' . $row['id'] . '" value="+">';
    echo '<input type="submit" name="' . $row['id'] . '" value="-">';
    echo '</form>';
}

echo '<a href="../functions/updateStock.php"><button id="up">+</button></a>';
echo '<a href="../functions/updateStock.php"><button id="down">-</button></a>';


// while ($row = mysqli_fetch_assoc($select_stock)){
//   echo '<br/>' .$row['Antal'];




?>

</html>


