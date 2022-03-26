<?php session_start(); ?>
<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){
    header("location: new.signin.php?msg=Login First");
}
if($_GET['create'] == "cat"){
  if(!isset($_SESSION['admin'])){
    header("location: new.signin.php?msg=Login First");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php if($_GET['create'] == "cat"){ ?>
    <title>Creating Category</title>
  <?php } elseif ($_GET['create'] == "top"){ ?>
    <title>Creating Topic</title>
  <?php } elseif ($_GET['create'] == "update"){ ?>
    <title>Updating Comment</title>
  <?php } else{ ?>
    <title>Creating ERROR!</title>
  <?php } ?>
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
  <?php include "header.php"; ?>

  <!-- Main Content -->
  <?php if($_GET['create'] == "cat"){ ?>
  <div class="blog-single gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
            <center><h1>Create Category</h1></center>
              <form type="submit" action="forum.create.upload.php" enctype=”multipart/form-data”>
                <div class="form-group">
                  <label for="title">Category Name</label>
                  <input type="text" class="form-control" name="categoryname" required></input>
                </div>
                <div class="form-group">
                  <label for="body">Category Description</label>
                  <textarea id="body" rows="5" class="form-control" name="categorydesc" required></textarea>
                </div>
                <input type="hidden" name="create" value="category"></input>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <a href="forum.php" ><button type="button" class="btn btn-default">Cancel</button></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($_GET['create'] == "top"){ ?>
  <div class="blog-single gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <?php if(isset($_GET['error'])){ ?>
                <div class="panel-body">
                  <div class="alert alert-danger">
                    <center><?= $_GET['error']; ?>!
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></center>
                  </div>
                </div>
              <?php } ?>
              <center><h1>Create Topic</h1></center>
              <form type="submit" method="POST" action="forum.create.upload.php?create=topic" enctype=”multipart/form-data”>
                <div class="form-group">
                  <label for="title">Topic Title</label>
                  <input type="text" class="form-control" name="topictitle" required></input>
                </div>
                <div class="form-group">
                  <label for="body">Post</label>
                  <textarea id="body" rows="5" class="form-control" name="topicmainpost" required></textarea>
                </div>
                <div class="form-group">
                  <label for="body">Topics Category</label>
                  <select class="form-control" name="topiccategory">
                    <?php if(isset($_GET['topic'])) { ?>
                      <option selected required><?php echo $_GET['topic'] ?></option>
                      <?php $sqlcat = "SELECT * FROM bs_forum_categories WHERE categories_name != '".$_GET['topic']."'"; ?>
                    <?php } else { ?>
                      <option selected disabled hidden required> Please Select A Category</option>
                      <?php $sqlcat = "SELECT * FROM bs_forum_categories"; ?>
                    <?php }
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
                <input type="hidden" name="create" value="topic"></input>
                <?php if(isset($_GET['topic'])){ ?>
                  <input type="hidden" name="forumtopic" value="<?php echo $_GET['topic'] ?>"></input>
                <?php } ?>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <a href="forum.php" ><button type="button" class="btn btn-default">Cancel</button></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($_GET['create'] == "update"){ ?>
  <div class="blog-single gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <center><h1>Edit Comment</h1></center>
              <form type="submit" method="POST" action="forum.create.upload.php?create=update" enctype=”multipart/form-data”>
                <div class="form-group">
                  <label for="body">Comment</label>
                  <?php if(isset($_GET['postid'])){ ?>
                    <textarea id="body" rows="5" class="form-control" name="comment" required><?php echo $_GET['postid']; ?></textarea>
                    <input type="hidden" name="oldcomment" value="<?php echo $_GET['commentid']; ?>"></input>
                    <input type="hidden" name="goback" value="<?php echo $_GET['forumopen']; ?>"></input>
                    <input type="hidden" name="forumtopic" value="<?php echo $_GET['forumtopic']; ?>"></input>
                  <?php } ?>
                  <?php if(isset($_GET['reply'])){ ?>
                    <textarea id="body" rows="5" class="form-control" name="commentreply" required><?php echo $_GET['reply']; ?></textarea>
                    <input type="hidden" name="oldcommentreply" value="<?php echo $_GET['replyid']; ?>"></input>
                    <input type="hidden" name="goback" value="<?php echo $_GET['forumopen']; ?>"></input>
                    <input type="hidden" name="forumtopic" value="<?php echo $_GET['forumtopic']; ?>"></input>
                  <?php } ?>
                </div>
                <input type="hidden" name="create" value="topic"></input>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="forum.php" ><button type="button" class="btn btn-default">Cancel</button></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- End Main -->

  <?php include "footer.php" ?>

<?php
unset($_SESSION['nptitle']);
unset($_SESSION['npbody']);
unset($_SESSION['npimg']);
unset($_SESSION['nptag']);
?>

</body>
</html>
