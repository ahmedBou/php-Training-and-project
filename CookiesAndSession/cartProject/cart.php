<?php 
function add_item($key, $quantity){
    global $products;
    if($quantity < 1) return;

    // if item already exists in cart, update quantity



    // Add item
    $cost = $products[$key]['cost'];
    $total = $cost * $quantity;
    $item =array(
        'name' => $products[$key]['name'],
        'cost' => $cost,
        'qty' => $quantity,
        'total' => $total
    );
    $_SESSION['cart12'][$key] = $item;
}


?>