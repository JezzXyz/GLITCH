<?php
// edit_user.php

session_start();

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

$user = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $current_username = $row['username'];
    $current_password = $row['password'];
} else {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update username dan password
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    $update_sql = "UPDATE users SET username='$new_username', password='$new_password' WHERE id='$user_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<div class='success'>Profile updated successfully!</div>";
        $_SESSION['username'] = $new_username;  // Update session username
    } else {
        echo "<div class='error'>Error updating profile: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - WebVuln</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form method="POST" action="edit_user.php">
            <label for="username">New Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $current_username; ?>" required>
            
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $current_password; ?>" required>
            
            <button type="submit">Update Profile</button>
        </form>
        <a href="user.php" class="btn">Back to Profile</a>
    </div>
</body>
</html>
