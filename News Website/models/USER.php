<?php
class USER {
    private $userId; // Changed from id to userId
    private $Name;
    private $Surname;
    private $Email;
    private $Password;

    public function __construct($Name, $Surname, $Email, $Password) {
        $this->Name = $Name;
        $this->Surname = $Surname;
        $this->Email = $Email;
        $this->Password = $Password;
    }

    // Getter and setter for userId
    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter and setter for Name
    public function getName() {
        return $this->Name;
    }
    public function setName($Name) {
        $this->Name = $Name;
    }

    // Getter and setter for Surname
    public function getSurname() {
        return $this->Surname;
    }
    public function setSurname($Surname) {
        $this->Surname = $Surname;
    }

    // Getter and setter for Email
    public function getEmail() {
        return $this->Email;
    }
    public function setEmail($Email) {
        $this->Email = $Email;
    }

    // Getter and setter for Password
    public function getPassword() {
        return $this->Password;
    }
    public function setPassword($Password) {
        $this->Password = $Password;
    }

    // Optional: __toString for debugging or display purposes
    public function __toString() {
        return "User ID: " . $this->userId . " | Name: " . $this->Name . " | Surname: " . $this->Surname;
    }
}
?>
