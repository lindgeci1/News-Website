<?php
include_once("../models/NEWS.php");
include_once('../controllers/CRUDAT_PER_LAJME.php');

session_start(); // Start session to access user data

if (!isset($_SESSION["userId"])) {
    echo "<script>alert('You need to log in first!'); window.location.href = '../Pages/Login.php';</script>";
    exit();
}

if (isset($_POST["submit"])) {
    $newsname = $_POST["newsname"];
    $newstext = $_POST["newstext"];
    $foto = $_POST["Foto"];
    $category = $_POST["category"]; // Get category from the form
    $userId = $_SESSION["userId"]; // Get userId automatically from session

    // Create NEWS object with userId and category
    $NEWS = new NEWS($newsname, $newstext, $foto, $userId, $category);
    $crud = new CRUDAT_PER_LAJME();
    $crud->insertNews($NEWS);

    header("Location: ../Pages/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Add News</title>
</head>

<body>
    <div class="LoginRegister">
        <div class="Register">
            <form action="" method="post">
                <h1>Insert News</h1>
                <p>News: <input type="text" name="newsname" required><br></p>
                <p>Text: <input type="text" name="newstext" required><br></p>
                <p>Upload: <input type="file" name="Foto" required><br></p>
                <p>Category: 
                    <select name="category" required>
                        <option value="Business">Business</option>
                        <option value="Technology">Technology</option>
                        <option value="World">World</option>
                        <option value="Sports">Sports</option>
                        <option value="Health">Health</option>
                        <option value="Home">Home</option>
                    </select>
                </p>
                <button type="submit" name="submit">Add News</button>
                <a href="../Pages/index.php">GO BACK</a>
            </form>
        </div>
    </div>
</body>

</html>
