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

// Retrieve information from all the customers
function searchByCustomerName($customerName){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT * FROM (SELECT id, customername, customerlastname,customerphone, customername || ' ' || customerlastname AS full_name FROM customers) t WHERE full_name ILIKE '%$customerName%'";
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
function searchByCustomerId($customerId){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT * FROM (SELECT id, customername, customerlastname,customerphone, customeraddress, customername || ' ' || customerlastname AS full_name FROM customers) t WHERE id = $customerId";
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

function getAllModels(){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT * FROM models";
    // Create the prepared statement using the heroku connection
    $stmt = $db->prepare($sql);
    // Query the data
    $stmt->execute();
    // Get the results
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $response;
}

function getAllServices(){
    // Create a connection object using the heroku connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "SELECT * FROM services";
    // Create the prepared statement using the heroku connection
    $stmt = $db->prepare($sql);
    // Query the data
    $stmt->execute();
    // Get the results
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $response;
}

function addNewRo($roNumber, $roDate, $customerId, $modelId, $roModelSn, $roProblem, $roStatus){
    // Create a connection object using the db connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = "INSERT INTO repairorders(ronumber, rodate, customer_id, model_id, romodelsn, roproblem, current_rostatus)
    VALUES ('$roNumber', '$roDate', '$customerId', '$modelId', '$roModelSn', '$roProblem', '$roStatus')";
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

?>