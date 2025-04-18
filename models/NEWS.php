<?php
class NEWS {
    private $id;
    private $NewsName;
    private $NewsText;
    private $Foto;
    private $userId; // Foreign key to link with the users table
    private $category; // New category attribute

    public function __construct($NewsName, $NewsText, $Foto, $userId, $category) {
        $this->NewsName = $NewsName;
        $this->NewsText = $NewsText;
        $this->Foto = $Foto;
        $this->userId = $userId; // Assign userId during object creation
        $this->category = $category; // Assign category during object creation
    }

    // Getter and setter for NewsName
    public function getNewsName() {
        return $this->NewsName;
    }
    public function setNewsName($NewsName) {
        $this->NewsName = $NewsName;
    }

    // Getter and setter for NewsText
    public function getNewsText() {
        return $this->NewsText;
    }
    public function setNewsText($NewsText) {
        $this->NewsText = $NewsText;
    }

    // Getter and setter for Foto
    public function getFoto() {
        return $this->Foto;
    }
    public function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    // Getter and setter for userId
    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter and setter for category
    public function getCategory() {
        return $this->category;
    }
    public function setCategory($category) {
        $this->category = $category;
    }

    // Optional: Add a __toString() method for debugging or display
    public function __toString() {
        return "News Name: " . $this->NewsName . ", Category: " . $this->category . ", News Text: " . $this->NewsText . ", User ID: " . $this->userId;
    }
}
?>
