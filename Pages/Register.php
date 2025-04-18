<?php
include_once '../models/USER.php';
include_once '../controllers/CRUDAT_PER_USER.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["regEmail"];
    $password = $_POST["regPassword"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $crudat_per_user = new CRUDAT_PER_USER();
    $existingUser = $crudat_per_user->getUserByEmail($email);

    if ($existingUser) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        $User = new USER($name, $surname, $email, $passwordHash);
        $userId = $crudat_per_user->insertUser($User); // Insert user and get userId

        // Insert default role (roleId = 2 for normal users)
        $crudat_per_user->insertUserRole($userId, 2);

        echo "<script>alert('Registration successful! Redirecting to login page.');</script>";
        header("Location: Login.php");
        exit();
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
                <li><a href="Login.php">Log-in</a></li>
                <li><a href="Register.php">Register</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="LoginRegister">
        <div class="Register">
            
        <form action="" method="post" onsubmit="return validateRegistrationForm()">
    <h1>Register</h1>
    <p>Name: <input type="text" name="name" id="name" required></p>
    <p>Surname: <input type="text" name="surname" id="surname" required></p>
    <p>Email: <input type="email" name="regEmail" id="regEmail" required ></p>
    <p>Password: <input type="password" name="regPassword" id="regPassword" required ></p>
    <button type="submit" name="submit">Register</button>
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
    function validateRegistrationForm() {
        var name = document.getElementById("name").value;
        var surname = document.getElementById("surname").value;
        var email = document.getElementById("regEmail").value;
        var password = document.getElementById("regPassword").value;

        var nameRegex = /^[a-zA-Z\s]+$/;
        if (!nameRegex.test(name)) {
            alert("Please enter a valid name");
            return false;
        }

        var surnameRegex = /^[a-zA-Z\s]+$/;
        if (!surnameRegex.test(surname)) {
            alert("Please enter a valid surname");
            return false;
        }

        var emailRegex = /^[a-zA-Z0-9._+-]+@[a-zA-Z-]+\.[a-zA-Z]{3,}$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address");
            return false;
        }


        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

        if (!passwordRegex.test(password)){
            alert("Password must have at least 6 characters, including one uppercase, one lowercase, and one digit.");
            return false;
        }

        return true;
    }

</script>

</body>
</html>

