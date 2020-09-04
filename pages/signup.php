<?php
    session_start();
    if(!isset($_SESSION["login"])){
        require_once "../database/connection.php";
        require_once "../database/queryBuilder.php";
        $config = require_once "../config.php";
        $pdo = connection::connectConfig($config['database']);
        $DBobj = new queryBuilder($pdo);
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $check = $DBobj->makeQuery("SELECT id FROM users WHERE email = '" . $_POST['email'] . "'");
            if(empty($check)){
                if($_POST['password'] != $_POST['confirm-password']){
                    $_SESSION["alert"] = "Two passwords are not same";
                    header("Location: ../index.php");
                }else{
                    $data = [];
                    $data["name"] = $_POST["name"];
                    $data["email"] = $_POST["email"];
                    $data["password"] = sha1($_POST['password']);
                    $data["phone_number"] = $_POST["phone"];
                    $data["address"] = $_POST["address"];
                    $DBobj->insert('users',$data);
                    $_SESSION["login"] = "true";
                    $_SESSION["name"] = $_POST["name"];
                    header("Location: ./message.php");
                }
            }else{
                $_SESSION["alert"] = "This Email Already Exist";
                header("Location: ../index.php");
            }
            
        }
    }else{
        header("Location: ./home.php");
    }