<?php
include_once('../config/databaseN.php');

class CRUDAT_PER_LAJME
{
    private $connection;

    public function __construct()
    {
        try {
            $conn = new DATABASE1();
            $this->connection = $conn->startConnection();
        } catch (Exception $e) {
            die("Failed to establish a database connection: " . $e->getMessage());
        }
    }

    public function insertNews($NEWS){
        $conn = $this->connection;

        $newsname = $NEWS->getNewsName();
        $newstext = $NEWS->getNewsText();
        $foto = $NEWS->getFoto();
        $userId = $NEWS->getUserId(); 
        $category = $NEWS->getCategory(); // Get category from NEWS object

        $sql = "INSERT INTO news(newsName, newsText, foto, userId, category) VALUES (?, ?, ?, ?, ?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$newsname, $newstext, $foto, $userId, $category]);
        echo '<script>alert("U Shtua me sukses");</script>';
    }

    public function editNews($id, $newsName, $newsText, $foto, $category) 
{
    $conn = $this->connection;

    // Get existing userId before updating
    $sqlFetchUser = "SELECT userId FROM news WHERE id=?";
    $stmtFetchUser = $conn->prepare($sqlFetchUser);
    $stmtFetchUser->execute([$id]);
    $existingNews = $stmtFetchUser->fetch(PDO::FETCH_ASSOC);

    if (!$existingNews) {
        echo "<script>alert('News not found!');</script>";
        return;
    }

    $userId = $existingNews["userId"]; // Keep existing userId

    // Update news without changing userId
    $sql = "UPDATE news SET newsName=?, newsText=?, foto=?, category=? WHERE id=?";
    $statement = $conn->prepare($sql);
    $statement->execute([$newsName, $newsText, $foto, $category, $id]);

    echo '<script>alert("U ndryshua me sukses");</script>';
}


    public function deleteNews($id)
    {
        $conn = $this->connection;
        $sql = "DELETE FROM news WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
    }

    public function getNewsById($id)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM news WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        $news = $statement->fetch();
        return $news;
    }

    public function getAllNews()
    {
        $conn = $this->connection;
        $sql = "SELECT n.*, u.Name, u.Surname 
                FROM news n 
                LEFT JOIN users u ON n.userId = u.userId"; // Join with users table
        $statement = $conn->query($sql);
        $newsList = $statement->fetchAll();
        return $newsList;
    }

    public function getLatestNewsForHome($limit = 10) {
        $conn = $this->connection;
        $sql = "SELECT * FROM news WHERE category = 'Home' ORDER BY id DESC LIMIT ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $limit, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC); // Returns multiple news items
    }

    public function getLatestNewsForBusiness($limit = 10) {
        $conn = $this->connection;
        $sql = "SELECT * FROM news WHERE category = 'Business' ORDER BY id DESC LIMIT ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $limit, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC); // Returns multiple news items
    }

    public function getLatestNewsForHealth($limit = 10) {
        $conn = $this->connection;
        $sql = "SELECT * FROM news WHERE category = 'Health' ORDER BY id DESC LIMIT ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $limit, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC); // Returns multiple news items
    }

    public function getLatestNewsForWorld($limit = 10) {
        $conn = $this->connection;
        $sql = "SELECT * FROM news WHERE category = 'World' ORDER BY id DESC LIMIT ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $limit, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC); // Returns multiple news items
    }

    public function getLatestNewsForTechnology($limit = 10) {
        $conn = $this->connection;
        $sql = "SELECT * FROM news WHERE category = 'Technology' ORDER BY id DESC LIMIT ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $limit, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC); // Returns multiple news items
    }

    public function getLatestNewsForSports($limit = 10) {
        $conn = $this->connection;
        $sql = "SELECT * FROM news WHERE category = 'Sports' ORDER BY id DESC LIMIT ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $limit, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC); // Returns multiple news items
    }
    
}
?>
