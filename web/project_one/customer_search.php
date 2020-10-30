<?php
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/orders_model.php';

  // Filter and store the data
  $customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_STRING);
  // Check for missing data
  if(empty($customername)){
    $message = "Please provide valid information for all empty form fields.";
    exit; 
  }
  $customerSearch = searchByCustomerName($customerName);
  $customerList = getCustomersList($customerSearch);
  echo $customerList;

?>