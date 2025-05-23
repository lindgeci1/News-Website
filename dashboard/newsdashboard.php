<?php
include "../config/databaseN.php";
include_once "../controllers/CRUDAT_PER_LAJME.php";

$crud = new CRUDAT_PER_LAJME();
$newsList = $crud->getAllNews();
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
    <title>News List</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Titulli</th>
                <th>Paragrafi</th>
                <th>Foto</th>
                <th>Category</th> <!-- Added Category column -->
                <th>Posted By</th> <!-- Changed column name from User ID -->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsList as $news) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($news["newsName"]); ?></td>
                    <td><?php echo htmlspecialchars($news["newsText"]); ?></td>
                    <td>
                        <?php
                        $image = "../indexphoto/" . $news["foto"];
                        echo "<img src='$image' style='max-height: 100px; max-width: 100px;'>";
                        ?>
                    </td>
                    <td><?php echo htmlspecialchars($news["category"]); ?></td> <!-- Show Category -->
                    <td><?php echo htmlspecialchars($news["Name"] . " " . $news["Surname"]); ?></td> <!-- Show Name & Surname -->
                    <td><a href='../controllers/editNews.php?id=<?= $news["id"] ?>'>Edit</a></td>
                    <td><a href='../controllers/deleteNews.php?id=<?= $news["id"] ?>'>Delete</a></td>
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
