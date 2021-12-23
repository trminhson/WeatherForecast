<?php
    include 'Backend/login.php';
    
    session_start();
    error_reporting(0);

    if (isset($_SESSION['userId'])) {
        header("Location: welcome.php");}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and SignUp form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="loginbox-interface">
        <div class="loginbox-form-box">
            <div class="loginbox-button-box">
                <div id="loginbox-button">
                </div>
                <div class="loginbox-loginbutton">
                    <button type="button" class="loginbox-toggle-btn" onclick="login()">LOGIN</button>
                </div>
                <div class="loginbox-signupbutton">
                    <button type="button" class="loginbox-toggle-btn" onclick="window.location.href='Signup.php'">SIGN
                        UP</button>
                </div>
                <!--
                    <button type="button" class="loginbox-toggle-btn" onclick="login()">LOGIN</button>
                    <button type="button" class="loginbox-toggle-btn" onclick="signup()">SIGN UP</button> -->

            </div>
            <div class="loginbox-social-icon">
                <img src="img/facebook-social-media-fb-logo-square-44659.webp">
                <img src="img/38-instagram-3-512.webp" alt="">
                <img src="img/img_2220.png" alt="">
            </div>
            <form action="../Backend/login.php" method="post" id="loginbox-login" class="loginbox-input-group-login">
                <input class="loginbox-input-field" type="text" name="userId" id="" placeholder="User ID or Email"
                    required>
                <input class="loginbox-input-field" type="password" name="password" id="" placeholder="Password"
                    required>
                <input type="checkbox" class="loginbox-check-box" id="remember-password"> <label for="remember-password"
                    style="cursor: pointer;">Remember password</label>
                <button name="submitLog" type="submit" class="loginbox-submit-btn">Login</button>
                <div class="reset-password">
                    <a onclick="resetPassword()">
                        Forgot your password?
                    </a>
                </div>
            </form>


            <form action="" method="post" id="loginbox-reset-password" class="loginbox-input-group-login">
                <input class="loginbox-input-field" type="text" name="userId" id="" placeholder="Enter your email"
                    required>

                <input type="checkbox" class="loginbox-check-box" id="remember-password"> <label for="remember-password"
                    style="cursor: pointer;">Remember password</label>
                <button name="submitForgot" type="submit" class="loginbox-submit-btn">Reset password</button>
            </form>
        </div>

    </div>


    <script>
        var x = document.getElementById("loginbox-login");
        var j = document.getElementById("loginbox-reset-password");


        function login() {
            x.style.left = "50px";
            j.style.left = "800px"
        }
        function resetPassword() {
            j.style.left = "50px";
            x.style.left = "-700px";

        }

    </script>

</body>

</html>