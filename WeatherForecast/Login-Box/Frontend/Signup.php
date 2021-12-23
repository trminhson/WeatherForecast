<?php
    include 'Backend/register.php';
    error_reporting(0);

    session_start();

    if (isset($_SESSION['userId'])) {
        header("Location: Login.php");
    }
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
                <div id="loginbox-button" style="left: 110px;">
                </div>
                <div class="loginbox-loginbutton">
                    <button type="button" class="loginbox-toggle-btn"
                        onclick="window.location.href='login.php'">LOGIN</button>
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
            <form action="../Backend/register.php" method="POST" id="loginbox-signup"
                class="loginbox-input-group-signup" style="left: 50px;">
                <input class="loginbox-input-field" type="text" name="userId" id="loginbox-userId"
                    placeholder="User ID " required>
                <input class="loginbox-input-field" type="email" name="email" id="loginbox-email" placeholder="Email"
                    required>

                <input class="loginbox-input-field" type="password" name="password" id="" placeholder="Password"
                    required>
                <input class="loginbox-input-field" type="password" name="cpassword" id=""
                    placeholder="Enter your password again" required>
                <input type="checkbox" class="loginbox-check-box"> <span>I agree to term & conditions</span>
                <button name="submitSign" type="submit" class="loginbox-submit-btn">Sign Up</button>

            </form>
        </div>

    </div>


    <script>
        var x = document.getElementById("loginbox-login");
        var y = document.getElementById("loginbox-signup");
        var z = document.getElementById("loginbox-button");
        var j = document.getElementById("loginbox-reset-password");

        function signup() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
            j.style.left = "400px"
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
            j.style.left = "800px"
        }
        function resetPassword() {
            j.style.left = "50px";
            x.style.left = "-700px";

        }

    </script>

</body>

</html>