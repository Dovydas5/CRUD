<?php
$servername = "app_mysqli";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>