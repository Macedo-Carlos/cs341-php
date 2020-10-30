<?php
session_start();

$_SESSION['testvar1'] = $_POST['customerName'];

$customerName = $_POST['customerName'];

echo $customerName;

?>