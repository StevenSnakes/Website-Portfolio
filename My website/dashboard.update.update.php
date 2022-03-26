<?php
include "config.php";

if($_POST['info'] == "users"){
  $sql = "UPDATE bs_users SET email = '".$_POST['email']."' WHERE id = '".$_POST['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }

  $sql = "UPDATE bs_profile SET email = '".$_POST['email']."' WHERE email = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_profile_comments SET comment_author = '".$_POST['email']."' WHERE comment_author = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_profile_comments SET comment_reserver = '".$_POST['email']."' WHERE comment_reserver = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_posts SET post_email = '".$_POST['email']."' WHERE post_email = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_forum_topics SET topic_user = '".$_POST['email']."' WHERE topic_user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_forum_replies SET reply_user = '".$_POST['email']."' WHERE reply_user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_forum_posts SET post_user = '".$_POST['email']."' WHERE post_user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_did_like SET user = '".$_POST['email']."' WHERE user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }

  header("location: dashboard.php?type=users");
}

if($_POST['info'] == "profilecomments"){
  $sql = "UPDATE bs_profile_comments SET comment_author = '".$_POST['commentauthor']."', comment = '".$_POST['comment']."' WHERE comment_id = '".$_POST['commentid']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=profilecomments");
}

if($_POST['info'] == "profile"){
  if(isset($_POST['admin'])){
    $admin = 1;
  } else {
    $admin = 0;
  }
  $sql = "UPDATE bs_profiles SET name = '".$_POST['name']."', email = '".$_POST['email']."', about_me = '".$_POST['aboutme']."', avatar = '".$_POST['avatar']."', admin = '".$admin."' WHERE id = '".$_POST['id']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }

  $sql = "UPDATE bs_users SET email = '".$_POST['email']."' WHERE email = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_profile_comments SET comment_author = '".$_POST['email']."' WHERE comment_author = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_profile_comments SET comment_reserver = '".$_POST['email']."' WHERE comment_reserver = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_posts SET post_email = '".$_POST['email']."' WHERE post_email = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_forum_topics SET topic_user = '".$_POST['email']."' WHERE topic_user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_forum_replies SET reply_user = '".$_POST['email']."' WHERE reply_user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_forum_posts SET post_user = '".$_POST['email']."' WHERE post_user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  $sql = "UPDATE bs_did_like SET user = '".$_POST['email']."' WHERE user = '".$_POST['emailupdate']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }

  header("location: dashboard.php?type=profile");
}

if($_POST['info'] == "posts"){
  $title = $_POST['posttitle'];
  $desc = $_POST['postbody'];
  $img = $_POST['postimg'];
  $currentDateTime = $_POST['postdate'];
  $tags = $_POST['posttags'];


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
    $sql = "UPDATE bs_posts SET post_json = '$l', post_email = '".$_POST['postemail']."' WHERE post_id = '".$_POST['postid']."'";
    if(!mysqli_query($conn, $sql)) {
      die("Database connection error " . mysqli_error($conn));
    }
  }
  header("location: dashboard.php?type=posts");
}

if($_POST['info'] == "forumtopics"){
  $sqlcat = "SELECT * FROM bs_forum_categories WHERE categories_name = '".$_POST['forumtopiccateories']."'";
  $category = mysqli_query($conn,$sqlcat);
  while($row = mysqli_fetch_array($category)){
    $cat[] = $row;
  }
  foreach($cat as $cat){
    $catid = $cat['categories_id'];
  }
  $sql = "UPDATE bs_forum_topics SET topic_subject = '".$_POST['forumtopicsubject']."', topic_categories = '".$catid."', topic_user = '".$_POST['forumtopicuser']."' WHERE topic_id = '".$_POST['forumtopicid']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumtopics");
}

if($_POST['info'] == "forumreplies"){
  $sql = "UPDATE bs_forum_replies SET reply_content = '".$_POST['replycontent']."', reply_user = '".$_POST['replyuser']."' WHERE reply_id = '".$_POST['replyid']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumreplies");
}

if($_POST['info'] == "forumposts"){
  $sql = "UPDATE bs_forum_posts SET post_content = '".$_POST['postcontent']."', post_user = '".$_POST['postuser']."' WHERE post_id = '".$_POST['postid']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumposts");
}

if($_POST['info'] == "forumcategories"){
  $sql = "UPDATE bs_forum_categories SET categories_name = '".$_POST['categoryname']."', categories_description = '".$_POST['categorydesc']."' WHERE categories_id = '".$_POST['categoriesid']."'";
  if(!mysqli_query($conn, $sql)) {
    die("Database connection error " . mysqli_error($conn));
  }
  header("location: dashboard.php?type=forumcategories");
}


?>
