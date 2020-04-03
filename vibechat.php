<?php
  session_set_cookie_params(0);
  session_start();
  if(isset($_SESSION['userId'])) {
    header("Location: ./display.php");
    exit();
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>IMG Assignment-PHP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='vibechat.css'>
</head>

<body>
    
    <div class="nav-bar"> 
        <img class="nav-bar-icon" src="" alt="logo"></img>
        <div class="nav-bar-text"> VibeChat</div>
    </div>

<div class="main">
   
    <div class="button-wrapper"> 
    <p> Already an existing user? </p> 
    <button class="site-button">Log-in</button>
    </div>
    <div class="button-wrapper"> 
    <p> New to the community? </p> 
    <a href="signup.php"><div class="site-button">Sign-up</a></div>
    </div>

</div>
</body>
</html>
