<?php
session_start();
require 'connection.php';
if(!($_SESSION["username"]==true))
{
    header("location:login.php");
}
if($_SESSION['profile']!=="incomplete")
{
    die("No such page exist");

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>PROFILE</title>
	<link rel="stylesheet" type="text/css" href="styleit.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
<div class="wrap">
    <div>PROFILE</div>
    <p id="para"><?php
        echo "HELLO ".$_SESSION["username"]." ,";
        ?><br>
    You need to fill this page to access all FEATURES</p>
 	<form class="myform" action="profile.php" method="POST" enctype="multipart/form-data">
  <input class="inputvalue" id="mobile" type="tel" name="mobile" placeholder="Enter your phone number" required/><br>
  <input type="hidden"  name="username" value="<?php echo $name;?>">
  <input type="hidden"  name="metod" value="<?php echo $method;?>">
  <input class="inputvalue" type="text" id="add" name="address" placeholder="Your Address" required/><br>

<div style="font-size:16px; padding: 20px;
font-weight: normal">	
<div id="dateof">

  <input class="inputvalue" id="ini" type="text" name="occupation" placeholder="Occupation" required/><br>
  <input class="inputvalue" id="in" type="text" name="institute" placeholder="Your Institute/Organisation" required/><br>
</div>
</div>
<div id="pp">
<label for="uploa">CHOOSE A DISPLAY PICTURE</label>
<input class="upload" id="uploa" type="file" name="myFile" required /><br>
</div>
<textarea name="about" id="textarea" placeholder="Tell us something about you!"></textarea>
 <input name="submit" class="submitbutton" type="submit" value="SUBMIT" /><br>
	</form>
</div>
<?php

if(isset($_POST['submit']))
{
  if(empty($_POST['mobile'])||empty($_POST['address'])||empty($_POST['occupation'])||empty($_POST['institute'])||empty($_FILES['myFile'])||empty($_POST['about']))
  echo "<script>alert('Some input missing!!')</script>";
  else{
  $mobile= $_POST['mobile'];
  $address=$_POST['address'];
  $occupation=$_POST['occupation'];
  $institute=$_POST['institute'];
  $about=$_POST['about'];
  $myFile=$_FILES["myFile"];
  $username=$_SESSION['username'];
  $metod=$_SESSION['method'];
	$myFile_name=$_FILES["myFile"]['name'];
	$myFile_type=$_FILES["myFile"]["type"];
	$myFile_temploc=$_FILES["myFile"]["tmp_name"];
	$myFile_stor="profilepics/".$myFile_name;
	$ext=explode('.', $myFile_name);
    $actualExt=strtolower(end($ext));
    if($actualExt=='jpg'||$actualExt=='jpeg'||$actualExt=='gif'||$actualExt=='png'||$actualExt=='svg')
    {
        move_uploaded_file($myFile_temploc, $myFile_stor);
  $query="INSERT INTO yav_profile values('$username',$mobile,'$address','$myFile_stor','$occupation','$institute','$about')";
  echo "<script>console.log('".$query."')</script>";
  $query_run=$con->query($query);
 if( $query_run)
 header("location:http://localhost/php/landing.php");
 
 else
  echo "<script>alert('Try Again Later')</script>";
    }
    else
    echo "<script>alert('Check Extension of uploaded file')</script>";

  
}
}



?>