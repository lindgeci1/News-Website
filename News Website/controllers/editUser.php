<?php
include "CRUDAT_PER_USER.php";
$userId = $_GET["id"]; // Changed to userId

$strep = new CRUDAT_PER_USER();
$User = $strep->getUserById($userId); // Updated method call
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Edit User</title>
</head>

<body>
    <div class="LoginRegister">
        <div class="Register">
            <form action="" method="post">
                <h1>Edit User</h1>
                <p>Name: <input type="text" name="name" id="name" value="<?php echo $User["Name"]; ?>"><br></p>
                <p>Surname: <input type="text" name="surname" id="surname" value="<?php echo $User["Surname"]; ?>"><br></p>
                <p>Email: <input type="email" name="regEmail" id="regEmail" value="<?php echo $User["Email"]; ?>"><br></p>
                <p>Password: <input type="password" name="regPassword" id="regPassword" value=""><br></p>
                <button type="submit" name="submitt">Save</button>
                <a href="../dashboard/dashboard.php">GO BACK</a>
            </form>
        </div>
    </div>


    <?php
    if (isset($_POST["submitt"])) {
        if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['regEmail']) || empty($_POST['regPassword'])) {
            echo "Fill all fields!";
        } else {
            $userId = $User["userId"]; // Updated to use userId
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $regEmail = $_POST["regEmail"];
            $regPassword = $_POST["regPassword"];

            if (strlen($regPassword) < 8) {
                echo "Password should be at least 8 characters long.";
            } else {
                // Hash the password
                $passwordHash = password_hash($regPassword, PASSWORD_DEFAULT);

                session_start();

                $adminName = $_SESSION["admin_username"] ?? "Unknown Admin";

                $strep->editUser($userId, $name, $surname, $regEmail, $passwordHash); // Updated method call
                header("Location: ../dashboard/dashboard.php?admin=$adminName");
                exit();
            }
        }
    }
    ?>

</body>

</html>
