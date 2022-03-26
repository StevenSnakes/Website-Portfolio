<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
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

      $(function(){
        $(".replycomment-toggle-menu").click(function() {
          $("#replycomment").toggleClass("toggled");
        });
      })
    </script>
  </head>
  <style>
  </style>
<body>
  <?php include "header.php"; ?>
  <?php include 'config.php';
  if(isset($_SESSION['email'])){
    $emailcheck = $_SESSION['email'];
  }
  if(isset($_SESSION['user_email_address'])){
    $emailcheck = $_SESSION['user_email_address'];
  }

  // select the category
  if(!isset($_GET['forum']) && !isset($_GET['forumopen'])) {?>
  <div class="blog-single gray-bg">
    <div class="container">
      <?php if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){ ?>
      <div class="row h-100 justify-content-center align-items-center">
      <?php } else { ?>
      <div class="row align-items-start">
      <?php } ?>
        <div class="col-xl-9">
          <div class="card">
            <div id="wrapper">
              <div id="menu">
                <nav class="navbar-expand-lg navbar-dark forumtop" id="page-content-wrapper">
                  <div class="container">
                    <a class="navbar-brand forums" disabled>Forum</a>
                    <?php if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){ ?>
                      <a class="float-right btn btn-forum" href="forum.create.php?create=top">Create a topics</a>
                    <?php } ?>
                    <?php if(isset($_SESSION['access_token']) || isset($_SESSION['email'])) {
                      $sqladmincheck = "SELECT * FROM bs_profiles WHERE email = '$emailcheck' AND admin = 1";
                      $resultadmincheck = mysqli_query($conn, $sqladmincheck);
                      if(mysqli_num_rows($resultadmincheck) > 0){
                        while($rowadmincheck = mysqli_fetch_assoc($resultadmincheck)){
                          $admincheck[] = $rowadmincheck;
                        }
                        foreach($admincheck as $admincheck){?>
                          <a class="float-right btn btn-forum" href="forum.create.php?create=cat">Create a category</a>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </nav>
              <div>
                <?php
                $categorysql = "SELECT * FROM bs_forum_categories";
                $resultcategory = mysqli_query($conn, $categorysql);
                if(mysqli_num_rows($resultcategory) > 0){
                  while($rowcategory = mysqli_fetch_assoc($resultcategory)){
                    $cat[] = $rowcategory;
                  }
                  foreach($cat as $cat){ ?>
                  <a href="forum.php?forum=<?php echo $cat['categories_name'] ?>" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center pb-1" id="tooltips-container">
                    <div class="w-100 ms-2">
                      <h5 class="mb-1"><?php echo $cat['categories_name'] ?><i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                      <h5 class="user-text font-13 mb-3" maxlength="255"><?php echo $cat['categories_description'] ?><i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                    </div>
                    <i class="mdi mdi-chevron-right h2"></i>
                  </div>
                  </a>
                  <?php } ?>
                <?php } else { ?>
                  <div class="w-100 ms-2">
                    No Categories Made
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){ ?>
      <div class="col-lg-3 m-15px-tb blog-aside">
        <?php
        $sqlauthor = "SELECT * FROM bs_profiles WHERE email = '$emailcheck' LIMIT 1";
        $resultauthor = mysqli_query($conn, $sqlauthor);
        while($rowauthor = mysqli_fetch_assoc($resultauthor)){
          $authorsql[] = $rowauthor;
        }
        foreach($authorsql as $asql){
          $authorname = $asql['name'];
          $authorabout = $asql['about_me'];
          $authoravator = $asql['avatar'];
        }
        ?>
        <div class="card widget-author">
          <div class="widget-title">
            <h3>Author</h3>
          </div>
          <div class="widget-body">
            <div class="media align-items-center">
              <div class="avatar">
                <img src="<?php echo $authoravator ?>" class="rounded-circle avatar-lg img-thumbnail" title="" alt="">
              </div>
              <div class="media-body">
                <h6>Hello, I'm<br> <?php echo $authorname ?></h6>
              </div>
            </div>
            <p><?php echo $authorabout ?></p>
          </div>
        </div>
        <div class="card">
          <div class="widget-title">
            <h3>Lastest Posts</h3>
          </div>
          <?php
          $sqls = "SELECT * FROM bs_forum_posts ORDER BY post_date DESC LIMIT 3";
          $results = mysqli_query($conn, $sqls);
          if(mysqli_num_rows($results) > 0){
          while($rows = mysqli_fetch_assoc($results)){
            $ps[] = $rows;
          } ?>
          <div class="widget-body">
           <?php
           $sqllp = "SELECT * FROM bs_forum_topics ORDER BY topic_date DESC LIMIT 3";
           $resultlp = mysqli_query($conn, $sqllp);

           while($rowlp = mysqli_fetch_assoc($resultlp)){
             $lp[] = $rowlp;
           }
           foreach($lp as $lp){
             $lptu = $lp['topic_user'];
             $sqlauthorcheck = "SELECT * FROM bs_profiles WHERE email = '$lptu' LIMIT 1";
             $resultauthorcheck = mysqli_query($conn, $sqlauthorcheck);
               while($rowauthorcheck = mysqli_fetch_assoc($resultauthorcheck)){
                 $authorcheck[] = $rowauthorcheck;
               }
               foreach($authorcheck as $authorcheck){
                 if(isset($authorcheck['name'])){
                   $ac = $authorcheck['name'];
                 } else {
                   $ac = $lp['topic_user'];
                }
               }
               $sqllps = "SELECT * FROM bs_forum_categories WHERE categories_id = '".$lp['topic_categories']."'";
               $resultslps = mysqli_query($conn, $sqllps);
               while($rowlps = mysqli_fetch_assoc($resultslps)){
                 $lps[] = $rowlps;
               }
               foreach($lps as $lps){
               }
           ?>
           <div class="latest-post-aside media">
             <div class="lpa-left media-body test">
               <div class="lpa-title">
                 <?php $lpts = $lp['topic_subject'];
                 if(strlen($lpts) >= 31){
                 $lpts = substr($lpts, 0, 25);
                 $lpts .= '...'; }?>
                 <h5><a href='forum.php?forumopen=<?php echo $lp['topic_subject'] ?>&forumtopic=<?php echo $lps['categories_name'] ?>'><?php echo $lpts ?></a></h5>
               </div>
               <div class="lpa-meta">
                 <a class="name">
                   <?php echo $ac; ?>
                 </a>
                 <a class="date">
                   <?php echo $lp['topic_date']; ?>
                 </a>
               </div>
             </div>
         </div>
       <?php } ?>
       </div>
          <?php
          } ?>
        </div>
      </div>
      <?php
    } ?>
    </div>
  </div>
</div>
<?php } ?>

<!-- select the topic -->
<?php if(isset($_GET['forum'])) {?>
<div class="blog-single gray-bg">
  <div class="container">
    <?php if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){ ?>
    <div class="row h-100 justify-content-center align-items-center">
    <?php } else { ?>
    <div class="row align-items-start">
    <?php } ?>
      <div class="col-xl-9">
        <div class="card">
          <div id="wrapper">
            <div id="menu">
              <nav class=" navbar-expand-lg navbar-dark forumtop" id="page-content-wrapper">
                <div class="container"> <?php
                  $forumopen = $_GET['forum'];
                  if(strlen($forumopen) >= 31){
                  $forumopen = substr($forumopen, 0, 30);
                  $forumopen .= '...'; }?>
                  <a class="navbar-brand forums" disabled>Forum / <?php echo $forumopen ?></a>
                  <?php if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){ ?>
                    <a class="float-right btn btn-forum" href="forum.create.php?create=top&topic=<?php echo $_GET['forum'] ?>">Create a topics</a>
                  <?php } ?>
                  <?php if(isset($_SESSION['access_token']) || isset($_SESSION['email'])) {
                    $sqladmincheck = "SELECT * FROM bs_profiles WHERE email = '$emailcheck' AND admin = 1";
                    $resultadmincheck = mysqli_query($conn, $sqladmincheck);
                    if(mysqli_num_rows($resultadmincheck) > 0){
                      while($rowadmincheck = mysqli_fetch_assoc($resultadmincheck)){
                        $admincheck[] = $rowadmincheck;
                      }
                      foreach($admincheck as $admincheck){?>
                        <a class="float-right btn btn-forum" href="forum.create.php?create=cat">Create a category</a>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </nav>
            <div>
              <?php
              $topiccategoriesforum = $_GET['forum'];
              $topichecksql = "SELECT * FROM bs_forum_categories WHERE categories_name = '".$_GET['forum']."'";
              $resulttopicheck = mysqli_query($conn, $topichecksql);
              while($rowtopicheck = mysqli_fetch_assoc($resulttopicheck)){
                $topicheck[] = $rowtopicheck;
              }
              foreach($topicheck as $topicheck){
                $topiccatecheck = $topicheck['categories_id'];
              }
              $topicsql = "SELECT * FROM bs_forum_topics WHERE topic_categories = '$topiccatecheck' ORDER BY topic_date DESC";
              $resulttopic = mysqli_query($conn, $topicsql);
              if(mysqli_num_rows($resulttopic) > 0){
                while($rowtopic = mysqli_fetch_assoc($resulttopic)){
                  $topic[] = $rowtopic;
                }
                foreach($topic as $topic){ ?>
                <a href="forum.php?forumopen=<?php echo $topic['topic_subject']?>&forumtopic=<?php echo $_GET['forum'] ?>" class="list-group-item list-group-item-action">
                <div class="d-flex align-items-center pb-1" id="tooltips-container">
                  <div class="w-100 ms-2">
                    <h5 class="mb-1"><?php echo $topic['topic_subject'] ?><i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                    <h5 class="user-text font-13 mb-3" maxlength="255"><?php echo $topic['topic_date'] ?><i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                  </div>
                  <i class="mdi mdi-chevron-right h2"></i>
                </div>
                </a>
                <?php } ?>
              <?php } else { ?>
                <div class="w-100 ms-2">
                  No Topics Yet
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    <?php if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){ ?>
    <div class="col-lg-3 m-15px-tb blog-aside">
      <?php
      $sqlauthor = "SELECT * FROM bs_profiles WHERE email = '$emailcheck' LIMIT 1";
      $resultauthor = mysqli_query($conn, $sqlauthor);
      while($rowauthor = mysqli_fetch_assoc($resultauthor)){
        $authorsql[] = $rowauthor;
      }
      foreach($authorsql as $asql){
        $authorname = $asql['name'];
        $authorabout = $asql['about_me'];
        $authoravator = $asql['avatar'];
      }
      ?>
      <div class="card widget-author">
        <div class="widget-title">
          <h3>Author</h3>
        </div>
        <div class="widget-body">
          <div class="media align-items-center">
            <div class="avatar">
              <img src="<?php echo $authoravator ?>" class="rounded-circle avatar-lg img-thumbnail" title="" alt="">
            </div>
            <div class="media-body">
              <h6>Hello, I'm<br> <?php echo $authorname ?></h6>
            </div>
          </div>
          <p><?php echo $authorabout ?></p>
        </div>
      </div>
      <div class="card">
        <div class="widget-title">
          <h3>Lastest Posts</h3>
        </div>
        <?php
        $sqls = "SELECT * FROM bs_forum_posts ORDER BY post_date DESC LIMIT 3";
        $results = mysqli_query($conn, $sqls);
        if(mysqli_num_rows($results) > 0){
        while($rows = mysqli_fetch_assoc($results)){
          $ps[] = $rows;
        } ?>
        <div class="widget-body">
         <?php
         $sqllp = "SELECT * FROM bs_forum_topics ORDER BY topic_date DESC LIMIT 3";
         $resultlp = mysqli_query($conn, $sqllp);

         while($rowlp = mysqli_fetch_assoc($resultlp)){
           $lp[] = $rowlp;
         }
         foreach($lp as $lp){
           $lptu = $lp['topic_user'];
           $sqlauthorcheck = "SELECT * FROM bs_profiles WHERE email = '$lptu' LIMIT 1";
           $resultauthorcheck = mysqli_query($conn, $sqlauthorcheck);
             while($rowauthorcheck = mysqli_fetch_assoc($resultauthorcheck)){
               $authorcheck[] = $rowauthorcheck;
             }
             foreach($authorcheck as $authorcheck){
               if(isset($authorcheck['name'])){
                 $ac = $authorcheck['name'];
               } else {
                 $ac = $lp['topic_user'];
              }
             }
             $sqllps = "SELECT * FROM bs_forum_categories WHERE categories_id = '".$lp['topic_categories']."'";
             $resultslps = mysqli_query($conn, $sqllps);
             while($rowlps = mysqli_fetch_assoc($resultslps)){
               $lps[] = $rowlps;
             }
             foreach($lps as $lps){
             }
         ?>
         <div class="latest-post-aside media">
           <div class="lpa-left media-body test">
             <div class="lpa-title">
               <?php $lpts = $lp['topic_subject'];
               if(strlen($lpts) >= 31){
               $lpts = substr($lpts, 0, 25);
               $lpts .= '...'; }?>
               <h5><a href='forum.php?forumopen=<?php echo $lp['topic_subject'] ?>&forumtopic=<?php echo $lps['categories_name'] ?>'><?php echo $lpts ?></a></h5>
             </div>
             <div class="lpa-meta">
               <a class="name">
                 <?php echo $ac; ?>
               </a>
               <a class="date">
                 <?php echo $lp['topic_date']; ?>
               </a>
             </div>
           </div>
       </div>
     <?php } ?>
     </div>
        <?php
        } ?>
      </div>
    </div>
    <?php
  } ?>
  </div>
</div>
</div>
<?php } ?>

<!-- the topics discussion -->
<?php if(isset($_GET['forumopen'])) {?>
<div class="blog-single gray-bg">
  <div class="container">
    <?php if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){ ?>
    <div class="row h-100 justify-content-center align-items-center">
    <?php } else { ?>
    <div class="row align-items-start">
    <?php } ?>
      <div class="col-xl-9">
        <div class="card">
          <div id="wrapper">
            <div id="menu">
              <nav class=" navbar-expand-lg navbar-dark forumtop" id="page-content-wrapper">
                <div class="container">
                  <?php $forumopen = $_GET['forumopen'];
                  if(strlen($forumopen) >= 31){
                  $forumopen = substr($forumopen, 0, 30);
                  $forumopen .= '...'; }?>
                  <a class="navbar-brand forums" disabled>Forum / <?php echo $forumopen ?></a>
                  <?php if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){ ?>
                    <a class="float-right btn btn-forum" id="myBtn"><font color="white">Post a Comment</font></a>
                    <a class="float-right btn btn-forum" href="forum.create.php?create=top&topic=<?php echo $_GET['forumtopic'] ?>">Create a topic</a>
                  <?php } ?>
                  <?php if(isset($_SESSION['access_token']) || isset($_SESSION['email'])) {
                    $sqladmincheck = "SELECT * FROM bs_profiles WHERE email = '$emailcheck' AND admin = 1";
                    $resultadmincheck = mysqli_query($conn, $sqladmincheck);
                    if(mysqli_num_rows($resultadmincheck) > 0){
                      while($rowadmincheck = mysqli_fetch_assoc($resultadmincheck)){
                        $admincheck[] = $rowadmincheck;
                      }
                      foreach($admincheck as $admincheck){?>
                        <a class="float-right btn btn-forum" href="forum.create.php?create=cat">Create a category</a>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </nav>
            <div>
              <?php
              $discussionsubjectcheck = $_GET['forumopen'];
              $sqldiscussionscheck = "SELECT * FROM bs_forum_topics WHERE topic_subject = '".$discussionsubjectcheck."'";
              $resultdiscussionscheck = mysqli_query($conn, $sqldiscussionscheck);
              while($rowdiscussionscheck = mysqli_fetch_assoc($resultdiscussionscheck)){
                $discussionscheck[] = $rowdiscussionscheck;
              }
              foreach($discussionscheck as $discussionscheck){
                $discussioncheck = $discussionscheck['topic_id'];
              }
              $sqldiscussions = "SELECT * FROM bs_forum_posts WHERE post_topic = '$discussioncheck'";
              $resultdiscussions = mysqli_query($conn, $sqldiscussions);
              if(mysqli_num_rows($resultdiscussions) > 0){
                while($rowdiscussions = mysqli_fetch_assoc($resultdiscussions)){
                  $discussions[] = $rowdiscussions;
                }
                foreach($discussions as $discussions){
                  $sqldiscussionsavatar = "SELECT * FROM bs_profiles WHERE email = '".$discussions['post_user']."'";
                  $resultdiscussionsavatar = mysqli_query($conn, $sqldiscussionsavatar);
                  while($rowdiscussionsavatar = mysqli_fetch_assoc($resultdiscussionsavatar)){
                    $discussionsavatar[] = $rowdiscussionsavatar;
                  }
                  foreach($discussionsavatar as $discussionsavatar){
                  }
                  if($discussionsavatar['name'] == ""){
                    $discussionsreplyname = $discussionsavatar['email'];
                  } else {
                    $discussionsreplyname = $discussionsavatar["name"];
                  } ?>
                  <div class="d-flex align-items-start forumcontent">
                    <?php
                    if(isset($_SESSION['email'])){
                      if($discussions['post_user'] == $_SESSION['email']){ ?>
                        <a href="#" class="dropdown-toggle editcomment" data-bs-toggle="dropdown"></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <center><a href="forum.create.php?create=update&postid=<?php echo $discussions['post_content']; ?>&commentid=<?php echo $discussions['post_id']; ?>&forumopen=<?php echo $_GET['forumopen'] ?>&forumtopic=<?php echo $_GET['forumtopic'] ?>" class="dropdown-item">Edit</a></center>
                        </div>
                        <?php
                      }
                    }
                    if(isset($_SESSION['user_email_address'])){
                      if($discussions['post_user'] == $_SESSION['user_email_address']){ ?>
                        <a href="#" class="dropdown-toggle editcomment" data-bs-toggle="dropdown"></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <center><a href="forum.create.php?create=update&postid=<?php echo $discussions['post_content']; ?>&commentid=<?php echo $discussions['post_id']; ?>&forumopen=<?php echo $_GET['forumopen'] ?>&forumtopic=<?php echo $_GET['forumtopic'] ?>" class="dropdown-item">Edit</a></center>
                        </div>
                        <?php
                      }
                    } ?>
                      <img class="me-2 avatar-sm rounded-circle rounded-circle avatar-lg img-thumbnail" src="<?php echo $discussionsavatar['avatar'] ?>" alt="Generic placeholder image">
                      <div class="w-100">
                        <h5 class=""><?php echo $discussionsreplyname . " <small class='text-muted'><font size=2>OP</font></small>" ?>  <small class="text-muted"><font size=2> <?php echo "<br>" . $discussions['post_date'] ?></font></small></h5>
                        <div class="">
                          <?php echo $discussions['post_content'] ?>
                        </div>
                      </div>
                  </div>
                <?php } ?>
              <?php } else { ?>
                <div class="w-100 ms-2">
                  No Topics
                </div>
              <?php }
              $discussionsubjectcheckreply = $_GET['forumopen'];
              $sqldiscussionscheckreply = "SELECT * FROM bs_forum_topics WHERE topic_subject = '".$discussionsubjectcheckreply."'";
              $resultdiscussionscheckreply = mysqli_query($conn, $sqldiscussionscheckreply);
              while($rowdiscussionscheckreply = mysqli_fetch_assoc($resultdiscussionscheckreply)){
                $discussionscheckreply[] = $rowdiscussionscheckreply;
              }
              foreach($discussionscheckreply as $discussionscheckreply){
                $discussioncheckreply = $discussionscheckreply['topic_id'];
              }
              $sqldiscussionsreply = "SELECT * FROM bs_forum_replies WHERE reply_topic = '$discussioncheckreply' ORDER BY reply_id DESC";
              $resultdiscussionsreply = mysqli_query($conn, $sqldiscussionsreply);
              if(mysqli_num_rows($resultdiscussionsreply) > 0){
                while($rowdiscussionsreply = mysqli_fetch_assoc($resultdiscussionsreply)){
                  $discussionsreply[] = $rowdiscussionsreply;
                }
                foreach($discussionsreply as $discussionsreply){} ?>
            </div> <?php
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 25;
            $offset = ($pageno-1) * $no_of_records_per_page;

            include "config.php";

            $total_pages_sql = "SELECT COUNT(*) FROM bs_forum_replies WHERE reply_topic = '$discussioncheckreply'";
            $resultpagenav = mysqli_query($conn,$total_pages_sql);
            $total_rows = mysqli_fetch_array($resultpagenav)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $sqlpagenav = "SELECT * FROM bs_forum_replies WHERE reply_topic = '$discussioncheckreply' ORDER BY reply_id DESC LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($conn,$sqlpagenav);
            while($rowpagenav = mysqli_fetch_array($res_data)){
              //here goes the data
              $pagenav[] = $rowpagenav;
              $sqlreplyemailcheck = "SELECT * FROM bs_profiles WHERE email = '".$rowpagenav['reply_user']."'";
              $resultreplyemailcheck = mysqli_query($conn, $sqlreplyemailcheck);
              while($rowreplyemailcheck = mysqli_fetch_assoc($resultreplyemailcheck)){
                $replyemailcheck[] = $rowreplyemailcheck;
              }
              foreach($replyemailcheck as $replyemailcheck){
              }

              if(isset($_SESSION['email'])){
                if($rowpagenav['reply_user'] == $_SESSION['email']){ ?>
                  <a href="#" class="dropdown-toggle editcomment" data-bs-toggle="dropdown"></a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <center><a href="forum.create.php?create=update&reply=<?php echo $rowpagenav['reply_content']; ?>&replyid=<?php echo $rowpagenav['reply_id']; ?>&forumopen=<?php echo $_GET['forumopen'] ?>&forumtopic=<?php echo $_GET['forumtopic'] ?>" class="dropdown-item">Edit</a></center>
                  </div>
                  <?php
                }
              }
              if(isset($_SESSION['user_email_address'])){
                if($rowpagenav['reply_user'] == $_SESSION['user_email_address']){ ?>
                  <a href="#" class="dropdown-toggle editcomment" data-bs-toggle="dropdown"></a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <center><a href="forum.create.php?create=update&reply=<?php echo $rowpagenav['reply_content']; ?>&replyid=<?php echo $rowpagenav['reply_id']; ?>&forumopen=<?php echo $_GET['forumopen'] ?>&forumtopic=<?php echo $_GET['forumtopic'] ?>" class="dropdown-item">Edit</a></center>
                  </div>
                  <?php
                }
              } ?>
              <div class="d-flex align-items-start forumcontent2">
              <img class="me-2 avatar-sm rounded-circle rounded-circle avatar-lg img-thumbnail" src="<?php echo $replyemailcheck['avatar'] ?>" alt="Generic placeholder image">
              <div class="w-100">
                <h5 class=""><?php echo $replyemailcheck['name'] ?>  <small class="text-muted"><font size=2> <?php echo "<br>" . $rowpagenav['reply_date'] ?></font></small></h5>
                  <?php echo $rowpagenav['reply_content']; ?>
              </div>
              </div><?php
            } }
            ?>

        <center>
        <ul class="pagination">
            <li><a href="forum.php?forumopen=<?php echo $_GET['forumopen']; ?>&forumtopic=<?php echo $_GET['forumtopic']; ?>&pageno=1">First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno <= 1){ echo ''; } else { echo "forum.php?forumopen=Testing Topic Two&forumtopic=Testing Category&pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno >= $total_pages){ echo ''; } else { echo "forum.php?forumopen=Testing Topic Two&forumtopic=Testing Category&pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li><a href="forum.php?forumopen=<?php echo $_GET['forumopen']; ?>&forumtopic=<?php echo $_GET['forumtopic']; ?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
        </center>
        </div>
      </div>
    </div>
  <?php if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){ ?>
  <div class="col-lg-3 m-15px-tb blog-aside">
    <?php
    $sqlauthor = "SELECT * FROM bs_profiles WHERE email = '$emailcheck' LIMIT 1";
    $resultauthor = mysqli_query($conn, $sqlauthor);
    while($rowauthor = mysqli_fetch_assoc($resultauthor)){
      $authorsql[] = $rowauthor;
    }
    foreach($authorsql as $asql){
      $authorname = $asql['name'];
      $authorabout = $asql['about_me'];
      $authoravator = $asql['avatar'];
    }
    ?>
    <div class="card widget-author">
      <div class="widget-title">
        <h3>Author</h3>
      </div>
      <div class="widget-body">
        <div class="media align-items-center">
          <div class="avatar">
            <img src="<?php echo $authoravator ?>" class="rounded-circle avatar-lg img-thumbnail" title="" alt="">
          </div>
          <div class="media-body">
            <h6>Hello, I'm<br> <?php echo $authorname ?></h6>
          </div>
        </div>
        <p><?php echo $authorabout ?></p>
      </div>
    </div>
    <div class="card">
      <div class="widget-title">
        <h3>Lastest Posts</h3>
      </div>
      <?php
      $sqls = "SELECT * FROM bs_forum_posts ORDER BY post_date DESC LIMIT 3";
      $results = mysqli_query($conn, $sqls);
      if(mysqli_num_rows($results) > 0){
      while($rows = mysqli_fetch_assoc($results)){
        $ps[] = $rows;
      } ?>
      <div class="widget-body">
       <?php
       $sqllp = "SELECT * FROM bs_forum_topics ORDER BY topic_date DESC LIMIT 3";
       $resultlp = mysqli_query($conn, $sqllp);

       while($rowlp = mysqli_fetch_assoc($resultlp)){
         $lp[] = $rowlp;
       }
       foreach($lp as $lp){
         $lptu = $lp['topic_user'];
         $sqlauthorcheck = "SELECT * FROM bs_profiles WHERE email = '$lptu' LIMIT 1";
         $resultauthorcheck = mysqli_query($conn, $sqlauthorcheck);
           while($rowauthorcheck = mysqli_fetch_assoc($resultauthorcheck)){
             $authorcheck[] = $rowauthorcheck;
           }
           foreach($authorcheck as $authorcheck){
             if(isset($authorcheck['name'])){
               $ac = $authorcheck['name'];
             } else {
               $ac = $lp['topic_user'];
            }
           }
           $sqllps = "SELECT * FROM bs_forum_categories WHERE categories_id = '".$lp['topic_categories']."'";
           $resultslps = mysqli_query($conn, $sqllps);
           while($rowlps = mysqli_fetch_assoc($resultslps)){
             $lps[] = $rowlps;
           }
           foreach($lps as $lps){
           }
       ?>
       <div class="latest-post-aside media">
         <div class="lpa-left media-body test">
           <div class="lpa-title">
             <?php $lpts = $lp['topic_subject'];
             if(strlen($lpts) >= 31){
             $lpts = substr($lpts, 0, 25);
             $lpts .= '...'; }?>
             <h5><a href='forum.php?forumopen=<?php echo $lp['topic_subject'] ?>&forumtopic=<?php echo $lps['categories_name'] ?>'><?php echo $lpts ?></a></h5>
           </div>
           <div class="lpa-meta">
             <a class="name">
               <?php echo $ac; ?>
             </a>
             <a class="date">
               <?php echo $lp['topic_date']; ?>
             </a>
           </div>
         </div>
     </div>
   <?php } ?>
   </div>
      <?php
      } ?>
    </div>
  </div>
  <?php
} ?>
</div>
</div>
</div>
<?php } ?>


<!-- Make a Comment -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-body">
      <center>
        <h5>Ready To Create The Post?</h5>
        <form type="submit" method="post" action="forum.create.upload.php?create=comment" enctype=”multipart/form-data”>
          <textarea id="body" rows="5" class="form-control" name="comment" required></textarea>
          <input type="hidden" name="topic" value="<?php echo $discussioncheck ?>"></input>
          <input type="hidden" name="forumtopic" value="<?php echo $_GET['forumtopic'] ?>"></input>
          <br>
          <button type="submit" class="btn btn-primary">Create</button>
          <button type="button" class="btn btn-primary" id="exitpre">Cancel</button>
        </form>
      </center>
    </div>
  </div>
</div>


    <?php include 'footer.php'; ?>
  </body>
  <script>
  // Get the modal
  var modal = document.getElementById("myModal");
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  // When the user clicks the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }
  // When the user clicks on <span> (x), close the modal
  exitpre.onclick = function() {
    modal.style.display = "none";
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
</html>
