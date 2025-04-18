<?php
class ROLE {
    private $roleId; // Primary Key
    private $roleName;

    public function __construct($roleId = null, $roleName) {
        $this->roleId = $roleId;
        $this->roleName = $roleName;
    }

    // Getter and setter for roleId
    public function getRoleId() {
        return $this->roleId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

    // Getter and setter for roleName
    public function getRoleName() {
        return $this->roleName;
    }

    public function setRoleName($roleName) {
        $this->roleName = $roleName;
    }
}
?>
