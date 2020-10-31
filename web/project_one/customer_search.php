<?php
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/orders_model.php';

// Filter and store the data
//$customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_STRING);
$customerName = $_GET['customerName'];

// Check for missing data
if(empty($customerName)){
  $message = "Please provide valid information for all empty form fields.";
  echo 'Nothing here';
  exit; 
}

$customerSearch = searchByCustomerName($customerName);
$customerList = getCustomersList($customerSearch);
echo $customerList;

?>