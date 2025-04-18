<?php
class USER_ROLE {
    private $userRoleId; // Primary Key
    private $userId;
    private $roleId;

    public function __construct($userRoleId = null, $userId, $roleId) {
        $this->userRoleId = $userRoleId;
        $this->userId = $userId;
        $this->roleId = $roleId;
    }

    // Getter and setter for userRoleId
    public function getUserRoleId() {
        return $this->userRoleId;
    }

    public function setUserRoleId($userRoleId) {
        $this->userRoleId = $userRoleId;
    }

    // Getter and setter for userId
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter and setter for roleId
    public function getRoleId() {
        return $this->roleId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }
}
?>
