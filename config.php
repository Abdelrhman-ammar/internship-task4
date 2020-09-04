<?php
    return [
        'database' =>[
            'DBMS' => 'mysql',
            'host' => '127.0.0.1',
            'DBName' => 'task4',
            'username' => 'root',
            'password' => 'pass',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ],
        ],
    ];