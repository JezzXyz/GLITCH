<?php
// login.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vulnerable_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  
  // Rentan terhadap SQL Injection
  $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "Login successful!";
  } else {
    echo "Invalid credentials!";
  }
}
?>

<form method="POST" action="login.php">
  Username: <input type="text" name="username">
  Password: <input type="password" name="password">
  <button type="submit">Login</button>
</form>
