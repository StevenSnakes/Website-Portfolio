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
    $sql = "SELECT * FROM bs_posts ORDER BY post_id DESC LIMIT 3";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $p[] = $row;
    }
    ?>
    <div class="blog-single gray-bg">
      <div class="container">
        <div class="row align-items-start">
          <div class="col-lg-8 m-15px-tb">
            <?php
            foreach($p as $m){
              $sqls = "SELECT * FROM bs_profiles WHERE email = '".$m['post_email']."'";
              $results = mysqli_query($conn, $sqls);
              while($rows = mysqli_fetch_assoc($results)){
                $ps[] = $rows;
              }
              foreach($ps as $ps){
                if(isset($ps['name'])){
                  $author = ucwords($ps['name']);
                } else {
                  $author = $m['post_email'];
                }
                if(isset($ps['avatar'])){
                  $avatar = $ps['avatar'];
                }
              }
              $k = $m['post_json'];
              $k = json_decode($k, true);
              $links = array();
              $parts = explode(',', $k['tags']);
              if($k['tags'] == ""){
                $links[] = "<a href='' style='text-transform:capitalize'>No Tags</a>";
              } else{
                foreach ($parts as $tags){
                  $links[] = "<a href='post.tag.search.php?tag=$tags' style='text-transform:capitalize'>".$tags."</a>";
                }
              }
              ?>
              <article class="article">
                <div class="article-img">
                  <?php
                  if(isset($_SESSION['email'])){
                    if($m['post_email'] == $_SESSION['email']){ ?>
                      <a href="#" class="dropdown-toggle editpost" data-bs-toggle="dropdown"></a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <center><a href="edit.posts.php?postid=<?php echo $m['post_id']; ?>" class="dropdown-item">Edit Post</a></center>
                      </div>
                      <?php
                    }
                  }
                  if(isset($_SESSION['user_email_address'])){
                    if($m['post_email'] == $_SESSION['user_email_address']){ ?>
                      <a href="#" class="dropdown-toggle editpost" data-bs-toggle="dropdown"></a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <center><a href="edit.posts.php?postid=<?php echo $m['post_id']; ?>" class="dropdown-item">Edit Post</a></center>
                      </div>
                      <?php
                    }
                  } ?>
                  <img src="<?php echo $k['img']; ?>" class="center-img">
                </div>
                <div class="article-title">
                  <?php echo "<h2>" . $k['title'] . "</h2>"; ?>
                  <div class="media">
                    <div class="avatar">
                      <img src="<?php echo $avatar ?>" class="avatar rounded-circle avatar-sm img-thumbnail-sm" alt="profile-image">
                    </div>
                    <div class="media-body">
                      <label><?php echo $author; ?></label>
                      <span><?php echo $k['date']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="article-content">
                  <?php echo "<p>" . $k['body'] . "</p>"; ?>
                </div>
                <div class="nav tag-cloud">
                  <?php echo implode($links) ?>
                </div>
              </article>
              <?php
            } ?>
          </div>
          <div class="col-lg-4 m-15px-tb blog-aside">
            <!-- Author -->
            <?php
            $sqlauthor = "SELECT * FROM bs_profiles WHERE name IS NOT NULL ORDER BY RAND() LIMIT 1";
            $resultauthor = mysqli_query($conn, $sqlauthor);
            while($rowauthor = mysqli_fetch_assoc($resultauthor)){
              $authorsql[] = $rowauthor;
            }
            foreach($authorsql as $asql){
            $authorname = $asql['name'];
            $authorabout = $asql['about_me'];
            $authoravator = $asql['avatar'];
            } ?>
            <div class="card widget-author">
              <div class="widget-title">
                <h3>Top Authors</h3>
              </div>
              <div class="widget-body">
                <div class="media align-items-center">
                  <div class="avatar">
                    <img src="<?php echo $authoravator ?>" class="rounded-circle avatar-lg img-thumbnail" title="" alt="">
                  </div>
                  <div class="media-body">
                    <h6>Hello, This is <br> <?php echo $authorname ?></h6>
                  </div>
                </div>
                <p><?php echo $authorabout ?></p>
              </div>
            </div>
            <!-- End Author -->
            <!-- Latest Post -->
            <div class="card">
              <div class="widget-title">
                <h3>Latest Posts</h3>
                <?php
                $sqllp = "SELECT * FROM bs_posts ORDER BY post_id DESC LIMIT 3";
                $resultlp = mysqli_query($conn, $sqllp);
                while($rowlp = mysqli_fetch_assoc($resultlp)){
                  $plp[] = $rowlp;
                }
                ?>
              </div>
              <div class="widget-body">
                <?php
                foreach($plp as $m){
                  $sqls = "SELECT * FROM bs_profiles WHERE email = '".$m['post_email']."'";
                  $results = mysqli_query($conn, $sqls);
                  while($rows = mysqli_fetch_assoc($results)){
                    $ps[] = $rows;
                  }
                  foreach($ps as $ps){
                    if(isset($ps['name'])){
                      $author = $ps['name'];
                    } else {
                      $author = $m['post_email'];
                    }
                  }
                  $k = $m['post_json'];
                  $k = json_decode($k, true); ?>
                  <div class="latest-post-aside media">
                    <div class="lpa-left media-body">
                      <div class="lpa-title">
                        <h5><a href='post.view.php?id=<?php echo $m["post_id"] ?>'><?php echo $k['title'] ?></a></h5>
                      </div>
                      <div class="lpa-meta">
                        <a class="name">
                          <?php echo $author; ?>
                        </a>
                        <a class="date">
                          <?php echo $k['date']; ?>
                        </a>
                      </div>
                    </div>
                    <div class="lpa-right">
                      <div class="mediaimg">
                        <a href='post.view.php?id=<?php echo $m["post_id"] ?>'>
                          <img src="<?php echo $k['img']; ?>" class="center-img">
                        </a>
                      </div>
                    </div>
                  </div>
                  <?php
                } ?>
              </div>
            </div>
            <!-- End Latest Post -->
            <!-- widget Tags -->
            <div class="card">
              <div class="widget-title">
                <h3>Latest Tags</h3>
              </div>
              <div class="widget-body">
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
                <form method="post" action="post.tag.search.php" class="comment-area-box mb-3" enctype=”multipart/form-data”>
                  <span class="input-icon">
                      <input name="tagsearch" rows="3" class="form-control" placeholder='Search For Tag...'></input>
                  </span>
                </form>
              </div>
            </div>
            <!-- End widget Tags -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Main -->
    <?php include "footer.php" ?>
  </body>
</html>
