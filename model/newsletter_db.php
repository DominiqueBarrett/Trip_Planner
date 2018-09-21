<?php

/**********************************************
 * Modified By: Dominique Barrett             *
 * Latest Modified Date: 9-14-2018            *
 * function to add a newletter contact        *
 *********************************************/ 


/*this is the function that will add the data inputed by a user to the database into the newsletter table. 
 * It gets the first name, last name, and email address to insert*/
function add_newsletter($firstName, $lastName, $emailAddress) {
    global $db;
    $query = 'INSERT INTO newsletter (firstName, lastName, emailAddress)
              VALUES (:firstName, :lastName, :emailAddress)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':emailAddress', $emailAddress);
    $statement->execute();
    $statement->closeCursor();    
}

?>