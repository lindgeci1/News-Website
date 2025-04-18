<?php
include "../config/databaseN.php";
include_once "../controllers/CRUDAT_PER_USER.php";

$strep = new CRUDAT_PER_USER();
$Users = $strep->getAllUsers(); // Updated method name to match convention
?>

<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <title>User List</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Email</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Users as $User) { ?>
                <tr>
                    <td><?php echo $User["Name"]; ?></td>
                    <td><?php echo $User["Surname"]; ?></td>
                    <td><?php echo $User["Email"]; ?></td>
                    <td><?php echo $User["Password"]; ?></td>
                    <td><a href='../controllers/editUser.php?id=<?= $User["userId"] ?>'>Edit</a></td> <!-- Updated to userId -->
                    <td><a href='../controllers/deleteUser.php?id=<?= $User["userId"] ?>'>Delete</a></td> <!-- Updated to userId -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <?php
    if (isset($_GET["admin"])) {
        $admin = $_GET["admin"];
        echo "<p>Edit/modified performed by: $admin</p>";
    }
    ?>

    <div class="goback">
        <a href="../Pages/index.php">GO BACK</a>
    </div>

</body>

</html>
