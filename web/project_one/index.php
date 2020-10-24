<?php
session_start();
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/orders_model.php';

$message = "";
$showButton = false;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL){
      $action = 'home';
  }
 }

switch ($action){
case 'home':
  $repairOrdes = getOpenOrders();
  $repairOrdersList = getRepairOrdersList($repairOrdes);
  include 'view/home.php';
break;
case 'customersList':
  $customers = getCustomers();
  $customersList = getCustomersList($customers);
  include 'view/customers_list.php';
break;
case 'newCustomer':
  include 'view/new_customer.php';
break;
case 'addNewCustomer':
  // Filter and store the data
  $customername = filter_input(INPUT_POST, 'customername', FILTER_SANITIZE_STRING);
  $customerlastname = filter_input(INPUT_POST, 'customerlastname', FILTER_SANITIZE_STRING);
  $customerphone = filter_input(INPUT_POST, 'customerphone', FILTER_SANITIZE_STRING);
  $customeraddress = filter_input(INPUT_POST, 'customeraddress', FILTER_SANITIZE_STRING);

  // Check for missing data
  if(empty($customername) || empty($customerlastname) || empty($customerphone) || empty($customeraddress)){
    $message = "Please provide valid information for all empty form fields.";
    include 'view/customers_list.php';
    exit; 
  }

  // Send the data to the model
  $regOutcome = addNewCustomer($customername, $customerlastname, $customerphone, $customeraddress);
  // Check and report the result
  if($regOutcome === 1){
    $message = "$customername $customerlastname has been added to the customer's list.";
    include 'view/customers_list.php';
    exit;
  } else {
    $message = "$customername $customerlastname failed to be added to the customer's list. Please try again.";
    $_SESSION['message'] = $message;
    include 'view/customers_list.php';
    exit;
  }
break;
default:
  $repairOrdes = getOpenOrders();
  $repairOrdersList = getRepairOrdersList($repairOrdes);
  include 'view/home.php';
break;
}

?>