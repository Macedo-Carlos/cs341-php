<?php
session_start();

/* $cart = $_SESSION['cart'];
$cart['4'] = 2;

$_SESSION['cart'] = $cart; */


echo "<p>Action = ".$_SESSION['testVar']."</p>";
echo "<p>Item Index = ".$_SESSION['testVar2']."</p>";
echo "<p>Item Quantity = ".$_SESSION['testVar3']."</p>";
print_r($_SESSION['cart']);


?>