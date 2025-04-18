<?php
require_once "../config/databaseN.php";

if (isset($_POST["submit"])) {
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    // Initialize database connection
    $database = new DATABASE1();
    $conn = $database->startConnection();

    if ($conn) {
        // Fetch user details by email
        $sql = "SELECT * FROM users WHERE Email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user["Password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                $_SESSION["userId"] = $user["userId"]; // Store userId in session
                $_SESSION["admin_username"] = $user["Name"]; // Store username in session

                // Fetch roleId from user_roles table
                $sqlRole = "SELECT roleId FROM user_roles WHERE userId = :userId";
                $stmtRole = $conn->prepare($sqlRole);
                $stmtRole->bindParam(':userId', $user["userId"]);
                $stmtRole->execute();
                $role = $stmtRole->fetch(PDO::FETCH_ASSOC);

                // Assign roleId in session
                $_SESSION["roleId"] = $role["roleId"] ?? 2; // Default to 2 (user)

                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Password does not match');</script>";
            }
        } else {
            echo "<script>alert('Email does not match');</script>";
        }
    } else {
        echo "<script>alert('Database connection failed');</script>";
    }
}
?>




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
                if (isset($_SESSION["roleId"]) && $_SESSION["roleId"] == 1) { // Admin access
                    echo '<li><a href="dashboard.php">Admin</a></li>';
                    echo '<li><a href="newsdashboard.php">News</a></li>';
                    echo '<li><a href="insertNews.php">Insert</a></li>';
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
    
    <div class="LoginRegister">
        <div class="Log-in">

            <form action="Login.php" method="post" onsubmit="return validateLoginForm()">
                <h1>Log-In</h1>
                <p>Email: <input id="loginEmail" type="email" name="loginEmail" required autocomplete="email"></p>
                <p>Password: <input id="loginPassword" type="password" name="loginPassword" required autocomplete="current-password"></p>     
                <button type="submit" name = "submit">Log in</button>
            </form>
        </div>
    </div>

    
    <footer>
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
                        <p>Phone: <span>+383 123-456-789</span></p>
                        <p>Email: <span>NYTimes@gmail.com</span></p>
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
        </div>
    </footer>  
    
 <script>


    function validateLoginForm() {
        var loginEmail = document.getElementById("loginEmail").value;
        var loginPassword = document.getElementById("loginPassword").value;

        var emailRegex = /^[a-zA-Z0-9._+-]+@[a-zA-Z-]+\.[a-zA-Z]{1,3}$/;
        if (!emailRegex.test(loginEmail)) {
            alert("Please enter a valid email address");
            return false;
        }
        
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
        if (!passwordRegex.test(loginPassword)){
            alert("Password must have at least 6 characters, including one uppercase, one lowercase, and one digit.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
