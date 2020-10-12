<?php
session_start();

// Get the the list of products
require_once '../library/product_list.php';

//Get the item variables
$itemIndex = intval($_POST['itemName']);
$itemQuantity = intval($_POST['itemQuantity']);

$action = filter_input(INPUT_POST, 'cartAction');
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'cartAction');
        if ($action == NULL){
            $action = 'addToCart';
        }
    }

switch ($action){
case 'addToCart':
    $response = addToCart($itemIndex, $itemQuantity,$productsList);
    echo $response;
break;
case 'adjustCart':
    $response = adjustCart($itemIndex, $itemQuantity,$productsList);
    echo $response;
break;
default:
    $response = addToCart($itemIndex, $itemQuantity,$productsList);
    echo $response;
break;
}

//Add items to the cart
function addToCart($itemIndex, $itemQuantity,$productsList){
    //Check to see if the cart array has been stored in the session
    if (isset($_SESSION['cart'])){
        //Add items to the cart
        $cartArray = $_SESSION['cart'];
        if (isset($cartArray[$itemIndex])){
            $cartArray[$itemIndex] += $itemQuantity;
            $_SESSION['cart'] = $cartArray;
        } else {
            $cartArray[$itemIndex] = $itemQuantity;
            $_SESSION['cart'] = $cartArray;
        }
    } else {
        //Create the cart and add items to it
        $cartArray = [$itemIndex => $itemQuantity];
        $_SESSION['cart'] = $cartArray;
    }

    $responseString = "<p>There are " . $productsList[$itemIndex]["productName"] . " X " . $_SESSION['cart'][$itemIndex] . " in the cart</p>";

    return $responseString;
}

//Adjust qty of items in the cart
function adjustCart($itemIndex, $itemQuantity,$productsList){
    //Check to see if the cart array has been stored in the session

    if (isset($_SESSION['cart'])){
        //Add items to the cart
        $cartArray = $_SESSION['cart'];
        if (isset($cartArray[$itemIndex])){
            $cartArray[$itemIndex] += $itemQuantity;
            $_SESSION['cart'] = $cartArray;
        } else {
            $cartArray[$itemIndex] = $itemQuantity;
            $_SESSION['cart'] = $cartArray;
        }
    } else {
        //Create the cart and add items to it
        $cartArray = [$itemIndex => $itemQuantity];
        $_SESSION['cart'] = $cartArray;
    }

    $response = "<p>There are " . $productsList[$itemIndex]["productName"] . " X " . $_SESSION['cart'][$itemIndex] . " in the cart</p>";

    return $response;
}

?>