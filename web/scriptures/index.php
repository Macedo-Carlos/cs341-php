<?php
require_once 'library/connections.php';

function testDb(){
    $db = herokuConnect();
    $sql = 'SELECT * FROM scriptures';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}

$data = testDb();

print_r($data);

?>