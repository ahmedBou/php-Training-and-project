<?php 
// start session management with a persistent cookie 
$lifetime = 60 * 60 *24* 14;  // 2 week in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// Create a cart array 
if(empty($_SESSION['cart'])){
    echo "<p> session is empty </p>";
    // initializing the cart
    $_SESSION['cart12'] =array();
}

// create a table of products
$product = array();
$products['MMS-1754'] = array('name' => 'Flute', 'cost' => '149.50');
$products['MMS-6829'] = array('name' => 'Trumpet', 'cost' => '199.50');
$products['MMS-3389'] = array('name' => 'Clarinet', 'cost' => '299.50');

// include cart functions
require_once('cart.php');

// Get the action perform
// $action = filter_input(INPUT_POST, 'action');
// if($action === NULL){
//     $action = filter_input(INPUT_POST, 'action');
//     if($action === NULL){
//         $action = 'show_add_item';
//     }
// }

// // ADD or update cart as needed
// switch($action){
//     case 'add':
//         $product_key = filter_input(INPUT_POST, 'productKey');
//         $item_qty = filter_input(INPUT_POST, 'itemqty');
//         // add_item($product_key,$item_qty);
// }

?>