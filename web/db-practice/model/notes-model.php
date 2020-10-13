<?php

/*
 * Notes model
 */

//Retrieve query results from database
function getAllNotes(){
    // Create a connection object using the acme connection function
    $db = herokuConnect();
    // The SQL statement
    $sql = 'SELECT * FROM scriptures';
    // Create the prepared statement using the acme connection
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

?>