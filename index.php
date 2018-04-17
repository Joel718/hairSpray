<?php   

session_start();


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

if(isset($_POST["add_to_cart"]))  
{  
     if(isset($_SESSION["shopping_cart"]))  
     {  

          $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
          if(!in_array($_GET["id"], $item_array_id))  
          {  
               $count = count($_SESSION["shopping_cart"]);  
               $item_array = array(  
                    'item_id'               =>     $_GET["id"],  
                    'item_name'               =>     $_POST["hidden_name"],  
                    'item_price'          =>     $_POST["hidden_price"],  
                    'item_quantity'          =>     $_POST["quantity"]  
               );  
               $_SESSION["shopping_cart"][$count] = $item_array;  
          }  
          else  
          {  
               echo '<script>alert("Produkt finns redan")</script>';  
               echo '<script>window.location="index.php"</script>';  
          }  
     }  
     else  
     {  
          $item_array = array(  
               'item_id'               =>     $_GET["id"],  
               'item_name'               =>     $_POST["hidden_name"],  
               'item_price'          =>     $_POST["hidden_price"],  
               'item_quantity'          =>     $_POST["quantity"]  
          );  
          $_SESSION["shopping_cart"][0] = $item_array;  
     }  
}  
if(isset($_GET["action"]))  
{  
     if($_GET["action"] == "delete")  
     {  
          foreach($_SESSION["shopping_cart"] as $keys => $values)  
          {  
               if($values["item_id"] == $_GET["id"])  
               {  
                    unset($_SESSION["shopping_cart"][$keys]);  
                    echo '<script>alert("Vara borttagen")</script>';  
                    echo '<script>window.location="index.php"</script>';  
               }  
          }  
     }  
}  

?>  

<?php include './sections/header.php';?>

<!DOCTYPE html>  
<html>  
    <head>  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no"> 
    <link rel="stylesheet" href="./style/style.css">
    </head>  
     
    <body>  
        

    <div class="container">

        

        <div class="row">
        <?php  
                $query = "SELECT * 
                FROM utan_frakt
                ORDER BY id ASC";    
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
            ?>  

                <div class="col-xs-12 col-md-4"> 
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:white; border-radius:5px; padding:16px;" align="center">  
                              <img src="./bilder/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                               <h4 class="text-info"><?php echo $row["prodname"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="hidden" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["prodname"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="button" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>

        <?php  
                    }  
               }  
               ?>
                  
        </div> 
        
        <h3>Kundkorg</h3>
        <div class="table-responsive table-cart">
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Namn</th>
                    <th width="10%">Antal</th>
                    <th width="20%">Pris</th>
                    <th width="15%">Totalt</th>
                    <th width="5%">Ändra</th>
                </tr>
                <?php   
                         if(!empty($_SESSION["shopping_cart"]))  
                         {  
                              $total = 0;  
                              foreach($_SESSION["shopping_cart"] as $keys => $values)  
                              {  
                              
                         ?>  
                         <tr>  
                              <td><?php echo $values["item_name"]; ?></td>  
                              <td><?php echo $values["item_quantity"]; ?></td>  
                              <td>$ <?php echo $values["item_price"]; ?></td>  
                              <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                              <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Radera</span></a></td>  
                         </tr>  
                         <?php  
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                              }  

                              
                              
                         ?>  
                            <tr>  
                            
                            <td colspan="3" align="right">Total</td>  
                            <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                            <td><a href="./functions/kundvagn.php">Köp</a></td>  
                           

                            </tr>   

                        <?php  
                        }  


                        ?>

                            <?php 

                            $sql = "SELECT * FROM tbl_product WHERE prodname LIKE 'F%'";
                            $result_tables = mysqli_query($connect, $sql);
                        
                            while($row = mysqli_fetch_array($result_tables)) {
                        

                        ?>


                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">  
                            <tr>
                            <td><?php echo $row["prodname"]; ?></td> 
                            <input type="hidden" name="quantity" class="form-control" value="1" />  
                            <td><?php echo $row["price"]; ?></td> 
                            <input type="hidden" name="hidden_name" value="<?php echo $row["prodname"]; ?>" />  
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                            <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="button" value="Add to Cart" /></td> 
                            </tr>
                          </div>  
                     </form>  

                     

            
                    <?php 

                       
                    }
                    
                 

                    ?>
                    
                        

                  
                    </table>  
                    
               </div>  
               
        <div id="prenumeration">
            <form action="nyhetsbrev.php" method="post">
                     <h4>Registrera dig för nyhetsbrev</h4>
                Email : <input type="text" name="email">
                        <br/>
                        <input type="submit" value="Registrera">
            </form>
        </div>
          </div>  
 
<?php include './sections/footer.php';?>
     </body>  
</html>

