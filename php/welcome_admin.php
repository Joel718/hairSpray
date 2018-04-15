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
$query = "SELECT * 
FROM tbl_product
WHERE prodname
LIKE 'hair%'
ORDER BY Antal DESC";
$select_stock = mysqli_query($connect, $query);


while ($row = mysqli_fetch_assoc($select_stock)){

    echo '<br/><form method="POST" action="../functions/updateStock.php">' .$row['Antal'] . "</br>" . $row[ 'prodname' ];
    echo '<input type="submit" name="operator" value="+">';
    echo '<input type="submit" name="operator" value="-">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '</form>';
}

?>

</html>


