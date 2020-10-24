<?php

/*
 * Notes model
 */

//Retrieve query results from database
function getOpenOrders(){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT * FROM repairorders, customers WHERE repairorders.customer_id = customers.id AND repairorders.current_rostatus != '0'";
    // Create the prepared statement using the heroku connection
    $stmt = $db->prepare($sql);
    // Run the query
    $stmt->execute();
    // Retrieve the results of the query
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $response;
}

// Retrieve information from all the customers
function getCustomers(){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT id, customername, customerlastname, customerphone, customeraddress, customername || ' ' || customerlastname AS full_name FROM customers";
    // Create the prepared statement using the heroku connection
    $stmt = $db->prepare($sql);
    // Run the query
    $stmt->execute();
    // Retrieve the results of the query
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $response;
}

function addNewCustomer($customername, $customerlastname, $customerphone, $customeraddress){
    // Create a connection object using the db connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "INSERT INTO customers(customername, customerlastname, customerphone, customeraddress)
    VALUES ('$customername', '$customerlastname', '$customerphone', '$customeraddress')";
    // Create the prepared statement using the db connection
    $stmt = $db->prepare($sql);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}




function getScripturesByBook($bookName){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT * FROM scriptures WHERE book ILIKE '%$bookName%'";
    // Create the prepared statement using the heroku connection
    $stmt = $db->prepare($sql);
    // The next line replaces the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    //$stmt->bindValue(':book', $bookName, PDO::PARAM_STR);
    // Query the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $response;
}

function getScriptureById($scriptureId){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = 'SELECT * FROM scriptures WHERE id = :scriptureId';
    // Create the prepared statement using the heroku connection
    $stmt = $db->prepare($sql);
    // The next line replaces the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':scriptureId', $scriptureId, PDO::PARAM_STR);
    // Query the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $response;
}

?>