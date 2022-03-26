<?php
include "config.php";
if($_GET['info'] == 'users'){
  $sql = "SELECT * FROM `bs_users` WHERE id = '".$_GET['id']."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $deleteinfo[] = $row;
  }
  foreach($deleteinfo as $deleteinfo){}
  $sql1 = "DELETE FROM `bs_users` WHERE email = '".$deleteinfo['email']."'";
  $sql2 = "DELETE FROM `bs_profile_comments` WHERE comment_author = '".$deleteinfo['email']."'";
  $sql3 = "DELETE FROM `bs_profile_comments` WHERE comment_reserver = '".$deleteinfo['email']."'";
  $sql4 = "DELETE FROM `bs_profiles` WHERE email = '".$deleteinfo['email']."'";
  $sql5 = "DELETE FROM `bs_posts` WHERE post_email = '".$deleteinfo['email']."'";
  $sql6 = "DELETE FROM `bs_forum_topics` WHERE topic_user = '".$deleteinfo['email']."'";
  $sql7 = "DELETE FROM `bs_forum_replies` WHERE reply_user = '".$deleteinfo['email']."'";
  $sql8 = "DELETE FROM `bs_forum_posts` WHERE post_user = '".$deleteinfo['email']."'";
  $sql9 = "DELETE FROM `bs_did_like` WHERE user = '".$deleteinfo['email']."'";

  if(!mysqli_query($conn, $sql1)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql2)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql3)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql4)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql5)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql6)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql7)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql8)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql9)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=users");}

if($_GET['info'] == 'profilecomments'){
  $sql = "SELECT * FROM `bs_profile_comments` WHERE comment_id = '".$_GET['id']."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $deleteinfo[] = $row;
  }
  if(isset($deleteinfo)){
    foreach($deleteinfo as $deleteinfo){}

    $sql2 = "SELECT * FROM `bs_profile_comments` WHERE comment_perent_id = '".$deleteinfo['comment_id']."'";
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($result2)){
      $deleteinfo2[] = $row2;
    }
    if(isset($deleteinfo2)){
      foreach($deleteinfo2 as $deleteinfo2){}

      $sql3 = "SELECT * FROM `bs_profile_comments` WHERE comment_perent_id = '".$deleteinfo2['comment_id']."'";
      $result3 = mysqli_query($conn, $sql3);
      while($row3 = mysqli_fetch_assoc($result3)){
        $deleteinfo3[] = $row3;
      }
      if(isset($deleteinfo3)){
        foreach($deleteinfo3 as $deleteinfo3){}

        $sql4 = "SELECT * FROM `bs_profile_comments` WHERE comment_perent_id = '".$deleteinfo3['comment_id']."'";
        $result4 = mysqli_query($conn, $sql4);
        while($row4 = mysqli_fetch_assoc($result4)){
          $deleteinfo4[] = $row4;
        }
        if(isset($deleteinfo4)){
          foreach($deleteinfo4 as $deleteinfo4){}
        }
      }
    }
  }
  $sql1 = "DELETE FROM `bs_profile_comments` WHERE comment_id = '".$deleteinfo['comment_id']."'";
  if(isset($deleteinfo2)){
    $sql2 = "DELETE FROM `bs_profile_comments` WHERE comment_id = '".$deleteinfo2['comment_id']."'";
  }
  if(isset($deleteinfo3)){
    $sql3 = "DELETE FROM `bs_profile_comments` WHERE comment_id = '".$deleteinfo3['comment_id']."'";
  }
  if(isset($deleteinfo4)){
    $sql4 = "DELETE FROM `bs_profile_comments` WHERE comment_id = '".$deleteinfo4['comment_id']."'";
  }

  if(!mysqli_query($conn, $sql1)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(isset($deleteinfo2)){
    if(!mysqli_query($conn, $sql2)) {
      die("Database connection error " . mysqli_error($conn));
    }
  }
  if(isset($deleteinfo3)){
    if(!mysqli_query($conn, $sql3)) {
      die("Database connection error " . mysqli_error($conn));
    }
  }
  if(isset($deleteinfo4)){
    if(!mysqli_query($conn, $sql4)) {
      die("Database connection error " . mysqli_error($conn));
    }
  }
  header("location: dashboard.php?type=profilecomments");
}

if($_GET['info'] == 'profile'){
  $sql = "SELECT * FROM `bs_profiles` WHERE id = '".$_GET['id']."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $deleteinfo[] = $row;
  }
  foreach($deleteinfo as $deleteinfo){}
  $sql1 = "DELETE FROM `bs_users` WHERE email = '".$deleteinfo['email']."'";
  $sql2 = "DELETE FROM `bs_profile_comments` WHERE comment_author = '".$deleteinfo['email']."'";
  $sql3 = "DELETE FROM `bs_profile_comments` WHERE comment_reserver = '".$deleteinfo['email']."'";
  $sql4 = "DELETE FROM `bs_profiles` WHERE email = '".$deleteinfo['email']."'";
  $sql5 = "DELETE FROM `bs_posts` WHERE post_email = '".$deleteinfo['email']."'";
  $sql6 = "DELETE FROM `bs_forum_topics` WHERE topic_user = '".$deleteinfo['email']."'";
  $sql7 = "DELETE FROM `bs_forum_replies` WHERE reply_user = '".$deleteinfo['email']."'";
  $sql8 = "DELETE FROM `bs_forum_posts` WHERE post_user = '".$deleteinfo['email']."'";
  $sql9 = "DELETE FROM `bs_did_like` WHERE user = '".$deleteinfo['email']."'";

  if(!mysqli_query($conn, $sql1)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql2)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql3)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql4)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql5)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql6)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql7)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql8)) {
    die("Database connection error " . mysqli_error($conn));
  }
  if(!mysqli_query($conn, $sql9)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=profile");
}

if($_GET['info'] == 'posts'){
  $sql = "DELETE FROM `bs_posts` WHERE post_id = '".$_GET['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=posts");
}

if($_GET['info'] == 'forumtopics'){
  $sql = "DELETE FROM `bs_forum_topics` WHERE topic_id = '".$_GET['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumtopics");
}

if($_GET['info'] == 'forumreplies'){
  $sql = "DELETE FROM `bs_forum_replies` WHERE reply_id = '".$_GET['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumreplies");
}

if($_GET['info'] == 'forumposts'){
  $sql = "DELETE FROM `bs_forum_posts` WHERE post_id = '".$_GET['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumposts");
}

if($_GET['info'] == 'forumcategories'){
  $sql = "DELETE FROM `bs_forum_categories` WHERE categories_id = '".$_GET['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumcategories");
}
?>
