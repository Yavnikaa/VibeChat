<?php

 include "config.php";

  $table = "yav_messages";

  $sent_by = $_POST['sent_by'];
  $sent_to = $_POST['sent_to'];
  $message = $_POST['message'];

  if(empty($message)) {
    echo "<script>alert('Empty message.');</script>";
  }
  else if(empty($sent_by) || empty($sent_to)) {
    echo "<script>alert('Empty sent_by or sent_to');</script>";
  }
  else {
    $sql = "INSERT INTO $table (sent_by, sent_to, message) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      echo "<script>alert('SQL Error');</script>";
    }
    else {
      mysqli_stmt_bind_param($stmt, "sss", $sent_by, $sent_to, $message);
      mysqli_stmt_execute($stmt);
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($con);

?>