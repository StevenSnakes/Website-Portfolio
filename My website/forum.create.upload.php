<?php
session_start();
include "config.php";

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}
if(isset($_SESSION['user_email_address'])){
  $email = $_SESSION['user_email_address'];
}

if($_GET['create'] == "topic"){
  if(isset($_POST['topiccategory'])){
  $title = $_POST['topictitle'];
  $date = date('Y-m-d H:i:s');
  $categorycheck = $_POST['topiccategory'];
  $content = $_POST['topicmainpost'];

  $sqlwe = "SELECT * FROM bs_forum_categories WHERE categories_name = '$categorycheck'";
  $resultwe = mysqli_query($conn, $sqlwe);
  while($rowwe = mysqli_fetch_assoc($resultwe)){
    $catcheck[] = $rowwe;
  }
  foreach($catcheck as $catcheck){
    $category = $catcheck['categories_id'];
  }

  $sql = "INSERT INTO bs_forum_topics (topic_subject, topic_date, topic_categories, topic_user) VALUES ('$title', '$date', '$category', '$email')";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sqltopicpost = "SELECT * FROM bs_forum_topics WHERE topic_subject = '$title' AND topic_date = '$date' AND topic_categories = '$category' AND topic_user = '$email'";
  $resulttopicpost = mysqli_query($conn, $sqltopicpost);
  while($rowtopicpost = mysqli_fetch_assoc($resulttopicpost)){
    $topicpost[] = $rowtopicpost;
  }
  foreach($topicpost as $topicpost){
    $topicposts = $topicpost['topic_id'];
  }

  $sql2 = "INSERT INTO bs_forum_posts (post_content, post_date, post_topic, post_user) VALUES ('$content', '$date', '$topicposts', '$email')";
  if(!mysqli_query($conn, $sql2)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: forum.php?forum=$categorycheck");
} else {
  header("location: forum.create.php?create=top&error=Please Select A Category");
}
}
if($_GET['create'] == "category"){
  $name = $_GET['categoryname'];
  $desc = $_GET['categorydesc'];
  $sql = "INSERT INTO bs_forum_categories (categories_name, categories_description) VALUES ('$name', '$desc')";
  if(!mysqli_query($conn, $sql)) {
  }
  header("location: forum.php");
}

if($_GET['create'] == "comment"){
  $sql = "SELECT * FROM bs_forum_topics WHERE topic_id = '".$_POST['topic']."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $checking[] = $row;
  }
  foreach($checking as $checking){
    $topiccheck = $checking['topic_id'];
    $topiccheck2 = $checking['topic_subject'];
  }

  $content = $_POST['comment'];
  $date = date('Y-m-d H:i:s');

  $sqlcomment = "INSERT INTO bs_forum_replies (reply_content, reply_date, reply_topic, reply_user) VALUES ('$content', '$date', '$topiccheck', '$email')";
  if(!mysqli_query($conn, $sqlcomment)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $forumtopics = $_POST['forumtopic'];
  header("location: forum.php?forumopen=$topiccheck2&forumtopic=$forumtopics");
}

if($_GET['create'] == "update"){
  if(isset($_POST['oldcommentreply'])){
    $comment = $_POST['commentreply'];
    $sql = "UPDATE bs_forum_replies SET reply_content = '$comment' WHERE reply_id = '".$_POST['oldcommentreply']."'";
    if(!mysqli_query($conn, $sql)) {
      die("Database connection error " . mysqli_error($conn));
    }
    $goback = $_POST['goback'];
    $forumtopics = $_POST['forumtopic'];
    header("location: forum.php?forumopen=$goback&forumtopic=$forumtopics");
  }
  if(isset($_POST['oldcomment'])){
    $comment = $_POST['comment'];
    $sql = "UPDATE bs_forum_posts SET post_content = '$comment' WHERE post_topic = '".$_POST['oldcomment']."'";
    if(!mysqli_query($conn, $sql)) {
      die("Database connection error " . mysqli_error($conn));
    }
    $goback = $_POST['goback'];
    $forumtopics = $_POST['forumtopic'];
    header("location: forum.php?forumopen=$goback&forumtopic=$forumtopics");
  }
}
?>
