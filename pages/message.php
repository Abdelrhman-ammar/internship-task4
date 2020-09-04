<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="../resources/style.css">
    </head>
    <body>
        <?php
            session_start();        
            if(isset($_SESSION['login'])){
                echo "<h1 class='message'>Successful Registration<h1>";
                header("Refresh: 1; URL=./home.php");
            }else{
                header("Location: ../index.php");
            }
        ?>
    </body>
</html>