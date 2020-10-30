<?php
session_start();

echo 'Test session here';

echo $_SESSION['testVar1'];
echo $_SESSION['customerName'] = $customerName;
echo $_SESSION['customerSearch'] = $customerSearch;
echo $_SESSION['customerList'] = $customerList;

?>