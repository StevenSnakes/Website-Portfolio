<?php session_start(); ?>
<?php
// if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){
//   header("location: new.signin.php?msg=Login First");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Preview Posts</title>
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
  <?php //check if the user is logged in
  include "config.php";
  if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){
  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sqlp = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['email']."'";
  }
  if(isset($_SESSION['user_email_address'])){
    $email = $_SESSION['user_email_address'];
    $sqlp = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['user_email_address']."'";
  }
    $resultp = mysqli_query($conn, $sqlp);
    while($rowp = mysqli_fetch_assoc($resultp)){
      $pp[] = $rowp;
    }
    foreach($pp as $pp){
      $author = $pp['name'];
      $icon = $pp['avatar'];
    }
  } else {
    $author = "anonymous";
  } ?>

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-body">
        <center>
          <h5>Ready To Create The Post?</h5>
          <?php
          $ptitle = $_GET['title'];
          $pbody = $_GET['body'];
          $pimg = $_GET['img'];
          $ptag = $_GET['tags'];
          ?>
          <a type="button" href="new.posts.create.php?title=<?php echo $ptitle; ?>&body=<?php echo $pbody; ?>&img=<?php echo $pimg; ?>&tags=<?php echo $ptag; ?>" class="btn btn-primary">Create</a>
          <button type="button" class="btn btn-primary" id="exitpre">No</button>
        </center>
      </div>
    </div>
  </div>
  <div class="blog-single gray-bg">
      <div class="container">
        <div class="alert alert-info">
          <center>
              <h1>NEW POST PREVIEW</h1>
            </div>
              <div class="row align-items-start">
                  <div class="col-lg-8 m-15px-tb">
                      <article class="article">
                          <div class="article-img">
                            <?php if($_GET['img'] != ''){?><img src="<?php echo $_GET['img'] ?>"  class="center-img"><?php ;}else{echo "<h5>ERROR NO IMG</h5>";} ?>
                          </div>
                          <div class="article-title">
                              <?php if($_GET['title'] != ''){echo "<h2>" . $_GET['title'] . "</h2>";}else{echo "<h5>ERROR NO TITLE</h5>";} ?>
                              <div class="media">
                                  <div class="avatar">
                                      <img src="<?php echo $icon ?>" class="avatar rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                  </div>
                                  <div class="media-body">
                                      <label><?php echo $author ?></label>
                                      <span><?php ?></span>
                                  </div>
                              </div>
                          </div>
                          <div class="article-content">
                              <?php if($_GET['body'] != ''){echo "<p>" . $_GET['body'] . "</p>";}else{echo "<h5>ERROR NO BODY</h5>";} ?>
                          </div>
                          <div class="nav tag-cloud">
                            <?php
                            $links = array();
                            $parts = explode(',', $_GET['tags']);
                            if($_GET['tags'] == ""){
                              $links[] = "<a href='#' style='text-transform:capitalize'>No Tags</a>";
                            } else{
                              foreach ($parts as $tags)
                              {
                              $links[] = "<a href='#' style='text-transform:capitalize'>".$tags."</a>";
                              }
                            }
                            ?>
                            <?php echo implode($links) ?>
                          </div>
                      </article>
                  </div>
                  <div class="col-lg-4 m-15px-tb blog-aside">
                      <center>
                        <div class="widget widget-author">
                          <div class="widget-title">
                            <?php
                            $ptitle = $_GET['title'];
                            $pbody = $_GET['body'];
                            $pimg = $_GET['img'];
                            $ptag = $_GET['tags'];
                            ?>
                            <?php if($ptitle == '' || $pbody == '' || $pimg == ''){ ?>
                            <a class="btn btn-danger">Error</a>
                            <?php } else { ?>
                            <button type="button" id="myBtn" class="btn btn-primary">Create</button>
                            <?php } ?>
                            <button type="button" class="btn btn-primary" onclick="self.close()">Exit Preview</button>
                          </div>
                      </div>
                    </center>
                  </div>
              </div>
          </div>
      </div>
    </div>
  <!-- End Main -->

  <?php include "footer.php" ?>

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
</body>
</html>
