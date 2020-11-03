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
  $repairOrders = getOpenOrders();
  $repairOrdersList = getRepairOrdersList($repairOrders);
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
    $message = "<span class='message-span slide-down-up'>Please provide valid information for all empty form fields</span>";
    include 'view/customers_list.php';
    exit; 
  }

  // Get customers list
  $customers = getCustomers();
  $customersList = getCustomersList($customers);

  // Send the data to the model
  $regOutcome = addNewCustomer($customername, $customerlastname, $customerphone, $customeraddress);
  // Check and report the result
  if($regOutcome === 1){
    $message = "$customername $customerlastname has been added to the customer's list.";
    
    include 'view/customers_list.php';
    exit;
  } else {
    $message = "<span class='message-span slide-down-up'>$customername $customerlastname failed to be added to the customer's list, please try again</span>";
    $_SESSION['message'] = $message;
    include 'view/customers_list.php';
    exit;
  }
break;
case 'searchCustomer':
  // Filter and store the data
  $customerName = filter_input(INPUT_POST, 'customerName', FILTER_SANITIZE_STRING);
  // Check for missing data
  if(empty($customerName)){
    $message = "<span class='message-span slide-down-up'>Please provide valid information for all empty form fields</span>";
    echo ('There was an error');
    exit; 
  }
  $customerSearch = searchByCustomerName($customerName);
  $customerList = getCustomersList($$customerSearch);
  return $customerList;
break;
case 'modelsList':
  $models = getAllModels();
  $modelsGrid = getModelsGrid($models);
  include 'view/models_list.php';
break;
case 'servicesList':
  $services = getAllServices();
  $servicesList = getServicesList($services);
  include 'view/services_list.php';
break;
case 'newRo':
  $customerId = filter_input(INPUT_GET, 'customerId', FILTER_SANITIZE_STRING);
  $customer = searchByCustomerId($customerId);
  $customerInfo = getCustomerInfo($customer);
  $models = getAllModels();
  $modelOptions = getModelOptions($models);
  include 'view/new_ro.php';
break;
case 'addNewRo':
  $roNumber = filter_input(INPUT_POST, 'roNumber', FILTER_SANITIZE_NUMBER_INT);
  $roDate = filter_input(INPUT_POST, 'roDate', FILTER_SANITIZE_STRING);
  $customerId = filter_input(INPUT_POST, 'customerId', FILTER_SANITIZE_STRING);
  $modelId = filter_input(INPUT_POST, 'modelId', FILTER_SANITIZE_NUMBER_INT);
  $roModelSn = filter_input(INPUT_POST, 'roModelSn', FILTER_SANITIZE_STRING);
  $roProblem = filter_input(INPUT_POST, 'roProblem', FILTER_SANITIZE_STRING);
  $addNewOrderResult = addNewRo($roNumber, $roDate, $customerId, $modelId, $roModelSn, $roProblem);
  if($addNewOrderResult == 1){
    $message = "<span class='message-span slide-down-up'>Repair order " . $roNumber . " has been added succefully</span>";
  } else {
    $message = "<span class='message-span slide-down-up'>There was a problem, please try again</span>";
  }
  $repairOrdes = getOpenOrders();
  $repairOrdersList = getRepairOrdersList($repairOrdes);
  include 'view/home.php';
break;
case 'viewRepairOrder':
  $repairOrderId = filter_input(INPUT_GET, 'repairOrderId', FILTER_SANITIZE_NUMBER_INT);
  $repairOrder = getRoInfoById($repairOrderId);
  $roNumber = $repairOrder[0]['ronumber'];
  $roDate = $repairOrder[0]['rodate'];
  $customerId = $repairOrder[0]['customer_id'];
  $modelId = $repairOrder[0]['model_id'];
  $roModelSn = $repairOrder[0]['romodelsn'];
  $roProblem = $repairOrder[0]['roproblem'];
  $roStatus = $repairOrder[0]['current_rostatus'];
  $roType = $repairOrder[0]['current_rotype'];
  $customerName = $repairOrder[0]['customername'];
  $customerlastname = $repairOrder[0]['customerlastname'];
  $customerphone = $repairOrder[0]['customerphone'];
  $customerAddress = $repairOrder[0]['customeraddress'];
  $customer = searchByCustomerId($customerId);
  $customerInfo = getCustomerInfo($customer);
  include 'view/view_ro.php';
break;
default:
  $repairOrders = getOpenOrders();
  print_r($repairOrders);
  exit();
  $repairOrdersList = getRepairOrdersList($repairOrders);
  include 'view/home.php';
break;
}

?>