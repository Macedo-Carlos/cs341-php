<?php
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/notes-model.php';

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL){
      $action = 'home';
  }
 }

switch ($action){
case 'home':
    $scriptures = getAllNotes();
    $scripturesList = scripturesGrid($scriptures);
    include 'view/home.php';
    break;
default:
    $scriptures = getAllNotes();
    $scripturesList = scripturesGrid($scriptures);
    include 'view/home.php';
break;
}

?>