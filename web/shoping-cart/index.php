<?php
session_start();

// Get the functions library
require_once 'library/functions.php';

// Get the the list of products
require_once 'library/product_list.php';

$action = filter_input(INPUT_POST, 'action');
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL){
            $action = 'home';
        }
    }

switch ($action){
case 'home':
    $produtsGrid = buildProductsGrid($productsList);
    include 'view/home.php';
break;
case 'details':
    $itemNumber = filter_input(INPUT_GET, 'itemNumber');
    $produtsDetails = buildProductsDetails($productsList, $itemNumber);
    include 'view/item-details.php';
break;
case 'cart':
    if (isset($_SESSION['cart'])){
        //Get the cart grid
        $cartGrid = buildCartGrid($productsList, $_SESSION['cart']);
    } else {
        //Create the empty cart grid to show
        $cartGrid = "<div id='empty-cart'><p>Your cart is empty</p><a href='index.php' class='add-to-cart-button'>Continue Shopping</a></div>";
    }
    include 'view/cart.php';
break;
default:
    $produtsGrid = buildProductsGrid($productsList);
    include 'view/home.php';
break;
}

?>