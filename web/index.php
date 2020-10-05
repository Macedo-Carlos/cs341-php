<?php

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL){
      $action = 'home';
  }
 }
 
switch ($action){
case 'home':
    include 'view/home.php';
    break;
case 'projects':
    include 'view/projects.php';
    break;
default:
    include 'view/home.php';
break;
}

?>