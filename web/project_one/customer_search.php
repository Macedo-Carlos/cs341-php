<?php
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/orders_model.php';

// Filter and store the data
//$customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_STRING);

/* // Check for missing data
if(empty($customername)){
  $message = "Please provide valid information for all empty form fields.";
  exit; 
} */
$customerName = "ry";

$customerSearch = searchByCustomerName($customerName);
$customerList = getCustomersList($customerSearch);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Search</title>
</head>
<body>
  <div id="outputDiv">echo $customerList;</div>
</body>
</html>