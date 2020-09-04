<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="./resources/style.css">
    </head>
    <body>
        <div class="main-div">
            <?php if(!isset($_SESSION['login'])): ?>
                <button id="mybtn" class="btn" onclick="formHandel()">Sign Up</button>
                <form id="signupForm" method="post" action="pages/signup.php" class="signup-form">
                    <input name="name" type="text" placeholder="Enter Your Name" required autofocus>
                    <input name="email" type="email" placeholder="Enter Your Mail" required>
                    <input name="password" type="password" placeholder="Enter Password" required>
                    <input name="confirm-password" type="password" placeholder="Confirm Password" required>
                    <input name="phone" type="number" placeholder="Enter Your Phone number" required>
                    <textarea name="address" required>Enter Your Address</textarea>
                    <button class="btn-submit" type="submit">Sign Up</button>
                </form>


                <form id="signinForm" method="post" action="pages/signin.php" class="signin-form">
                    <input name="email" type="email" placeholder="Enter Your Mail" required>
                    <input name="password" type="password" placeholder="Enter Password" required>
                    <button class="btn-submit" type="submit">Sign In</button>
                </form>
                <p class="info">
                    <?php if(isset($_SESSION["alert"])){echo $_SESSION["alert"];} ?>
                </p>
            <?php else: 
                header("Location: ./pages/home.php");
            ?>
            <?php endif; ?>
        </div>
        <script src="./resources/index.js"></script>
    </body>
</html>