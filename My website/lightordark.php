<?php
if($_GET['mode'] == "dark"){
  setcookie("lightvsdark", "dark", time() + (60*60*24*365*2));
} else {
  setcookie("lightvsdark", "light", time() + (60*60*24*365*2));
}
header("location: profile.php");
?>
