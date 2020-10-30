<?php
session_start();
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/orders_model.php';
$_SESSION['testVar1'] = 'Ready';

// Filter and store the data
//$customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_STRING);

$customerName = 'ry';
$_SESSION['customerName'] = $customerName;
// Check for missing data
if(empty($customername)){
  $message = "Please provide valid information for all empty form fields.";
  exit; 
}
$customerSearch = searchByCustomerName($customerName);
$_SESSION['customerSearch'] = $customerSearch;
$customerList = getCustomersList($customerSearch);
$_SESSION['customerList'] = $customerList;
echo $customerList;

?>