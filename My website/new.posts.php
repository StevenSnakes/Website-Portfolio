<?php session_start(); ?>
<?php
// if(!isset($_SESSION['email']) && !isset($_SESSION['user_email_address'])){
//   header("location: new.signin.php?msg=Login First");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Creating Posts</title>
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
  <!-- Look at this https://www.w3schools.com/PHP/php_file_create.asp -->
  <!-- Look at this https://aarafacademy.com/upload-save-image-php-mysql/ -->
  <div class="blog-single gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <?php if(isset($_GET['error'])){ ?>
                  <div class="alert alert-danger">
                      <center><?= $_GET['error']; ?>!
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></center>
                    </div>
              <?php } ?>
              <center><h1>Create Post</h1></center>
                <form type="post" action="new.posts.preview.php" enctype=”multipart/form-data”>
                  <div class="form-group">
                  	<label for="title">Title</label>
                  	<input value="<?php if(isset($_SESSION['nptitle'])){echo $_SESSION['nptitle'];} ?>" type="text" class="form-control" name="title" required></input>
                  </div>
                  <div class="form-group">
                  	<label for="body">Main Body</label>
                  	<textarea id="body" rows="5" class="form-control" name="body" required><?php if(isset($_SESSION['npbody'])){echo $_SESSION['npbody'];} ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="img">Image</label>
                    <input value="<?php if(isset($_SESSION['npimg'])){echo $_SESSION['npimg'];} ?>" type="text" class="form-control" name="img" required></input>
                  </div>
                  <div class="form-group">
                    <label for="tags">Tags (Seprated by comma without space)</label>
                    <textarea class="form-control" name="tags" placeholder="example1,example2,example3" required><?php if(isset($_SESSION['nptag'])){echo $_SESSION['nptag'];} ?></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" onclick="$('form').attr('target', '_blank');">Preview</button>
                  	<a href="posts.php" ><button type="button" class="btn btn-default">Cancel</button></a>
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

<?php
unset($_SESSION['nptitle']);
unset($_SESSION['npbody']);
unset($_SESSION['npimg']);
unset($_SESSION['nptag']);
?>

</body>
</html>
