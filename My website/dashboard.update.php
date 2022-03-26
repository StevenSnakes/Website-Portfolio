<?php session_start(); ?>
<?php
// if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){
//   header("location: new.signin.php?msg=Login First");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editing Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- JS -->
    <script type="text/javascript">
    $(function(){
        $(".btn-toggle-menu").click(function() {
            $("#wrapper").toggleClass("toggled");
        });
    })

    </script>
</head>

<body>
  <!-- Header -->
  <?php include "header.php" ?>

  <!-- Main Content -->
  <?php
  include "config.php";
  ?>

  <?php
  if($_GET['info'] == 'users'){
    $sql = "SELECT * FROM bs_users WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  if($_GET['info'] == 'profilecomments'){
    $sql = "SELECT * FROM bs_profile_comments WHERE comment_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  if($_GET['info'] == 'profile'){
    $sql = "SELECT * FROM bs_profiles WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  if($_GET['info'] == 'posts'){
    $sql = "SELECT * FROM bs_posts WHERE post_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){
      $k = $updateinfo['post_json'];
      $k = json_decode($k, true);
    }
  }
  if($_GET['info'] == 'forumtopics'){
    $sql = "SELECT * FROM bs_forum_topics WHERE topic_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  if($_GET['info'] == 'forumreplies'){
    $sql = "SELECT * FROM bs_forum_replies WHERE reply_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  if($_GET['info'] == 'forumposts'){
    $sql = "SELECT * FROM bs_forum_posts WHERE post_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  if($_GET['info'] == 'forumcategories'){
    $sql = "SELECT * FROM bs_forum_categories WHERE categories_id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $updateinfo[] = $row;
    }
    foreach($updateinfo as $updateinfo){}
  }
  ?>

  <div class="blog-single gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <?php if($_GET['info'] == 'users'){ ?>
                <center><h1>Admin Edit Users</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'profilecomment'){ ?>
                <center><h1>Admin Edit Profile Comment</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'profile'){ ?>
                <center><h1>Admin Edit Profiles</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'posts'){ ?>
                <center><h1>Admin Edit Posts</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'forumtopics'){ ?>
                <center><h1>Admin Edit Forum Topics</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'forumreplies'){ ?>
                <center><h1>Admin Edit Forum Replies</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'forumposts'){ ?>
                <center><h1>Admin Edit Forum Posts</h1></center>
              <?php } ?>
              <?php if($_GET['info'] == 'forumcategories'){ ?>
                <center><h1>Admin Edit Forum Category</h1></center>
              <?php } ?>
                <form type="submit" method="post" action="dashboard.update.update.php" enctype=”multipart/form-data”>
                  <?php if($_GET['info'] == 'users'){ ?>
                    <div class="form-group">
                      <label for="title">User ID</label>
                      <input value="<?php echo $updateinfo['id'] ?>" type="text" class="form-control" name="idn" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">User Email</label>
                      <input value="<?php echo $updateinfo['email'] ?>" type="text" class="form-control" name="email" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">User Password</label>
                      <input placeholder="Can't View" type="text" class="form-control" name="title" disabled></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['id'] ?>" type="hidden" class="form-control" name="id"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'profilecomments'){ ?>
                    <div class="form-group">
                      <label for="title">Comment ID</label>
                      <input value="<?php echo $updateinfo['comment_id'] ?>" type="text" class="form-control" name="commentid" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment Author</label>
                      <input value="<?php echo $updateinfo['comment_author'] ?>" type="text" class="form-control" name="commentauthor" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment</label>
                      <input value="<?php echo $updateinfo['comment'] ?>" type="text" class="form-control" name="comment" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment Date</label>
                      <input value="<?php echo $updateinfo['comment_date'] ?>" type="text" class="form-control" name="commentdate" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment Reserver</label>
                      <input value="<?php echo $updateinfo['comment_reserver'] ?>" type="text" class="form-control" name="commentreserver" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment Likes</label>
                      <input value="<?php echo $updateinfo['comment_likes'] ?>" type="text" class="form-control" name="commentlikes" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment Perent</label>
                      <input value="<?php echo $updateinfo['comment_perent_id'] ?>" type="text" class="form-control" name="commentperent" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Comment Sub Reply</label>
                      <input value="<?php echo $updateinfo['comment_sub_reply'] ?>" type="text" class="form-control" name="commentsubreply" disabled></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['comment_id'] ?>" type="hidden" class="form-control" name="commentid"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'profile'){ ?>
                    <div class="form-group">
                      <label for="title">ID</label>
                      <input value="<?php echo $updateinfo['id'] ?>" type="text" class="form-control" name="id" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Name</label>
                      <input value="<?php echo $updateinfo['name'] ?>" type="text" class="form-control" name="name"></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Email</label>
                      <input value="<?php echo $updateinfo['email'] ?>" type="text" class="form-control" name="email" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">About Me</label>
                      <input value="<?php echo $updateinfo['about_me'] ?>" type="text" class="form-control" name="aboutme"></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Avatar</label>
                      <input value="<?php echo $updateinfo['avatar'] ?>" type="text" class="form-control" name="avatar"></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Admin</label>
                      <input type="checkbox"  name="admin" <?php if($updateinfo['admin'] == 1){ echo "checked"; } ?>></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['id'] ?>" type="hidden" class="form-control" name="id"></input>
                    <input value="<?php echo $updateinfo['email'] ?>" type="hidden" class="form-control" name="emailupdate"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'posts'){ ?>
                    <div class="form-group">
                      <label for="title">Post ID</label>
                      <input value="<?php echo $updateinfo['post_id'] ?>" type="text" class="form-control" name="postid" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Post Title</label>
                      <input value="<?php echo $k['title'] ?>" type="text" class="form-control" name="posttitle" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Post Body</label>
                      <textarea type="text" class="form-control" name="postbody" required><?php echo $k['body'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="title">Post Image</label>
                      <input value="<?php echo $k['img'] ?>" type="text" class="form-control" name="postimg" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Post Date</label>
                      <input value="<?php echo $k['date'] ?>" type="text" class="form-control" name="postdate" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Post Tags</label>
                      <input value="<?php echo $k['tags'] ?>" type="text" class="form-control" name="posttags"></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Post Email</label>
                      <input value="<?php echo $updateinfo['post_email'] ?>" type="text" class="form-control" name="postemail" required></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['post_id'] ?>" type="hidden" class="form-control" name="postid"></input>
                    <input value="<?php echo $k['date'] ?>" type="hidden" class="form-control" name="postdate"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'forumtopics'){ ?>
                    <div class="form-group">
                      <label for="title">Forum Topic ID</label>
                      <input value="<?php echo $updateinfo['topic_id'] ?>" type="text" class="form-control" name="forumtopicid" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Topic Subject</label>
                      <input value="<?php echo $updateinfo['topic_subject'] ?>" type="text" class="form-control" name="forumtopicsubject" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Topic Date</label>
                      <input value="<?php echo $updateinfo['topic_date'] ?>" type="text" class="form-control" name="forumtopicdate" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Topic Category</label>
                      <select class="form-control" name="forumtopiccateories">
                        <?php
                        $sqlcatstart = "SELECT * FROM bs_forum_categories WHERE categories_id = '".$updateinfo['topic_categories']."'";
                        $categorystart = mysqli_query($conn, $sqlcatstart);
                        while($rowstart = mysqli_fetch_array($categorystart)){
                          $catstart[] = $rowstart;
                        }
                        foreach($catstart as $catstart){}
                        ?>
                        <option selected required><?php echo $catstart['categories_name'] ?></option>
                        <?php $sqlcat = "SELECT * FROM bs_forum_categories WHERE categories_id != '".$updateinfo['topic_categories']."'";
                        $category = mysqli_query($conn,$sqlcat);
                        while($row = mysqli_fetch_array($category)){
                          $cat[] = $row;
                        }
                        foreach($cat as $cat){
                          echo $cat['categories_name'] . "<br>"; ?>
                          <option value="<?php echo $cat['categories_name']; ?>"><?php echo $cat['categories_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Topic User</label>
                      <input value="<?php echo $updateinfo['topic_user'] ?>" type="text" class="form-control" name="forumtopicuser" required></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['topic_id'] ?>" type="hidden" class="form-control" name="forumtopicid"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'forumreplies'){ ?>
                    <div class="form-group">
                      <label for="title">Forum Reply ID</label>
                      <input value="<?php echo $updateinfo['reply_id'] ?>" type="text" class="form-control" name="replyid" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Reply Content</label>
                      <input value="<?php echo $updateinfo['reply_content'] ?>" type="text" class="form-control" name="replycontent" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Reply Date</label>
                      <input value="<?php echo $updateinfo['reply_date'] ?>" type="text" class="form-control" name="replydate" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Reply Topic</label>
                      <input value="<?php echo $updateinfo['reply_topic'] ?>" type="text" class="form-control" name="replytopic" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Reply User</label>
                      <input value="<?php echo $updateinfo['reply_user'] ?>" type="text" class="form-control" name="replyuser" required></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['reply_id'] ?>" type="hidden" class="form-control" name="replyid"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'forumposts'){ ?>
                    <div class="form-group">
                      <label for="title">Forum Post ID</label>
                      <input value="<?php echo $updateinfo['post_id'] ?>" type="text" class="form-control" name="postid" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Post Content</label>
                      <input value="<?php echo $updateinfo['post_content'] ?>" type="text" class="form-control" name="postcontent" required></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Post Date</label>
                      <input value="<?php echo $updateinfo['post_date'] ?>" type="text" class="form-control" name="postdate" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Post Topic</label>
                      <input value="<?php echo $updateinfo['post_topic'] ?>" type="text" class="form-control" name="posttopic" disabled></input>
                    </div>
                    <div class="form-group">
                      <label for="title">Forum Post User</label>
                      <input value="<?php echo $updateinfo['post_user'] ?>" type="text" class="form-control" name="postuser" required></input>
                    </div>
                    <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                    <input value="<?php echo $updateinfo['post_id'] ?>" type="hidden" class="form-control" name="postid"></input>
                  <?php } ?>

                  <?php if($_GET['info'] == 'forumcategories'){ ?>
                    <div class="form-group">
                    <label for="title">Forum Category ID</label>
                    <input value="<?php echo $updateinfo['categories_id'] ?>" type="text" class="form-control" name="categoriesid" disabled></input>
                  </div>
                  <div class="form-group">
                    <label for="title">Forum Category Name</label>
                    <input value="<?php echo $updateinfo['categories_name'] ?>" type="text" class="form-control" name="categoryname" required></input>
                  </div>
                  <div class="form-group">
                    <label for="title">Forum Category Description</label>
                    <input value="<?php echo $updateinfo['categories_description'] ?>" type="text" class="form-control" name="categorydesc" required></input>
                  </div>
                  <input value="<?php echo $_GET['info'] ?>" type="hidden" class="form-control" name="info"></input>
                  <input value="<?php echo $updateinfo['categories_id'] ?>" type="hidden" class="form-control" name="categoriesid"></input>
                  <?php } ?>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                  	<a href="dashboard.php?type=<?php echo $_GET['info'] ?>" ><button type="button" class="btn btn-default">Cancel</button></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- End Main -->

  <?php include "footer.php" ?>

</body>
</html>
