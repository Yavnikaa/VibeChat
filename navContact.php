<?php

 include "config.php";

  $user_table = "yavnika_users";

  $contactId = $_POST['contactId'];

  $sql = "SELECT username, image FROM $user_table WHERE id = $contactId";

  $result = $con->query($sql);

  if($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

      echo(
        "<div class='contact-image'>".

          '<img class="navContactImage" src="data:image;base64,'.$row['image'].'">'.

        "</div>".

        "<div class='contact-name'>".

          $row['username'].

        "</div>".

        "<div class='contact-status'>".

        "</div>"
      );
    }
  }

  mysqli_close($con);

  ?>