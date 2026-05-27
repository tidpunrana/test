<?php

// Hardcoded credentials
$db_user = "admin";
$db_pass = "123456";

// Weak hash
$password = "mypassword";
$hash = md5($password);

echo "MD5 Hash: " . $hash . "<br>";

// SQL Injection
$conn = mysqli_connect("localhost", "root", "root", "test");

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo $row['username'];
}

// Cross Site Scripting (XSS)
$name = $_GET['name'];

echo "<h1>Welcome " . $name . "</h1>";

// Command Injection
$ping = $_GET['ping'];

system("ping -c 1 " . $ping);

// Dangerous eval
$code = $_GET['code'];

eval($code);

// Debug information leakage
phpinfo();

// Weak random
$token = rand(1000,9999);

echo "Token: " . $token;

// File inclusion vulnerability
$page = $_GET['page'];

include($page . ".php");

?>