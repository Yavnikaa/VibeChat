<?php

  session_set_cookie_params(0);
  session_start();
  session_unset();
  session_destroy();

  setcookie("VibeChatSelector", "", time() - 3600, "/");
  setcookie("VibeChatValidator", "", time() - 3600, "/");

  header("Location: ./sign-in.php");
  exit();

?>