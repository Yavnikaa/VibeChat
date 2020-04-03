<?php
  session_set_cookie_params(0);
  session_start();
  if(isset($_SESSION['userId'])) {
    header("Location: ./vibechat.html");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./styleit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>

  <body>
    <div class="form signup-form">
       <h2>sign up</h2>
       <?php
          if(isset($_GET['error'])) {
            $errorMessage = $_GET['error'];

            if($errorMessage == "emptyfields") {
              echo '<h3 class="error-message">Please fill all the fields.</h3>';
            }
            else if($errorMessage == "invalidemailandusername") {
              echo '<h3 class="error-message">Invalid Email-ID and Username.<br />Username can consist of digits,<br />alphabets and lodash.</h3>';
            }
            else if($errorMessage == "invalidemail") {
              echo '<h3 class="error-message">Invalid Email-ID.</h3>';
            }
            else if($errorMessage == "invalidusername") {
              echo '<h3 class="error-message">Invalid Username.<br />Username can consist of digits,<br />alphabets and lodash.</h3>';
            }
            else if($errorMessage == "invalidphone") {
              echo '<h3 class="error-message">Invalid phone number.</h3>';
            }
            else if($errorMessage == "invalidpassword") {
              echo '<h3 class="error-message">Invalid Password.<br />Password can consist of digits,<br />alphabets and lodash.</h3>';
            }
            else if($errorMessage == "passwordsdonotmatch") {
              echo '<h3 class="error-message">Password and Confirm Password <br />do not match.</h3>';
            }
            else if($errorMessage == "usernametaken") {
              echo '<h3 class="error-message">Username already taken.</h3>';
            }
            else if($errorMessage == "sqlerror") {
              echo '<h3 class="error-message">SQL Error.<br /></h3>';
            }
            else {
              echo '<h3 class="error-message">Unknown Error.</h3>';
            }
          }
          else if($_GET['signup'] == "success") {
            echo '<h3 class="success-message">Registered Successfully!</h3>';
          }
       ?>

<form action="./register-action.php" method="post" style="border:1px solid #ccc">
         <div class="input">
           <div class="inputBox">
             <label for="">Choose a username</label><div id="usernamecheck"></div>
             <input autocomplete="off" type="text" name="username" id="username" value="<?php if(isset($_GET['username'])) { echo($_GET['username']);} ?>" placeholder="Choose a username">
           </div>
           <div class="inputBox">
             <label for="">Enter your Email-ID</label>
             <input type="text" name="email" value="<?php if(isset($_GET['email'])) { echo($_GET['email']);} ?>" placeholder="Email">
           </div>
           <div class="inputBox">
             <label for="">Enter your phone number</label>
             <input type="number" name="phone" value="<?php if(isset($_GET['phone'])) { echo($_GET['phone']);} ?>" placeholder="Phone Number">
           </div>
           <div class="inputBox">
             <label for="">Sex</label>
             <select name="sex">
               <option value="f">Female</option>
               <option value="m">Male</option>
               <option value="o">Others</option>
             </select>
           </div>
           <div class="inputBox">
             <label for="">Choose a password</label>
             <input type="password" name="password" value="" placeholder="•••••••">
           </div>
           <div class="inputBox">
             <label for="">Re-enter password</label>
             <input type="password" name="rePassword" value="" placeholder="•••••••">
           </div>
           <div class="inputBox">
             <input type="submit" name="signup-submit" value="Sign Up">
           </div>
         </div>
       </form>
       <p class="instead">Already registered? <a href="./signin.php">Click Here</a></p>
     </div>


    <script type="text/javascript">
      $(document).ready(function() {
        $('#username').keyup(function() {
          var typedUsername = $('#username').val();
          if(typedUsername == "") {
            $('#usernameCheck').html('');
          }
          else {
            $('#usernameCheck').html('');
            $.ajax({
              url: "checkUser.php",
              type: "POST",
              data: {search: typedUsername},
              success: function(data) {
                $('#usernameCheck').html(data);
              }
            });
          }
        });
      });
    </script>
  </body>
</html>