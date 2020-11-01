<?php
session_start();

require_once 'library/connections.php';
require_once 'models/logger_model.php';
require_once 'library/functions.php';

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL){
      $action = 'home';
  }
 }

switch ($action){
    case 'home':
        include 'welcome.php';
    break;
    case 'signUp':
        include 'sign_up.php';
    break;
    case 'signIn':
        include 'sign_in.php';
    break;
    default:
        include 'welcome.php';
    break;
}

?>