<?php
  include "config.php";
  session_set_cookie_params(0);
  session_start();
  if(!isset($_SESSION[userId])) {
    header("Location: ./signin.php");
    exit();
  }
  $username = $_SESSION['username'];
  if(isset($_POST['profile-submit'])) {
    
      $table = "yavnika_users";

      $email = $_POST['email'];
      $sex = $_POST['sex'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $phone = $_POST['phone'];

      if(empty($email) || empty($sex) || empty($fname) || empty($lname) || empty($phone)) {
        header("Location: ./profile.php?error=emptyfields");
        exit();
      }


      if(getimagesize($_FILES['image']['tmp_name']) == FALSE) {
        $name = addslashes($_FILES['image']['name']);
        $image = base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));

        $sql = "UPDATE $table
        SET
          email = '$email',
          phone = '$phone',
          sex = '$sex',
          fname = '$fname',
          lname = '$lname'
        WHERE username = '$username'
        ";

        if($con->query($sql) === TRUE) {
          header("Location: ./vibechat.html");
          exit();
        }
        else {
          header("Location: ./profile.php?error=sqlerror");
          exit();

        }
      } else {
        $name = addslashes($_FILES['image']['name']);
        $image = base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));

        $sql = "UPDATE $table
        SET
          email = '$email',
          phone = '$phone',
          sex = '$sex',
          photo_name = '$name',
          image = '$image',
          fname = '$fname',
          lname = '$lname'
        WHERE username = '$username'
        ";

        if($con->query($sql) === TRUE) {
          header("Location: ./vibechat.html");
          exit();
        }
        else {
          header("Location: ./profile.php?error=sqlerror");
          exit();
        }

      }


    $con->close();

  } else {
    header("Location: ./profile.php");
    exit();
  }
?>