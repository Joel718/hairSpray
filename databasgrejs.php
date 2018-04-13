<?php
//product id
$product_id = isset($_GET['id']) ? $_GET['id'] : "";
//connectar databasen
include 'database.md';
//include object
include_once "....";
// get database connection
$database = new Database();
$db = $database->getConnection();

//initialize objects
$cart_item = new CartItem($db);

//remove cart item from DATABASE, MÅLET
$cart_item->user_id=1;
$cart_item->product_id=$product_id;
$cart_item->delete();





?>