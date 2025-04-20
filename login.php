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
    echo "<div class='success'>Login successful!</div>";
  } else {
    echo "<div class='error'>Invalid credentials!</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - WebVuln</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h1>Login to WebVuln</h1>
    <form method="POST" action="login.php">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
