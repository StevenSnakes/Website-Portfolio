<?php
session_start();
include "config.php";


$currentDateTime = date('d M Y');

$title = $_GET['title'];
$desc = $_GET['body'];
$img = $_GET['img'];
$tags = $_GET['tags'];

$_SESSION['nptitle'] = $_GET['title'];
$_SESSION['npbody'] = $_GET['body'];
$_SESSION['npimg'] = $_GET['img'];
$_SESSION['nptag'] = $_GET['tags'];

if($title == '' || $desc == '' || $img == ''){
  if($title == ''){
    $ths = "Title, ";
  }else{
    $ths = "";
  }
  if($desc == ''){
    $dhs = "Body, ";
  }else{
    $dhs = "";
  }
  if($img == ''){
    $ihs = "IMG";
  }else{
    $ihs = "";
  }
  header("location: new.posts.php?error=Please Fill In $ths $dhs $ihs");
} else {
//check if the user is logged in
if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  }
if(isset($_SESSION['user_email_address'])){
  $email = $_SESSION['user_email_address'];
  }
} else {
  $author = "anonymous";
}

$desc = str_replace("\n", "<br>", $desc);
$desc = str_replace("\r", " ", $desc);
$desc = str_replace(array("{", "["), "(", $desc);
$desc = str_replace(array("}", "]"), ")", $desc);
$desc = str_replace('"', "'", $desc);

$desc = preg_replace("/[^a-zA-Z0-9_ ()£$!%&*-+@;<>?:,.']/s", "", $desc);

$json ='{"title":"' . $title . '", "body":"' . $desc . '", "img":"' . $img . '", "date":"' . $currentDateTime . '", "tags":"' . $tags . '"}';

$j[] = $json;

foreach($j as $l){
$l = mysqli_real_escape_string($conn, $l);
$sql = "INSERT INTO bs_posts (post_json, post_email) VALUES ('$l', '$email')";
if(!mysqli_query($conn, $sql)) {
  die("Database connection error " . mysqli_error($conn));
} else{
  echo "<script>window.close();</script>";
}
}
}
?>
