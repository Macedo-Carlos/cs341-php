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
break;
case 'customersList':
    $customers = getCustomers();
    $customersList = getCustomersList($customers);
    include 'view/customers_list.php';
break;
case: 'addNewCustomer':
    // Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  
  // Validate the email
  $clientEmail = checkEmail($clientEmail);

  // Validate the password
  $checkPassword = checkPassword($clientPassword);

  $existingEmail = checkExistingEmail($clientEmail);

  // Check for existing email address in the table
  if($existingEmail){
  $message = '<p class="alert">That email address already exists. Do you want to login instead?</p>';
  $_SESSION['message'] = $message;
  include '../view/login.php';
  exit;
  }

    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
      $message = "<p class='alert'>Please provide valid information for all empty form fields.</p>";
      $_SESSION['message'] = $message;
      include '../view/create-account.php';
      exit; 
    }
    
    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
    // Check and report the result
    if($regOutcome === 1){
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $message = "<p class='infomessage'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      $_SESSION['message'] = $message;
      header('location: /acme/accounts/index.php?action=login');
      exit;
    } else {
      $message = "<p class='alert'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      $_SESSION['message'] = $message;
      include '../view/registration.php';
      exit;
  }
break;
case 'modClient':
  include '../view/account-update.php';
break;
case 'updateAccountInfo':
    // Filter and store the data
    $customername = filter_input(INPUT_POST, 'customername', FILTER_SANITIZE_STRING);
    $customerlastname = filter_input(INPUT_POST, 'customerlastname', FILTER_SANITIZE_STRING);
    $customerphone = filter_input(INPUT_POST, 'customerphone', FILTER_SANITIZE_STRING);
    $customeraddress = filter_input(INPUT_POST, 'customeraddress', FILTER_SANITIZE_STRING);

    // Check for missing data
    if(empty($customername) || empty($customerlastname) || empty($customerphone) || empty($customeraddress)){
        $message = "<p class='alert'>Please provide valid information for all empty form fields.</p>";
        include 'new_customer.php';
        exit; 
    }

    // Send the data to the model
    $updateOutcome = addNewCustomer($customername, $customerlastname, $customerphone, $customeraddress);
    // Check and report the result
    if($updateOutcome === 1){
      $message = "The information for $customername $customerlastname has been updated.";
      include 'customers_list.php';
      exit;
    } else {
      $message = "Sorry, the informatoin for $customername $customerlastname failed to be added. Please try again.";
      include 'new_customer.php';
      exit;
  }
break;
default:
    $scriptures = getAllNotes();
    $scripturesList = scripturesGrid($scriptures);
    include 'view/home.php';
break;
}

?>