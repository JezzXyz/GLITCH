<?php
// comment.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $comment = $_POST["comment"];
  echo "<div>Comment: $comment</div>";
}
?>

<form method="POST" action="comment.php">
  Comment: <textarea name="comment"></textarea>
  <button type="submit">Post Comment</button>
</form>
