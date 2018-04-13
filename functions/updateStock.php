<?php

ini_set('display_errors', 1);
    require "../php/connection.php"; 


    function myFunction(){
    $query = "UPDATE tbl_product SET Antal = Antal - 1 WHERE ID = 1";
    $select_hej = mysqli_query($GLOBALS['connection'], $query);
};

    myFunction();
    
?>
