<?php
include("config/database.php");

## Login form submit
if (isset($_POST['submit'])) {
    extract($_POST);

    # Sql query to login
    // $pass = md5($password);
    $sql = "SELECT * FROM emp_id where username = '$username' AND password = '$password'";
    // print_r($sql);
    $result = $conn->query($sql);
    if ($result->num_rows) {
        $_SESSION['is_user_loggedin'] = true;
        $_SESSION['user_data'] = mysqli_fetch_assoc(($result));
        header("LOCATION: auditor_portal.php");
    } else {
        $_SESSION['error'] = "Invalid login info";
        header("LOCATION: Index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
<header>
        <!-- <div class="navbar" id="navbar"> -->
            <div class="img">
                <img src="Image/logo.png" alt="logo" class="logo">
                <img src="Image/logo.png" alt="logo" class="logo">
            </div>
            <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
            <h2>End Point Audit Software</h2>
        <!-- </div> -->
    </header>
    <br>
    <br>
    
    <div class="container">
        <div class="login-container" id="login-container">
            <form id="login-form" method="POST">
                <h2>Login</h2>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter Your Username" required>
                
                    <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                <div>
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div><center>
                <!-- <button type="submit" name="submit">Login</button> -->
                <input type="submit" value="Login" name="submit"></center>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>
</body>
</html>