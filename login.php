<?php
    session_start();

    include("connect.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
    
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username)) {
            $query = "SELECT * FROM form WHERE username = '$username' LIMIT 1";
            $result = mysqli_query($con, $query);

            if($result) {
                if(mysqli_num_rows($result) > 0) {
                 $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $password) {

                    $_SESSION['user_id'] = $user_data['id'];
                    $_SESSION['username'] = $user_data['username'];

                    header("Location:dashboard.php");
                    die;
                    }
                }
            }
            echo "<script type = 'text/javascript'> alert('Wrong Username or Password')</script>";
        } else {
            echo "<script type = 'text/javascript'> alert('Wrong Username or Password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">
            <form action="" method="POST">
                <h1>Login</h1>

                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required>
                    </div>

                    <div class="input-field" id="pwField">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
                
                <div class="remember-forgot">
                  <a href="#">Forgot Password</a>
                    </div>
                    
                    <div class="register-link">
                        <p>Don't have an account? </p>
                        <a href="register.php">Register</a>
                    </div>
                    <div class="ädmin">
                        <a href="AdminLogIn.php">Admin Log-In</a>
                    </div>

        </form>
    </div>
</body>
</html>