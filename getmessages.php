<?php

 include "config.php";

  session_set_cookie_params(0);
  session_start();
  $currentUserId = $_SESSION['userId'];

  $userId = $_POST['userId'];
  $contactId = $_POST['contactId'];

  if($currentUserId != $userId) {
    die("<script>alert('Session error');</script>");
  }

  $sql = "SELECT message, sent_when, sent_by, sent_to FROM yav_messages WHERE (sent_by = $userId AND sent_to = $contactId) OR (sent_by = $contactId AND sent_to = $userId)";

  $result = $con->query($sql);

  if($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

      $safeMessage = htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8');

      echo(
        "<div class=".($row['sent_by'] == $userId ?"'sent-message'>":"'recieved-message'>").

          "<div class='message-box'>".

          $safeMessage.

          "</div>".

          "<div class='timestamp'>".

            $row['sent_when'].

          "</div>".

        "</div>"

      );
    }
  }


?>