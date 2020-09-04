<?php

    class connection {
        public static function connect($DBName, $username = 'root', $pass = '', $host = '127.0.0.1', $DBMS = 'mysql'){
            try {
                return new PDO("$DBMS:host=$host;dbname=$DBName",$username,$pass);
            }catch (PDOException $e){
                die($e->getMessage());
            }
        }
        public static function connectConfig($database){
            try {
                $pdo =  new PDO(
                    $database['DBMS'] . ':host=' . $database['host'],
                    $database['username'],
                    $database['password']
                );
                $dbobj = new queryBuilder($pdo);
                $DBexist = $dbobj->makequery("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = " . $database['DBName']);
                if(empty($DBexist)){
                    $dbobj->makequery("CREATE DATABASE IF NOT EXISTS " . $database['DBName']);
                    $dbobj->makequery("USE " . $database['DBName']);
                    $dbobj->makequery("CREATE TABLE users(
                        id INT(6) AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(50) NOT NULL,
                        email VARCHAR(50) NOT NULL UNIQUE,
                        password VARCHAR(50) NOT NULL,
                        phone_number VARCHAR(20) NOT NULL,
                        address VARCHAR(100) NOT NULL
                    )");
                }else{
                    $dbobj->makequery("USE " . $database['DBName']);
                }
                return $dbobj->getPDO();
            }catch (PDOException $e){
                die($e->getMessage());
            }
        }
    }