<?php
    include "./index.php";
?>

<?php
    

foreach($_SESSION["shopping_cart"] as $keys => $item){

    $id = $item['item_id'];
    $name = $item['item_name'];
    $price = $item['item_price'];
    $qty = $item['item_quantity'];

    $sql_insert = "INSERT INTO `Order` (id, prodname, price, antal) 
        VALUES ($id, '$name', $price, $qty);";
        $result = mysqli_query($connect, $sql_insert);

        // print_r($id);
        // print_r($result);
}

?>