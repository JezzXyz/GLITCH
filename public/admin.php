<?php
// admin.php

session_start();

if ($_SESSION["admin"] != "true") {
  die("Access denied!");
}

echo "<div class='admin-welcome'>Welcome Admin!</div>";
?>

<a href="logout.php" class="logout-btn">Logout</a>
