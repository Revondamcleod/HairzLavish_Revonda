<?php
    //Development Connection
    $host = '127.0.0.1';
    $db = 'hairzlavishdb';
    $user = 'root';
    $psss = '';
    $charset = 'utf8mb4';

    // //Remote Database
    // $host = 'remotemysql.com';
    // $db = 'CCHqDqMWUk';
    // $user = 'CCHqDqMWUk';
    // $psss = 'd7mtPuXTHa';
    // $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $psss);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo 'Hello DataBase';
    }catch(PDOException $e){
        //echo "<h1 class='text-danger'>No Database was Found</h1>";
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertuser("admin","password");
    $user->insertuser("admin","@dministrat0r");
    

?>