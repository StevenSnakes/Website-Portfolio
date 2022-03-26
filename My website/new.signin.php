<?php
  //Include Google Configuration File
  // include('gconfig.php');

  if(isset($_SESSION['access_token']) || isset($_SESSION['email'])) {
   header("location: index.php");
 } else {
   //Create a URL to obtain user authorization
   // $google_login_btn = '<a href="'.$google_client->createAuthUrl().'"><img src="//www.tutsmake.com/wp-content/uploads/2019/12/google-login-image.png" /></a>';
  }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login</title>
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
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
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

         <!-- Login -->
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
         <div class="login-container animated fadeInDown bootstrap snippets bootdeys">
            <div class="loginbox bg-white">

               <div class="loginbox-title">SIGN IN</div>
               <div class = 'col-10 mx-auto mb-2 mt-2'>
                  <?php if(isset($_GET['msg'])){ ?>
                    <div class="alert alert-danger" role="alert">
                       <?= $_GET['msg']; ?>
                    </div>
                  <?php } ?>
               </div>
               <div class="loginbox-social">
                  <div class="social-title ">Sign In With A Google Account</div>
                  <div class="social-buttons">
                    <?php
                     // echo '<div align="center">'.$google_login_btn . '</div>';
                    ?>
                  </div>
               </div>
               <div class="loginbox-or">
                  <div class="or-line"></div>
                  <div class="or">OR</div>
               </div>
               <form action="new.login.php" method="post" enctype="multipart/form-data">
                  <div class="loginbox-textbox">
                     <input name="email" type="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="loginbox-textbox">
                     <input name="password" type="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="loginbox-forgot">
                     <a href="">Forgot Password?</a>
                  </div>
                  <div class="loginbox-submit">
                     <button class="btn btn-primary btn-block" href="#login.php">Login</button>
                  </div>
                  <div class="loginbox-signup">
                     <a href="new.signup.php">Sign Up With Email</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Login End -->

      <?php include "footer.php" ?>

   </body>
</html>
