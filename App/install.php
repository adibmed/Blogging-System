<?php
require_once "Config/database.php";
$db = new PDO("mysql:host=" . DB_HOST . ";charset=utf8", DB_USER, DB_PASS);
$db->setAttribute(PDO::ERRMODE_EXCEPTION, TRUE);
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
$db->exec($sql);
try {
    $db->__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
} catch (PDOException $e) {
    die($e->getMessage());
}
try {

    $db->exec("CREATE TABLE " . T_POSTS . "(
        id BIGINT AUTO_INCREMENT NOT NULL,
        user_id BIGINT  NOT NULL,
        title VARCHAR(255) NOT NULL,
        body TEXT NOT NULL,
        added_at DATE NOT NULL,
        PRIMARY KEY (id)
    );");
} catch (PDOException $e) {
    die($e->getMessage());
}
