<?php
// user.php

session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    die("You must be logged in to view this page.");
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vulnerable_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data pengguna dari database
$user = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $username = $row['username'];
    $password = $row['password'];
} else {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - WebVuln</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <div class="user-info">
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Password:</strong> <?php echo $password; ?></p>
        </div>
        <div class="actions">
            <a href="edit_user.php" class="btn">Edit Profile</a>
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
    </div>
</body>
</html>
