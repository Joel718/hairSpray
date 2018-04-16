<?php
  include "./connection.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style/style.css">
  <title>Document</title>

  </head>
  <body>
  <h1>Välkommen admin!</h1>

</body>


<?php
echo 'Hej '.$_SESSION['username'];
echo "<br/>";
echo '<br><a href="admin.php?action=logout">Logga ut</a></br>';

//Hämtar lista för nyhetsbrev
$query = "SELECT * 
FROM Person";
$select_Person = mysqli_query($connect, $query);
  echo '<div class="box">';
while($row = mysqli_fetch_assoc($select_Person)) { 
  // echo $post_ID = $row['ID'];

  echo '<ul><li>' . $post_ID = $row['ID'] . ' ' . $post_Email = $row['Email'] . ' </ul></li>';
  echo "<br/>";
  
  
}
echo '</div>';
?>

<?php

echo "<br/><br/>";
  $query = "SELECT * 
  FROM utan_frakt
  WHERE typ
  LIKE 'prod%'
  ORDER BY Antal DESC";

  $select_stock = mysqli_query($connect, $query);
  echo '<div class="box2">';

while ($row = mysqli_fetch_assoc($select_stock)){
    echo '<form method="POST" action="../functions/updateStock.php">' .$row['Antal'] . " " . $row[ 'prodname' ];
    echo '<input type="submit" name="operator" value="+">';
    echo '<input type="submit" name="operator" value="-">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '</form>';
  }
  echo '</div>';

?>

</html>


