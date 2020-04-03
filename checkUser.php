<?php
include "config.php";

$table = "yavnika_users";

$username = $_POST['search'];

$sql = "SELECT username from $table WHERE username = '$username'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0) {
  echo '<p class="error-message">Not Available</p>';
}
else {
  echo '<p class="success-message">Available</p>';
}

mysqli_close($con);
?>