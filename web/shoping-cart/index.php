<?php

session_start();

// Get the functions library
require_once 'library/functions.php';

$productsList = [
    [
        "productSKU" => "A001",
        "productName" => "Apple",
        "productPrice" => 25,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/apples.jpg"
    ],
    [
        "productSKU" => "A002",
        "productName" => "Avocado",
        "productPrice" => 25,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/avocados.jpg"
    ],
    [
        "productSKU" => "A003",
        "productName" => "Apricot",
        "productPrice" => 20,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/apricots.jpg"
    ],
    [
        "productSKU" => "A004",
        "productName" => "Banana",
        "productPrice" => 20,
        "productDescription" => "This delicate piece of art is realistically textured, colored , and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/banana.jpg"
    ],
    [
        "productSKU" => "A005",
        "productName" => "Boysenberries",
        "productPrice" => 30,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/boysenberries.jpg"
    ],
    [
        "productSKU" => "A006",
        "productName" => "Blueberries",
        "productPrice" => 10,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/blueberries.jpg"
    ],
    [
        "productSKU" => "A007",
        "productName" => "Cherries",
        "productPrice" => 10,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/cherries.jpg"
    ],
    [
        "productSKU" => "A008",
        "productName" => "Cucumber",
        "productPrice" => 25,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/cucumbers.jpg"
    ],
    [
        "productSKU" => "A009",
        "productName" => "Dragon Fruit",
        "productPrice" => 100,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/dragon_fruit.jpg"
    ],
    [
        "productSKU" => "A010",
        "productName" => "Dates",
        "productPrice" => 10,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/dates.jpg"
    ],
    [
        "productSKU" => "A011",
        "productName" => "Watermelon",
        "productPrice" => 25,
        "productDescription" => "This delicate piece of art is realistically textured, colored, and sized for any sort of display that your fruit-loving self might desire!",
        "productImageUrl" => "images/products/watermelon.jpg"
    ]
];

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
default:
    include 'view/home.php';
break;
}

?>