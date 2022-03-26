<?php
session_start();

include 'config.php';

// $myemail = "steven.jacobsen@mbeddall.com";
// $mypassword = "Password123";

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$sql = "SELECT * FROM bs_users WHERE email= '".$email."' AND password='".md5($password)."' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$fe = $email;

if(trim($email)=='' || trim($password)==''){
  header("location: new.signin.php?msg=Fill In All Fields");
} else {
  if (mysqli_num_rows($result) == 1) {
  $_SESSION['email'] = $_POST['email'];
  $sql = "SELECT * FROM bs_profiles WHERE email = '".$email."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $ps[] = $row;
  }
  foreach($ps as $ps){
    $name = $ps['name'];
  }
  if($ps['admin'] == 1){
    $_SESSION['admin'] = "true";
  }
  if($name == ''){
    header("location: index.php?msg=Welcome Back <b>$email</b>");
  } else{
    header("location: index.php?msg=Welcome Back <b>$name</b>");
  }
} else{
  header("Location: new.signin.php?msg=Ether the email and password doesn't match or no existing account");
}
}
?>
