<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

  <!-- JS -->
  <script type="text/javascript" src="js/jquery.js"></script>

  <script type="text/javascript">
  $(function(){
      $(".btn-toggle-menu").click(function() {
          $("#wrapper").toggleClass("toggled");
      });
  })

  </script>
</head>
  <style>
  :root {
    --bs-blue: #0d6efd;
    --bs-indigo: #6610f2;
    --bs-purple: #6f42c1;
    --bs-pink: #d63384;
    --bs-red: #dc3545;
    --bs-orange: #fd7e14;
    --bs-yellow: #ffc107;
    --bs-green: #198754;
    --bs-teal: #20c997;
    --bs-cyan: #0dcaf0;
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-gray-dark: #343a40;
    --bs-gray-100: #f8f9fa;
    --bs-gray-200: #e9ecef;
    --bs-gray-300: #dee2e6;
    --bs-gray-400: #ced4da;
    --bs-gray-500: #adb5bd;
    --bs-gray-600: #6c757d;
    --bs-gray-700: #495057;
    --bs-gray-800: #343a40;
    --bs-gray-900: #212529;
    --bs-primary: #0d6efd;
    --bs-secondary: #6c757d;
    --bs-success: #198754;
    --bs-info: #0dcaf0;
    --bs-warning: #ffc107;
    --bs-danger: #dc3545;
    --bs-light: #f8f9fa;
    --bs-dark: #212529;
    --bs-primary-rgb: 13, 110, 253;
    --bs-secondary-rgb: 108, 117, 125;
    --bs-success-rgb: 25, 135, 84;
    --bs-info-rgb: 13, 202, 240;
    --bs-warning-rgb: 255, 193, 7;
    --bs-danger-rgb: 220, 53, 69;
    --bs-light-rgb: 248, 249, 250;
    --bs-dark-rgb: 33, 37, 41;
    --bs-white-rgb: 255, 255, 255;
    --bs-black-rgb: 0, 0, 0;
    --bs-body-color-rgb: 33, 37, 41;
    --bs-body-bg-rgb: 255, 255, 255;
    --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
    --bs-body-font-family: var(--bs-font-sans-serif);
    --bs-body-font-size: 1rem;
    --bs-body-font-weight: 400;
    --bs-body-line-height: 1.5;
    --bs-body-color: #212529;
    --bs-body-bg: #fff;
  }
  body {
    margin: 0;
    font-family: var(--bs-body-font-family);
    font-size: var(--bs-body-font-size);
    font-weight: var(--bs-body-font-weight);
    line-height: var(--bs-body-line-height);
    color: var(--bs-body-color);
    text-align: var(--bs-body-text-align);
    background-color: var(--bs-body-bg);
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  }
  #layoutSidenav {
    display: flex;
  }
  #layoutSidenav #layoutSidenav_content {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-width: 0;
    flex-grow: 1;
    min-height: calc(100vh - 56px);
  }
  .nav .nav-link .sb-nav-link-icon,
  .sb-sidenav-menu .nav-link .sb-nav-link-icon,
  .sb-sidenav-menu .nav-link2 .sb-nav-link-icon {
    margin-right: 0.5rem;
  }
  .sb-sidenav {
    display: flex;
    flex-direction: column;
    height: 100%;
    flex-wrap: nowrap;
  }
  .sb-sidenav .sb-sidenav-menu .nav {
    flex-direction: column;
    flex-wrap: nowrap;
  }
  .sb-sidenav .sb-sidenav-menu .nav .sb-sidenav-menu-heading {
    padding: 1.75rem 1rem 0.75rem;
    font-size: 0.75rem;
    font-weight: bold;
    text-transform: uppercase;
  }
  .sb-sidenav .sb-sidenav-menu .nav .nav-link,
  .sb-sidenav .sb-sidenav-menu .nav .nav-link2 {
    display: flex;
    align-items: center;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    position: relative;
  }
  .sb-sidenav-dark {
    background-color: #343a40;
    color: rgba(255, 255, 255, 0.5);
  }
  .sb-sidenav-dark .sb-sidenav-menu .nav-link {
    background-color: #343a40;
    color: rgba(255, 255, 255, 0.5);
  }
  .sb-sidenav-dark .sb-sidenav-menu .nav-link2 {
    background-color: #6c757d;
    color: rgba(255, 255, 255, 0.5);
  }
  .sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
    background-color: #6c757d;
  }
  </style>
      <?php include "config.php"; ?>
      <?php include "header.php"; ?>
      <body>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin Dashboard</div>
                            <?php if($_GET['type'] != "users"){ ?>
                            <a class="nav-link" href="dashboard.php?type=users">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                            <?php if($_GET['type'] != "profile"){ ?>
                            <a class="nav-link" href="dashboard.php?type=profile">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                                Profiles
                            </a>
                            <?php if($_GET['type'] != "profilecomments"){ ?>
                            <a class="nav-link" href="dashboard.php?type=profilecomments">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Profile Comments
                            </a>
                            <?php if($_GET['type'] != "posts"){ ?>
                            <a class="nav-link" href="dashboard.php?type=posts">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                Posts
                            </a>
                            <?php if($_GET['type'] != "forumcategories"){ ?>
                            <a class="nav-link" href="dashboard.php?type=forumcategories">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Forum Categories
                            </a>
                            <?php if($_GET['type'] != "forumtopics"){ ?>
                            <a class="nav-link" href="dashboard.php?type=forumtopics">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Forum Topics
                            </a>
                            <?php if($_GET['type'] != "forumposts"){ ?>
                            <a class="nav-link" href="dashboard.php?type=forumposts">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Forum Posts
                            </a>
                            <?php if($_GET['type'] != "forumreplies"){ ?>
                            <a class="nav-link" href="dashboard.php?type=forumreplies">
                            <?php } else { ?>
                              <a class="nav-link nav-link2" href="">
                            <?php } ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Forum Replies
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="gray-bg" id="layoutSidenav_content">
              <main>
                <div>
                  <div class="container">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="row align-items-start">
                          <div class="col-lg-12 m-15px-tb blog-dashboard2">
                            <?php if(isset($_GET['type'])){
                              if($_GET['type'] == "users"){
                              $sqlusersfull = "SELECT * FROM bs_users ORDER BY id DESC";
                              $resultusersfull = mysqli_query($conn, $sqlusersfull);
                              while($rowusersfull = mysqli_fetch_assoc($resultusersfull)){
                                $usersfull[] = $rowusersfull;
                              }
                              foreach($usersfull as $usersfull){?>
                              <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <center><a href="dashboard.update.php?id=<?php echo $usersfull['id']; ?>&info=users" class="dropdown-item">Edit</a></center>
                                <center><a href="dashboard.delete.php?id=<?php echo $usersfull['id']; ?>&info=users" class="dropdown-item">Delete</a></center>
                              </div>
                              <div class="widget-body">
                                ID: <?php echo $usersfull['id']; ?> <br>
                                Email: <?php echo $usersfull['email']; ?> <br>
                                PW: Can't See This Information <br>
                              </div>
                              <?php } } ?>
                              <?php if($_GET['type'] == "profilecomments"){
                              $sqlprofilecommentfull = "SELECT * FROM bs_profile_comments ORDER BY comment_id DESC";
                              $resultprofilecommentfull = mysqli_query($conn, $sqlprofilecommentfull);
                              while($rowprofilecommentfull = mysqli_fetch_assoc($resultprofilecommentfull)){
                                $profilecommentfull[] = $rowprofilecommentfull;
                              }
                              foreach($profilecommentfull as $profilecommentfull){?>
                              <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <center><a href="dashboard.update.php?id=<?php echo $profilecommentfull['comment_id']; ?>&info=profilecomments" class="dropdown-item">Edit</a></center>
                                <center><a href="dashboard.delete.php?id=<?php echo $profilecommentfull['comment_id']; ?>&info=profilecomments" class="dropdown-item">Delete</a></center>
                              </div>
                              <div class="widget-body">
                                Comment ID: <?php echo $profilecommentfull['comment_id']; ?> <br>
                                Comment Author: <?php echo $profilecommentfull['comment_author']; ?> <br>
                                Comment: <?php echo $profilecommentfull['comment']; ?> <br>
                                Comment Date: <?php echo $profilecommentfull['comment_date']; ?> <br>
                                Comment Reserver: <?php echo $profilecommentfull['comment_reserver']; ?> <br>
                                comment Likes: <?php echo $profilecommentfull['comment_likes']; ?> <br>
                                Comment Perent ID: <?php echo $profilecommentfull['comment_perent_id']; ?> <br>
                                Comment Sub Reply: <?php echo $profilecommentfull['comment_sub_reply']; ?> <br>
                              </div>
                              <?php } } ?>
                              <?php if($_GET['type'] == "profile"){
                                $sqlprofiles = "SELECT * FROM bs_profiles ORDER BY id DESC";
                                $resultprofiles = mysqli_query($conn, $sqlprofiles);
                                while($rowprofiles = mysqli_fetch_assoc($resultprofiles)){
                                  $profiles[] = $rowprofiles;
                                }
                                foreach($profiles as $profiles){?>
                                <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <center><a href="dashboard.update.php?id=<?php echo $profiles['id']; ?>&info=profile" class="dropdown-item">Edit</a></center>
                                  <center><a href="dashboard.delete.php?id=<?php echo $profiles['id']; ?>&info=profile" class="dropdown-item">Delete</a></center>
                                </div>
                                <div class="widget-body">
                                  ID: <?php echo $profiles['id']; ?> <br>
                                  Name: <?php echo $profiles['name']; ?> <br>
                                  Email: <?php echo $profiles['email']; ?> <br>
                                  About Me: <?php echo $profiles['about_me']; ?> <br>
                                  Avatar: <?php echo $profiles['avatar']; ?> <br>
                                  Admin: <?php echo $profiles['admin']; ?> <br>
                                </div>
                              <?php } }?>
                              <?php if($_GET['type'] == "posts"){
                                $sqlposts = "SELECT * FROM bs_posts ORDER BY post_id DESC";
                                $resultposts = mysqli_query($conn, $sqlposts);
                                while($rowposts = mysqli_fetch_assoc($resultposts)){
                                  $posts[] = $rowposts;
                                }
                                foreach($posts as $posts){?>
                                <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <center><a href="dashboard.update.php?id=<?php echo $posts['post_id']; ?>&info=posts" class="dropdown-item">Edit</a></center>
                                  <center><a href="dashboard.delete.php?id=<?php echo $posts['post_id']; ?>&info=posts" class="dropdown-item">Delete</a></center>
                                </div>
                                <div class="widget-body">
                                  <?php $k = $posts['post_json'];
                                  $k = json_decode($k, true); ?>
                                  Post ID: <?php echo $posts['post_id']; ?> <br>
                                  Post Title: <?php echo $k['title']; ?> <br>
                                  Post Body: <?php echo $k['body']; ?> <br>
                                  Post IMG: <?php echo $k['img']; ?> <br>
                                  Post Date: <?php echo $k['date']; ?> <br>
                                  Post Tags: <?php echo $k['tags']; ?> <br>
                                  Post Email: <?php echo $posts['post_email']; ?> <br>
                                </div>
                              <?php } }?>
                              <?php if($_GET['type'] == "forumtopics"){
                                $sqlforumtopics = "SELECT * FROM bs_forum_topics ORDER BY topic_id DESC";
                                $resultforumtopics = mysqli_query($conn, $sqlforumtopics);
                                while($rowforumtopics = mysqli_fetch_assoc($resultforumtopics)){
                                  $forumtopics[] = $rowforumtopics;
                                }
                                foreach($forumtopics as $forumtopics){?>
                                <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <center><a href="dashboard.update.php?id=<?php echo $forumtopics['topic_id']; ?>&info=forumtopics" class="dropdown-item">Edit</a></center>
                                  <center><a href="dashboard.delete.php?id=<?php echo $forumtopics['topic_id']; ?>&info=forumtopics" class="dropdown-item">Delete</a></center>
                                </div>
                                <div class="widget-body">
                                  Topic ID: <?php echo $forumtopics['topic_id']; ?> <br>
                                  Topic Subject: <?php echo $forumtopics['topic_subject']; ?> <br>
                                  Topic Date: <?php echo $forumtopics['topic_date']; ?> <br>
                                  Topic Categories: <?php echo $forumtopics['topic_categories']; ?> <br>
                                  Topic User: <?php echo $forumtopics['topic_user']; ?> <br>
                                </div>
                              <?php } }?>
                              <?php if($_GET['type'] == "forumreplies"){
                                $sqlforumreplies = "SELECT * FROM bs_forum_replies ORDER BY reply_id DESC";
                                $resultforumreplies = mysqli_query($conn, $sqlforumreplies);
                                while($rowforumreplies = mysqli_fetch_assoc($resultforumreplies)){
                                  $forumreplies[] = $rowforumreplies;
                                }
                                foreach($forumreplies as $forumreplies){?>
                                <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <center><a href="dashboard.update.php?id=<?php echo $forumreplies['reply_id']; ?>&info=forumreplies" class="dropdown-item">Edit</a></center>
                                  <center><a href="dashboard.delete.php?id=<?php echo $forumreplies['reply_id']; ?>&info=forumreplies" class="dropdown-item">Delete</a></center>
                                </div>
                                <div class="widget-body">
                                  Reply ID: <?php echo $forumreplies['reply_id']; ?> <br>
                                  Reply Content: <?php echo $forumreplies['reply_content']; ?> <br>
                                  Reply Date: <?php echo $forumreplies['reply_date']; ?> <br>
                                  Reply Topic: <?php echo $forumreplies['reply_topic']; ?> <br>
                                  Reply User: <?php echo $forumreplies['reply_user']; ?> <br>
                                </div>
                              <?php } }?>
                              <?php if($_GET['type'] == "forumcategories"){
                                $sqlforumcategories = "SELECT * FROM bs_forum_categories ORDER BY categories_id DESC";
                                $resultforumcategories = mysqli_query($conn, $sqlforumcategories);
                                while($rowforumcategories = mysqli_fetch_assoc($resultforumcategories)){
                                  $forumcategories[] = $rowforumcategories;
                                }
                                foreach($forumcategories as $forumcategories){?>
                                <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <center><a href="dashboard.update.php?id=<?php echo $forumcategories['categories_id']; ?>&info=forumcategories" class="dropdown-item">Edit</a></center>
                                  <center><a href="dashboard.delete.php?id=<?php echo $forumcategories['categories_id']; ?>&info=forumcategories" class="dropdown-item">Delete</a></center>
                                </div>
                                <div class="widget-body">
                                  Category ID: <?php echo $forumcategories['categories_id']; ?> <br>
                                  Category Name: <?php echo $forumcategories['categories_name']; ?> <br>
                                  Category Description: <?php echo $forumcategories['categories_description']; ?> <br>
                                </div>
                              <?php } }?>
                              <?php if($_GET['type'] == "forumposts"){
                                $sqlforumposts = "SELECT * FROM bs_forum_posts ORDER BY post_id DESC";
                                $resultforumposts = mysqli_query($conn, $sqlforumposts);
                                while($rowforumposts = mysqli_fetch_assoc($resultforumposts)){
                                  $forumposts[] = $rowforumposts;
                                }
                                foreach($forumposts as $forumposts){?>
                                <a href="#" class="dropdown-toggle editdashboard" data-bs-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <center><a href="dashboard.update.php?id=<?php echo $forumposts['post_id']; ?>&info=forumposts" class="dropdown-item">Edit</a></center>
                                  <center><a href="dashboard.delete.php?id=<?php echo $forumposts['post_id']; ?>&info=forumposts" class="dropdown-item">Delete</a></center>
                                </div>
                                <div class="widget-body">
                                  Posts ID: <?php echo $forumposts['post_id']; ?> <br>
                                  Posts Content: <?php echo $forumposts['post_content']; ?> <br>
                                  Posts Date: <?php echo $forumposts['post_date']; ?> <br>
                                  Posts Topic: <?php echo $forumposts['post_topic']; ?> <br>
                                  Posts User: <?php echo $forumposts['post_user']; ?> <br>
                                </div>
                              <?php } }?>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </main>
              <?php include "footer.php" ?>
            </div>
        </div>
    </body>
</html>
