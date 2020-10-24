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
    include 'view/home.php';
break;
default:
    $scriptures = getAllNotes();
    $scripturesList = scripturesGrid($scriptures);
    include 'view/home.php';
break;
}

?>