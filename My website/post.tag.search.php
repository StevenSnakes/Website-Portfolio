<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Posts</title>
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
    <div class="blog-single gray-bg">
      <div class="container">
        <div class="row align-items-start">
          <div class="col-lg-8 m-15px-tb">
            <article class="article">
              <div class="blog-aside">
                <div class="widget-title">
                  <?php if(isset($_GET['tag'])){ ?>
                    <h3><?php echo "SEARCHING '" . $_GET['tag'] . "'"; ?></h3>
                  <?php } ?>
                  <?php if(isset($_POST['tagsearch'])){ ?>
                    <h3><?php echo "SEARCHING '" . $_POST['tagsearch'] . "'"; ?></h3>
                  <?php } ?>
                </div>
              </div>
              <?php
              $sqlposts = "SELECT * FROM bs_posts ORDER BY post_id DESC";
              $resultposts = mysqli_query($conn, $sqlposts);
              while($rowposts = mysqli_fetch_assoc($resultposts)){
                $posts[] = $rowposts;
              }
              foreach($posts as $posts){
                $json = $posts['post_json'];
                $json = json_decode($json, true);
                $postarray = array();
                $postarray2 = array();
                $parts = explode(',', $json['tags']);
                $sqluser = "SELECT * FROM bs_profiles WHERE email = '".$posts['post_email']."'";
                $resultuser = mysqli_query($conn, $sqluser);
                while($rowuser = mysqli_fetch_assoc($resultuser)){
                  $user[] = $rowuser;
                }
                foreach($user as $user){
                }
                if($json['tags'] != ""){
                  foreach ($parts as $tags){
                    $postarray[] = $tags;
                    $postarray2[] = $tags . "<br>";
                    $postid = $posts['post_id'];
                  }
                }
                foreach($postarray as $testing){
                  if(isset($_GET['tag'])){
                    if(strtolower($testing) == strtolower($_GET['tag'])){
                      echo "<br>";
                      $isset = "set"; ?>
                      <div class="widget-body">
                        <div class="latest-post-aside media">
                          <div class="lpa-left media-body">
                            <div class="lpa-title">
                              <h5><a href='post.view.php?id=<?php echo $posts["post_id"] ?>'><?php echo $json['title'] ?></a></h5>
                            </div>
                            <div class="lpa-meta">
                              <a class="name">
                                <?php echo $user['name']; ?>
                              </a>
                              <a class="date">
                                <?php echo $json['date']; ?>
                              </a>
                            </div>
                          </div>
                          <div class="lpa-right">
                            <div class="mediaimg">
                              <a href="#">
                                <img src="<?php echo $json['img']; ?>" class="center-img">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div> <?php
                    }
                  }
                  if(isset($_POST['tagsearch'])){
                    if(strtolower($testing) == strtolower($_POST['tagsearch'])){
                      echo "<br>";
                      $isset = "set"; ?>
                      <div class="widget-body">
                        <div class="latest-post-aside media">
                          <div class="lpa-left media-body">
                            <div class="lpa-title">
                              <h5><a href='post.view.php?id=<?php echo $posts["post_id"] ?>'><?php echo $json['title'] ?></a></h5>
                            </div>
                            <div class="lpa-meta">
                              <a class="name">
                                <?php echo $user['name']; ?>
                              </a>
                              <a class="date">
                                <?php echo $json['date']; ?>
                              </a>
                            </div>
                          </div>
                          <div class="lpa-right">
                            <div class="mediaimg">
                              <a href="#">
                                <img src="<?php echo $json['img']; ?>" class="center-img">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div> <?php
                    }
                  }
                }
              }
              if(!isset($isset)){
                echo "Search Failed";
              }
              ?>
            </article>
          </div>
          <div class="col-lg-4 m-15px-tb blog-aside">
            <div class="card">
              <div class="widget-title">
                <h3>Tag Search</h3>
              </div>
              <div class="widget-body">
                <form method="post" action="post.tag.search.php" class="comment-area-box mb-3" enctype=”multipart/form-data”>
                  <span class="input-icon">
                      <input name="tagsearch" rows="3" class="form-control" placeholder='Search For Tag...'></input>
                  </span>
                </form>
                <div class="nav tag-cloud">
                  <?php
                  $sqlpoststag = "SELECT * FROM bs_posts ORDER BY post_id DESC LIMIT 3";
                  $resultpoststag = mysqli_query($conn, $sqlpoststag);
                  while($rowpoststag = mysqli_fetch_assoc($resultpoststag)){
                    $poststag[] = $rowpoststag;
                  }
                  $postarraytag = array();
                  foreach($poststag as $poststag){
                    $jsontag = $poststag['post_json'];
                    $jsontag = json_decode($jsontag, true);
                    $partstag = explode(',', $jsontag['tags']);
                    if($jsontag['tags'] != ""){
                      foreach ($partstag as $tagstag){
                        array_push($postarraytag, $tagstag);
                      }
                    }
                  }
                  $arraytag = array_unique($postarraytag);
                  foreach($arraytag as $finallytag){
                    echo "<a href='post.tag.search.php?tag=$finallytag'>" . $finallytag . "</a>";
                  }
                  ?>
                </div>
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
