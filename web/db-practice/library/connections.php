<?php
/* Database connections */

function herokuConnect() {

    $host = 'ec2-34-235-62-201.compute-1.amazonaws.com';
    $user = 'fparwgazrxnhuv';
    $password = '8c6f36544ef13b61414f56d1c108545e75b2f8645684479d8cd03908cc1abc8f';
    $dbname = 'd9la49f1vo2jbk';
    $port = '5432';
    $dns = 'pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $herokuLink = new PDO($dns, $user, $password, $options);
        return $herokuLink;
        echo '$herokuLink worked successfully<br>';
    } catch (PDOException $exc) {
        /* header('location:/acme/view/500.php');
        echo '$herokuLink did not work successfully<br>'; */
        exit;
    }
}

?>