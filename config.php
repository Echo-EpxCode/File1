<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS php_login";
mysqli_query($conn, $sql);

mysqli_select_db($conn, "php_login");

$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $table);
