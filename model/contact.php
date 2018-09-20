<?php
//Gets and sets different variables from the contact DB
class Contact {
    private $id, $email, $phone, $contact_by, $comments;
    public function __construct($id, $email, $phone, $contact_by, $comments) {
        $this->id = $id;
        $this->email = $email;
        $this->phone = $phone;
        $this->contact_by = $contact_by;
        $this->comments = $comments;
    }
    public function getID(){
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($value){
        $this->phone = $value;
    }
    public function getContactBy(){
        return $this->contact_by;
    }
    public function setContactBy($value){
        $this->contact_by = $value;
    }
    public function getComments(){
        return $this->comments;
    }
    public function setComments($value){
        $this->comments = $value;
    }
}

