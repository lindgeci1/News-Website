<?php
include_once('../config/databaseN.php'); // Use DATABASE1 to align with your configuration

class CRUDAT_PER_USER {
    private $connection;

    public function __construct() {
        $conn = new DATABASE1(); // Use DATABASE1 instead of DATABASE
        $this->connection = $conn->startConnection();
    }

    // Insert user and return userId
    public function insertUser($User) {
        $conn = $this->connection;

        $name = $User->getName();
        $surname = $User->getSurname();
        $email = $User->getEmail();
        $password = $User->getPassword();

        $sql = "INSERT INTO users (Name, Surname, Email, Password) VALUES (?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $surname, $email, $password]);

        // Return the last inserted userId
        return $conn->lastInsertId();
    }

    // Insert into user_roles table
    public function insertUserRole($userId, $roleId = 2) { // Default roleId = 2 (normal user)
        $conn = $this->connection;

        $sql = "INSERT INTO user_roles (userId, roleId) VALUES (?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$userId, $roleId]);
    }

    public function getAllUsers() {
        $conn = $this->connection;

        $sql = "SELECT u.*, r.roleName FROM users u 
                LEFT JOIN user_roles ur ON u.userId = ur.userId
                LEFT JOIN roles r ON ur.roleId = r.roleId";
        $statement = $conn->query($sql);

        $users = $statement->fetchAll();
        return $users;
    }

    public function editUser($userId, $name, $surname, $email, $password) {
        $conn = $this->connection;

        $sql = "UPDATE users SET Name=?, Surname=?, Email=?, Password=? WHERE userId=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $surname, $email, $password, $userId]);

        echo "<script>alert('User updated successfully!');</script>";
    }

    public function deleteUser($userId) {
        $conn = $this->connection;

        // Delete from user_roles first to maintain foreign key integrity
        $sql = "DELETE FROM user_roles WHERE userId=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$userId]);

        // Then delete from users
        $sql = "DELETE FROM users WHERE userId=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$userId]);
    }

    public function getUserById($userId) {
        $conn = $this->connection;

        $sql = "SELECT u.*, r.roleName FROM users u 
                LEFT JOIN user_roles ur ON u.userId = ur.userId
                LEFT JOIN roles r ON ur.roleId = r.roleId
                WHERE u.userId=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$userId]);
        $user = $statement->fetch();
        return $user;
    }

    public function getUserByEmail($email) {
        $conn = $this->connection;

        $sql = "SELECT u.*, r.roleName FROM users u 
                LEFT JOIN user_roles ur ON u.userId = ur.userId
                LEFT JOIN roles r ON ur.roleId = r.roleId
                WHERE u.Email=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch();
        return $user;
    }
}
?>
