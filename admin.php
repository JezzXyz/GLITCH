<?php
// admin.php

session_start();

if ($_SESSION["admin"] != "true") {
  die("Access denied!");
}

echo "Welcome Admin!";
?>

<a href="logout.php">Logout</a>
