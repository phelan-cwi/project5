<?php
//creates the array from the contact database also a delete function.
class ContactDB {
    public static function getContact() {
        $db = Database::getDB();
        $query = 'SELECT * FROM contact
                  ORDER BY nameID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $contact = array();
        foreach ($statement as $row) {
            $contact = new Contact($row['nameID'],
                                     $row['email'], 
                                     $row['phone'],
                                     $row['contact_by'],
                                     $row['comments']);
            $contacts[] = $contact;
        }
        return $contacts;
    }
    
    public static function deleteContact($nameID){
    $db = Database::getDB();
    $query = 'DELETE FROM contact
                  WHERE nameID = :nameID';
        $statement = $db->prepare($query);
        $statement->bindValue(':nameID', $nameID);
        $statement->execute();
        $statement->closeCursor();   
    }
}
//$contacts = ContactDB::getContact();


