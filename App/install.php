<?php
require_once "Config/database.php";
echo DB_PASS;
$db = new PDO("mysql:host=" . DB_HOST . ";charset=utf8", DB_USER, DB_PASS);
$db->setAttribute(PDO::ERRMODE_EXCEPTION, TRUE);
// $sql = file_get_contents(ROOT . "init.sql");
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
$db->exec($sql);
try {
    $db->__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
} catch (PDOException $e) {
    die($e->getMessage());
}
try {
    $db->exec("CREATE TABLE " . T_SETTINGS . "(
        param VARCHAR(20) NOT NULL,
        value VARCHAR(250) NOT NULL
    );");
    
    $db->exec("CREATE TABLE " . T_USERS . "(
        id BIGINT AUTO_INCREMENT NOT NULL,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        privilege INT(2) NOT NULL,
        PRIMARY KEY (id)
    );");

    $db->exec("CREATE TABLE " . T_POSTS . "(
        id BIGINT AUTO_INCREMENT NOT NULL,
        user_id BIGINT  NOT NULL,
        title VARCHAR(255) NOT NULL,
        body TEXT NOT NULL,
        added_at DATE NOT NULL,
        PRIMARY KEY (id)
    );");

    // $default_username = 'admin';
    // $default_fullname = 'Administrator';
    // $default_email = 'admin@me.net';
    // $default_password = md5($default_username.'admin'.$default_email.'s4lt$t61N9');
    // $statement = $db->prepare("INSERT INTO ".T_USERS."(username,password,email,fullname,privilege)VALUES(:u,:p,:e,:f,1)");
    // $statement->bindValue(':u',$default_username,PDO::PARAM_STR);
    // $statement->bindValue(':p',$default_password,PDO::PARAM_STR);
    // $statement->bindValue(':e',$default_email,PDO::PARAM_STR);
    // $statement->bindValue(':f',$default_fullname,PDO::PARAM_STR);
    // $statement->execute();
} catch (PDOException $e) {
    die($e->getMessage());
}
