<?php
// comment.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $comment = $_POST["comment"];
  echo "<div class='comment-box'>Comment: $comment</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comment - WebVuln</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="comment-container">
    <h1>Post a Comment</h1>
    <form method="POST" action="comment.php">
      <textarea name="comment" placeholder="Enter your comment here..." required></textarea>
      <button type="submit">Post Comment</button>
    </form>
  </div>
</body>
</html>
