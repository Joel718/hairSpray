<?php
    require "../php/connection.php"; 


    function handleStock($product_id, $operator){
    $query = "UPDATE tbl_product SET Antal = Antal + 1 WHERE ID = $product_id";
    $select = mysqli_query($GLOBALS['connection'], $query);
};

    handleStock(1, '+');
    header("Location: http://joelmaneskold.wieg17.se/hairSpray/php/welcome_admin.php");


die();

 
?>
