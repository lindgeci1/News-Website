
<!DOCTYPE html>
<html>
<head>
    
    
    <title>News Website</title>
    <link rel="stylesheet" href="../style.css">


</head>
<body>
    <header>
        <div class="logo">
            <h1>The New York Times</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Business.php">Business</a></li>
                <li><a href="Technology.php">Technology</a></li>
                <li><a href="World.php">World</a></li>
                <li><a href="Sports.php">Sports</a></li>
                <li><a href="Health.php">Health</a></li>

                <?php
            session_start();
            if (isset($_SESSION["user"]) && $_SESSION["user"] == "yes") {
                require_once "../config/databaseN.php";

                $database = new DATABASE1();
                $conn = $database->startConnection();
                $userId = $_SESSION["userId"];

                // Fetch user role dynamically
                $sql = "SELECT roleId FROM user_roles WHERE userId = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$userId]);
                $userRole = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($userRole && $userRole["roleId"] == 1) { // If roleId = 1 (admin)
                    echo '<li><a href="../dashboard/dashboard.php">Users</a></li>';
                    echo '<li><a href="../dashboard/newsdashboard.php">News</a></li>';
                    echo '<li><a href="../controllers/insertNews.php">Insert</a></li>';
                }
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="Login.php">Log-in</a></li>';
                echo '<li><a href="Register.php">Register</a></li>';
            }
            ?>
                
            </ul>
        </nav>
    </header>
    <div class="search">
        <div class="search1">
            <input type="search" id="pc" placeholder="Search...">
            <button onclick="checkSearch()">Search</button>
        </div>
    </div>
    
    <?php
include_once "../controllers/CRUDAT_PER_LAJME.php";

$crud = new CRUDAT_PER_LAJME();
$homeNews = $crud->getLatestNewsForSports(10); // Get latest 10 news items from "Home"
?>
<div class="main">
    <!-- Left Section -->
    <div class="left">
        <div class="box">
            <div class="title">
                <h3>Latest in Sports</h3>
            </div>
            <div class="newsBox1">
                <?php
                if (!empty($homeNews)) {
                    // Iterate through the news items and alternate
                    for ($i = 0; $i < count($homeNews); $i += 2) {
                        echo '<div class="newsItem1">';
                        echo '<div class="img"><img src="../indexphoto/' . htmlspecialchars($homeNews[$i]["foto"]) . '" alt="' . htmlspecialchars($homeNews[$i]["newsName"]) . '"></div>';
                        echo '<h3>' . htmlspecialchars($homeNews[$i]["newsName"]) . '</h3>';
                        echo '<p>' . htmlspecialchars(substr($homeNews[$i]["newsText"], 0, length: PHP_INT_MAX)) . '</p>';
                        if (isset($_SESSION["user"]) && $_SESSION["user"] == "yes") {
                            if (isset($_SESSION["roleId"]) && $_SESSION["roleId"] == 1) { // Admin access
                                echo '<a href="../controllers/editNews.php?id=' . htmlspecialchars($homeNews[$i]["id"]) . '">Edit</a>'; 
                            }
                        } echo'<br>';
                        echo '<a href="LatestNews.php">Read more</a>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No news available in the Sports category.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right">
        <div class="box">
            <div class="title">
                <h3>Latest in Sports</h3>
            </div>
            <div class="newsBox1">
                <?php
                if (!empty($homeNews)) {
                    // Iterate through the news items and alternate
                    for ($i = 1; $i < count($homeNews); $i += 2) {
                        echo '<div class="newsItem1">';
                        echo '<div class="img"><img src="../indexphoto/' . htmlspecialchars($homeNews[$i]["foto"]) . '" alt="' . htmlspecialchars($homeNews[$i]["newsName"]) . '"></div>';
                        echo '<h3>' . htmlspecialchars($homeNews[$i]["newsName"]) . '</h3>';
                        echo '<p>' . htmlspecialchars(substr($homeNews[$i]["newsText"], 0, length: PHP_INT_MAX)) . '</p>';
                        if (isset($_SESSION["user"]) && $_SESSION["user"] == "yes") {
                            if (isset($_SESSION["roleId"]) && $_SESSION["roleId"] == 1) { // Admin access
                                echo '<a href="../controllers/editNews.php?id=' . htmlspecialchars($homeNews[$i]["id"]) . '">Edit</a>'; 
                            }
                            echo'<br>';
                        }  echo '<a href="LatestNews.php">Read more</a>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No news available in the Sports category.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

    <footer class="footer">
        <div class="container">
            <div class="section">
                <h2>Categories</h2>
                <div class="kategorite">
                    <p>Business</p>
                    <p>Technology</p>
                    <p>Sports</p>
                    <p>World</p>
                    <p>Health</p>
                </div>
            </div>
    
            <div class="section">
                <h2>Contact Us</h2>
                <div class="contact-info">
                <p>Phone:
                    <span>+383 123-456-789</span><br>
                    <span>+383 123-456-789</span></p><hr>
                    <p>Email:
                    <span>lindgeci@gmail.com</span><br>
                    <span>alketarama@gmail.com</span></p><hr>
                    <p>Address: <span>Prishtine, Kosove</span></p>
                </div>
                <textarea id="commentInput" name="comment" placeholder="Write your comment..."></textarea>
            </div>
    
            <div class="section1">
                <h2>Follow Us</h2>
                <div class="icon">
                    <a href="https://twitter.com/?lang=en"><img src="../indexphoto/twitter-icon.png" alt="Twitter"></a>
                    <a href="https://www.instagram.com/"><img src="../indexphoto/instagram-icon.png" alt="Instagram"></a>
                    <a href="https://www.facebook.com/login/"><img src="../indexphoto/facebook-icon.png" alt="Facebook"></a>
                </div>
            </div>
    
            <div class="section">
                <h2>Subscribe to Our News</h2>
                <div class="email">
                    <input type="email" id="emailInput" placeholder="Enter Your Email Here">
                    <button onclick="checkEmail()">Subscribe</button>
                </div>
            </div>
        </div>
    
        <div class="copyrights">
            <p>&copy; 2023 𝔗𝔥𝔢 𝔑𝔢𝔴 𝔜𝔬𝔯𝔨 𝔗𝔦𝔪𝔢𝔰</p>
        </div>
    </footer>
        
        
        <script>


            function checkEmail() {


                let domain = document.getElementById("emailInput").value.split('@')[1];
        
                if (domain !== "@gmail.com") {
                    alert("Please use the correct email domain!");
                } else {
                    alert("You have successfully subscribed!");
                }
            }


            function checkSearch() {

                if(document.getElementById("pc").value===''){
                    alert("Please put something on the search bar!");
                }

                
            }
           




        </script>
</body>
</html>
