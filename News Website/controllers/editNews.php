<?php
include "CRUDAT_PER_LAJME.php";
session_start();

if (!isset($_SESSION["userId"])) {
    echo "<script>alert('You need to log in first!'); window.location.href = '../Pages/Login.php';</script>";
    exit();
}

$userId = $_SESSION["userId"]; // Automatically fetch userId
$id = $_GET["id"];

$strep = new CRUDAT_PER_LAJME();
$News = $strep->getNewsById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Edit News</title>
</head>

<body>
    <div class="LoginRegister">
        <div class="Register">
            <form action="" method="post">
                <h1>Edit News</h1>
                <p>Title: <input type="text" name="newsname" value="<?php echo htmlspecialchars($News["newsName"]); ?>" required><br></p>
                <p>Content: <input type="text" name="newstext" value="<?php echo htmlspecialchars($News["newsText"]); ?>" required><br></p>
                
                <p>Category:
                    <select name="category" required>
                        <option value="Business" <?php echo ($News["category"] == "Business") ? "selected" : ""; ?>>Business</option>
                        <option value="Technology" <?php echo ($News["category"] == "Technology") ? "selected" : ""; ?>>Technology</option>
                        <option value="World" <?php echo ($News["category"] == "World") ? "selected" : ""; ?>>World</option>
                        <option value="Sports" <?php echo ($News["category"] == "Sports") ? "selected" : ""; ?>>Sports</option>
                        <option value="Health" <?php echo ($News["category"] == "Health") ? "selected" : ""; ?>>Health</option>
                        <option value="Home" <?php echo ($News["category"] == "Home") ? "selected" : ""; ?>>Home</option>
                    </select>
                </p>

                <p>Picture: <input type="file" name="Foto"><br></p> <!-- Optional foto update -->
                <button type="submit" name="submitt">Save</button>
                <a href="../dashboard/newsdashboard.php">GO BACK</a>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST["submitt"])) {
    if (empty($_POST['newsname']) || empty($_POST['newstext']) || empty($_POST['category'])) {
        echo "<script>alert('Fill all fields!');</script>";
    } else {
        $newsName = $_POST["newsname"];
        $newsText = $_POST["newstext"];
        $category = $_POST["category"];
        $foto = !empty($_POST["Foto"]) ? $_POST["Foto"] : $News["foto"]; // Keep old photo if not updated

        $adminName = $_SESSION["admin_username"] ?? "Unknown Admin";

        // Update news with the logged-in user's ID
        $strep->editNews($id, $newsName, $newsText, $foto, $category);

        header("Location: ../dashboard/newsdashboard.php?admin=$adminName");
        exit();
    }
}
?>
