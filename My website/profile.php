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


</style>
<body>
  <!-- Header -->
  <?php include "header.php" ?>

  <!-- Main Content -->
  <?php
    include "config.php";

  if(isset($_SESSION['email']) || isset($_SESSION['access_token']) || isset($_SESSION['searchuser'])) {
  include "config.php";

  if(isset($_SESSION['searchuser'])){
    $sql = "SELECT * FROM bs_posts WHERE post_email = '".$_SESSION['searchuser']."' ORDER BY post_id DESC LIMIT 3";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
      $p[] = $row;
    }

    $sqlp = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['searchuser']."'";
  } else{
  if(isset($_SESSION['email'])){
    $sql = "SELECT * FROM bs_posts WHERE post_email = '".$_SESSION['email']."' ORDER BY post_id DESC LIMIT 3";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
      $p[] = $row;
    }
    $sqlavatar = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['email']."'";

    $resultavatar = mysqli_query($conn, $sqlavatar);

    while($rowavatar = mysqli_fetch_assoc($resultavatar)){
      $pavatar[] = $rowavatar;
    }
    foreach($pavatar as $savatar){
      $_SESSION['avatar'] = $savatar['avatar'];
    }
    $isset = 1;
  $sqlp = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['email']."'";
} elseif(isset($_SESSION['access_token'])){
  $sql = "SELECT * FROM bs_posts WHERE post_email = '".$_SESSION['user_email_address']."' ORDER BY post_id DESC LIMIT 3";

  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)){
    $p[] = $row;
  }

  $isset = 1;
  $sqlp = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['user_email_address']."'";
}
}
  $resultp = mysqli_query($conn, $sqlp);
  while($rowp = mysqli_fetch_assoc($resultp)){
    $pp[] = $rowp;
  }
  foreach($pp as $pp){
    $name = $pp['name'];
    $aboutme = $pp['about_me'];
    $email = $pp['email'];
    $avatar = $pp['avatar'];
  }
}

if(isset($email)) {
  if($email == "nameisnotseterror"){
    header("location: profile.php");
  } else {
?>
<div class="blog-single gray-bg">
  <div class="container">
      <div class="row">
          <div class="col-xl-5">
              <div class="card">
                  <div class="card-body">
                    <?php if(isset($isset)){ ?>
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="edit.account.php" class="dropdown-item">Edit Account</a>
                            <?php if(isset($_COOKIE['lightvsdark'])){ if($_COOKIE['lightvsdark'] == "light") { ?>
                            <a href="lightordark.php?mode=dark" class="dropdown-item" name="dark" type="POST">Dark Mode</a>
                            <?php } } ?>
                            <?php if(!isset($_COOKIE['lightvsdark'])){ ?>
                              <a href="lightordark.php?mode=dark" class="dropdown-item" name="dark" type="POST">Dark Mode</a>
                            <?php } ?>
                            <?php if(isset($_COOKIE['lightvsdark'])){ if($_COOKIE['lightvsdark'] == "dark"){ ?>
                            <a href="lightordark.php?mode=light" class="dropdown-item" name="light" type="POST">Light Mode</a>
                            <?php } } ?>
                        </div>
                    </div>
                  <?php } ?>
                      <div class="d-flex align-items-start">
                          <img src="<?php echo $avatar ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                          <div class="w-100 ms-3">
                            <?php if($name == ""){ ?>
                              <h4 class="my-0"><?php echo ucwords($email) ?></h4>
                            <?php } else { ?>
                              <h4 class="my-0"><?php echo ucwords($name) ?></h4>
                            <?php } ?>
                          </div>
                      </div>
                      <div class="mt-3">
                          <h4 class="font-13 text-uppercase">About Me :</h4>
                          <p class="user-text font-13 mb-3">
                              <?php echo ucwords($aboutme) ?>
                          </p>
                          <p class="text-uppercase mb-2 font-13">Name :<span class="ms-2 user-text"><?php echo ucwords($name) ?></span></p>
                          <p class="text-uppercase mb-2 font-13">Email :<span class="ms-2 user-text"><?php echo $email ?></span></p>
                      </div>
                  </div>
              </div>

              <!-- end card -->
              <div class="card">
                <div class="blog-aside">
                  <div class="list-group">
                    <div>
                      <div class="widget-title">
                        <?php
                        if(mysqli_num_rows($result) > 0){

                          foreach($p as $m){

                            $k = $m['post_json'];
                            $k = json_decode($k, true);

                            }?>
                            <h3>Users Latest Posts</h3>
                       </div>
                       <div class="widget-body">
                        <?php foreach($p as $m){
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
                        $k = json_decode($k, true);
                        ?>
                        <div class="latest-post-aside media">
                          <div class="lpa-left media-body test">
                            <div class="lpa-title">
                              <h5><a href='post.view.php?id=<?php echo $m["post_id"] ?>'><?php echo $k['title'] ?></a></h5>
                            </div>
                            <div class="lpa-meta">
                              <a class="name" href="post.view.php?id=<?php echo $m["post_id"] ?>">
                                <?php echo $author; ?>
                              </a>
                              <a class="date" href="post.view.php?id=<?php echo $m["post_id"] ?>">
                                <?php echo $k['date']; ?>
                              </a>
                            </div>
                          </div>
                          <div class="lpa-right">
                          <div class="mediaimg">
                            <a href="post.view.php?id=<?php echo $m["post_id"] ?>">
                              <img src="<?php echo $k['img']; ?>" class="center-img">
                            </a>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="widget-loadmore text-center">
                      <a href="userposts.php?user=<?php echo $m['post_email'] ?>">See All Post By This User</a>
                    </div>
                    <?php } else { ?>
                    <div class="latest-post-aside media">
                      <div class="lpa-left media-body">
                        <div class="lpa-title">
                          <center>
                            <h5><a>This User Hasn't Made Any Posts</a></h5>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="blog-aside">
              <div class="list-group">
                <div class="widget-title">
                  <h3>Team Members</h3>
                </div>
                <div class="widget-body">
                  <?php
                  $sqlmember = "SELECT * FROM bs_profiles ORDER BY RAND() LIMIT 5";

                  $resultmember = mysqli_query($conn, $sqlmember);
                  while($rowmember = mysqli_fetch_assoc($resultmember)){
                    $member[] = $rowmember;
                  }
                  foreach($member as $member){
                  if($member['name'] == ""){ ?>
                    <a href="profile.search.php?email=<?php echo $member['email'] ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex align-items-center pb-1" id="tooltips-container">
                      <img src="<?php echo $member['avatar'] ?>" class="rounded-circle img-fluid avatar-md img-thumbnail" alt="">
                      <div class="w-100 ms-2">
                        <h5 class="mb-1"><?php echo $member['email'] ?><i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                      </div>
                      <i class="mdi mdi-chevron-right h2"></i>
                    </div>
                    </a>
                  <?php } else { ?>
                  <a href="profile.search.php?email=<?php echo $member['email'] ?>" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center pb-1" id="tooltips-container">
                    <img src="<?php echo $member['avatar'] ?>" class="rounded-circle img-fluid avatar-md img-thumbnail" alt="">
                    <div class="w-100 ms-2">
                      <h5 class="mb-1"><?php echo $member['name'] ?><i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                    </div>
                    <i class="mdi mdi-chevron-right h2"></i>
                  </div>
                  </a>
                  <?php } ?>
                  <?php } ?>
                </div>
                <div class="widget-loadmore text-center">
                  <input type="hidden" id="result_no" value="2">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end col-->
          <div class="col-xl-7">
            <div class="card blog-aside">
              <div class="widget-body">
                <?php if(isset($_GET['searcherror'])){ ?>
                <div class="alert alert-danger">
                  <center><?= $_GET['searcherror']; ?>!
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></center>
                </div>
                <?php } ?>
                <form action="profile.search.php" method="post">
                  <div class="media">
                    <input type="text" placeholder="Search For User!" name="search" class="form-control">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light searchsummbit">SEARCH</button>
                  </div>
                </form>
              </div>
            </div>


              <div class="card">
                  <div class="card-body">
                      <!-- comment box -->
                      <?php if(isset($_GET['commenterror'])){ ?>
                          <div class="alert alert-danger">
                              <center><?= $_GET['commenterror']; ?>!
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></center>
                            </div>
                      <?php } ?>

                      <form method="post" action="profile.comment.php?base=None&profile=<?php echo $email; ?>" class="comment-area-box mb-3" enctype=”multipart/form-data”>
                        <?php if(!isset($_SESSION['access_token']) and !isset($_SESSION['email'])) { ?>
                          <span class="input-icon">
                              <input name="comment" rows="3" class="form-control" placeholder='Sign In To Comment' READONLY></input>
                          </span>
                        <?php } else { ?>
                          <span class="input-icon">
                              <textarea name="comment" rows="3" class="form-control" placeholder='Write Your Comment...'></textarea>
                          </span>
                          <div class="comment-area-btn">
                              <div class="float-end">
                                  <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                              </div>
                              <div>
                                  <a class="btn btn-sm"><i class="fa"></i></a>
                              </div>
                          </div>
                        <?php } ?>
                      </form>
                      <!-- end comment box -->

                      <!-- Story Box-->
                      <?php
                      $commentsql = "SELECT * FROM bs_profile_comments WHERE comment_reserver = '$email' AND comment_perent_id IS NULL ORDER BY comment_date DESC";
                      $resultcomment = mysqli_query($conn, $commentsql);

                      if(mysqli_num_rows($resultcomment) > 0){

                      while($rowcomment = mysqli_fetch_assoc($resultcomment)){
                      	$commentprofile[] = $rowcomment;
                      }

                      foreach($commentprofile as $cp){
                      	$idcomment = $cp['comment_id'];
                      	$authorcomment = $cp['comment_author'];
                      	$commentcomment = $cp['comment'];
                      	$commentdate = $cp['comment_date'];
                      	$commentor = $cp['comment_reserver'];
                      	$perentcomment = $cp['comment_perent_id'];

                      	if($cp['comment_likes'] == ""){
                      		$likescomment = 0;
                      	} else {
                      		$likescomment = $cp['comment_likes'];
                      	}

                      	$seconds_ago = (time() - strtotime($cp['comment_date']));

                      	if ($seconds_ago >= 31536000) {
                      		$commentdate =  intval($seconds_ago / 31536000) . " years ago";
                      	} elseif ($seconds_ago >= 2419200) {
                      		$commentdate = intval($seconds_ago / 2419200) . " months ago";
                      	} elseif ($seconds_ago >= 86400) {
                      		$commentdate = intval($seconds_ago / 86400) . " days ago";
                      	} elseif ($seconds_ago >= 3600) {
                      		$commentdate = intval($seconds_ago / 3600) . " hours ago";
                      	} elseif ($seconds_ago >= 60) {
                      		$commentdate = intval($seconds_ago / 60) . " minutes ago";
                      	} else {
                      		$commentdate = "less than a minute ago";
                      	}

                      	$sqlprofilecomment = "SELECT * FROM bs_profiles WHERE email = '$authorcomment'";
                      	$resultprofilecomment = mysqli_query($conn, $sqlprofilecomment);

                      	while($rowprofilecomment = mysqli_fetch_assoc($resultprofilecomment)){
                      		$profilecomment[] = $rowprofilecomment;
                      	}
                      	foreach($profilecomment as $pc){
                      		$avatarpc = $pc['avatar'];
                      		$namepc = $pc['name'];
                          if($namepc == ""){
                            $namepc = $pc['email'];
                          }
                      	}

                      	?>
                      <div class="comments p-2 mb-3">
                      		<div class="d-flex align-items-start">
                      				<img class="me-2 avatar-sm rounded-circle rounded-circle avatar-lg img-thumbnail" src="<?php echo $avatarpc ?>" alt="Generic placeholder image">
                      				<div class="w-100">
                      						<h5 class=""><?php echo $namepc ?>  <small class="text-muted"> <?php echo $commentdate ?></small></h5>
                      						<div class="">
                      							<?php echo $commentcomment ?>
                      								<br>
                                      <?php
                                      $sqlpcl = "SELECT * FROM bs_did_like WHERE comment_id = '$idcomment' AND user = '$email'";

                                      $resultpcl = mysqli_query($conn, $sqlpcl);
                                      while($rowpcl = mysqli_fetch_assoc($resultpcl)){
                                        $pcl[] = $rowpcl;
                                      }
                                      if(mysqli_num_rows($resultpcl) > 0){
                                      foreach($pcl as $pcl){
                                      }
                                      }
                                      if($email != "nameisnotseterror"){
                                      if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){
                                      if(!isset($pcl['liked'])){?>
                      								<a href="profile.comment.like.php?id=<?php echo $idcomment; ?>&like=1" class="font-13 textdanger">Like (<?php echo $likescomment; ?>)</a>
                                      <?php }
                                      if(isset($pcl['liked'])){
                                      if($pcl['liked'] == 0 && $idcomment == $pcl['comment_id']){?>
                                      <a href="profile.comment.like.php?id=<?php echo $idcomment; ?>&like=0" class="font-13 textdanger">Liked (<?php echo $likescomment; ?>)</a>
                                      <?php } elseif($pcl['liked'] == 1 && $idcomment == $pcl['comment_id']){?>
                                      <a href="profile.comment.like.php?id=<?php echo $idcomment; ?>&like=1" class="font-13 textdanger">Like (<?php echo $likescomment; ?>)</a>
                                      <?php } else{ ?>
                                      <a href="profile.comment.like.php?id=<?php echo $idcomment; ?>&like=1" class="font-13 textdanger">Like (<?php echo $likescomment; ?>)</a>
                                      <?php } ?>
                                      <?php } ?>
                                      <?php } ?>
                                      <?php } ?>
                                      <div>
                                      <?php if(isset($_SESSION['avatar'])){ ?>
                      								<form method="post" action="profile.comment.php?base=<?php echo $idcomment ?>&profile=<?php echo $email; ?>" class="d-flex align-items-start mt-2" enctype=”multipart/form-data”>
                                          <a class="pe-2" href="#">
                      										<img src="<?php echo $_SESSION['avatar'] ?>" class="rounded-circle img-thumbnail-ex-sm" alt="Generic placeholder image" height="31">
                      									</a>
                      								<div class="w-100">
                      									<input name="comment" type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                      								</div>
                      								<div class="float-end">
                      									<button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                      								</div>
                      							</form>
                                    <?php } ?>
                                  </div>

                      						</div>
                      				</div>
                      		</div>
                      		<?php
                      		$subcommentsql = "SELECT * FROM bs_profile_comments WHERE comment_perent_id= '".$idcomment."' AND comment_sub_reply IS NULL ORDER BY comment_date DESC";
                      		$subresultcomment = mysqli_query($conn, $subcommentsql);

                      		if(mysqli_num_rows($subresultcomment) > 0){

                      		while($subrowcomment = mysqli_fetch_assoc($subresultcomment)){
                      			$subcommentprofile[] = $subrowcomment;
                      		}

                      		foreach($subcommentprofile as $subcp){
                      			$subcpidcomment = $subcp['comment_id'];
                      			$subcpauthorcomment = $subcp['comment_author'];
                      			$subcpcommentcomment = $subcp['comment'];
                      			$subcpcommentdate = $subcp['comment_date'];
                      			$subcpcommentor = $subcp['comment_reserver'];
                      			$subcpperentcomment = $subcp['comment_perent_id'];

                      			if($idcomment == $subcpperentcomment){
                      			if($subcp['comment_likes'] == ""){
                      				$subcplikescomment = 0;
                      			} else {
                      				$subcplikescomment = $subcp['comment_likes'];
                      			}

                      			$subcpseconds_ago = (time() - strtotime($subcp['comment_date']));

                      			if ($subcpseconds_ago >= 31536000) {
                      				$subcpcommentdate =  intval($subcpseconds_ago / 31536000) . " years ago";
                      			} elseif ($seconds_ago >= 2419200) {
                      				$subcpcommentdate = intval($subcpseconds_ago / 2419200) . " months ago";
                      			} elseif ($seconds_ago >= 86400) {
                      				$subcpcommentdate = intval($subcpseconds_ago / 86400) . " days ago";
                      			} elseif ($seconds_ago >= 3600) {
                      				$subcpcommentdate = intval($subcpseconds_ago / 3600) . " hours ago";
                      			} elseif ($seconds_ago >= 60) {
                      				$subcpcommentdate = intval($subcpseconds_ago / 60) . " minutes ago";
                      			} else {
                      				$subcpcommentdate = "less than a minute ago";
                      			}

                      			$subcpsqlprofilecomment = "SELECT * FROM bs_profiles WHERE email = '$subcpauthorcomment'";
                      			$subcpresultprofilecomment = mysqli_query($conn, $subcpsqlprofilecomment);

                      			while($subcprowprofilecomment = mysqli_fetch_assoc($subcpresultprofilecomment)){
                      				$subcpprofilecomment[] = $subcprowprofilecomment;
                      			}
                      			foreach($subcpprofilecomment as $subcppc){
                      				$subcpavatarpc = $subcppc['avatar'];
                      				$subcpnamepc = $subcppc['name'];
                              if($subcpnamepc == ""){
                                $subcpnamepc = $subcppc['email'];
                              }
                      			} ?>
                      		<div class="comments post-user-comment-box">
                      				<div class="d-flex align-items-start">
                      						<div class="me-2 avatar-sm rounded-circle">
                      						</div>
                      							<a class="pe-2" href="#">
                      								<img src="<?php echo $subcpavatarpc ?>" class="me-2 avatar-sm rounded-circle rounded-circle avatar-lg img-thumbnail" alt="Generic placeholder image">
                      							</a>
                      						<div class="w-100">
                      							<h5 class="mt-0"><?php echo $subcpnamepc ?> <small class="text-muted"><?php echo $subcpcommentdate ?></small></h5>
                      							<?php echo $subcpcommentcomment ?>
                      							<br>
                                    <?php
                                    $sqlpcl = "SELECT * FROM bs_did_like WHERE comment_id = '$subcpidcomment' AND user = '$email'";

                                    $resultpcl = mysqli_query($conn, $sqlpcl);
                                    while($rowpcl = mysqli_fetch_assoc($resultpcl)){
                                      $pcl[] = $rowpcl;
                                    }
                                    if(mysqli_num_rows($resultpcl) > 0){
                                    foreach($pcl as $pcl){
                                    }
                                    }
                                    if($email != "nameisnotseterror"){
                                    if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){
                                    if(!isset($pcl['liked'])){?>
                                    <a href="profile.comment.like.php?id=<?php echo $subcpidcomment; ?>&like=1" class="font-13 textdanger">Like (<?php echo $subcplikescomment; ?>)</a>
                                    <?php }
                                    if(isset($pcl['liked'])){
                                    if($pcl['liked'] == 0 && $subcpidcomment == $pcl['comment_id']){?>
                                    <a href="profile.comment.like.php?id=<?php echo $subcpidcomment; ?>&like=0" class="font-13 textdanger">Liked (<?php echo $subcplikescomment; ?>)</a>
                                    <?php } elseif($pcl['liked'] == 1 && $subcpidcomment == $pcl['comment_id']){?>
                                    <a href="profile.comment.like.php?id=<?php echo $subcpidcomment; ?>&like=1" class="font-13 textdanger">Like (<?php echo $subcplikescomment; ?>)</a>
                                    <?php } else{ ?>
                                    <a href="profile.comment.like.php?id=<?php echo $subcpidcomment; ?>&like=0" class="font-13 textdanger">Like (<?php echo $subcplikescomment; ?>)</a>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                      						</div>
                      				</div>
                              <?php if(isset($_SESSION['avatar'])){ ?>
                      				<form method="post" action="profile.comment.php?base=<?php echo $subcpidcomment ?>&profile=<?php echo $email; ?>&issubreply=yes" class="d-flex align-items-start mt-2" enctype=”multipart/form-data”>
                      					<a class="pe-2" href="#">
                      						<img src="<?php echo $_SESSION['avatar'] ?>" class="rounded-circle img-thumbnail-ex-sm" alt="Generic placeholder image" height="31">
                      					</a>
                      				<div class="w-100">
                      					<input name="comment" type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                      				</div>
                      				<div class="float-end">
                      					<button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                      				</div>
                      			  </form>
                              <?php }
                            $subcommentsql2 = "SELECT * FROM bs_profile_comments WHERE comment_sub_reply= 1 AND comment_perent_id= '".$subcpidcomment."'";
                            $subresultcomment2 = mysqli_query($conn, $subcommentsql2);

                            if(mysqli_num_rows($subresultcomment2) > 0){

                            while($subrowcomment2 = mysqli_fetch_assoc($subresultcomment2)){
                              $subcommentprofile2[] = $subrowcomment2;
                            }

                            foreach($subcommentprofile2 as $subcp2){
                              $subcpidcomment2 = $subcp2['comment_id'];
                              $subcpauthorcomment2 = $subcp2['comment_author'];
                              $subcpcommentcomment2 = $subcp2['comment'];
                              $subcpcommentdate2 = $subcp2['comment_date'];
                              $subcpcommentor2 = $subcp2['comment_reserver'];
                              $subcpperentcomment2 = $subcp2['comment_perent_id'];

                              if($idcomment == $subcpperentcomment){
                              if($subcp2['comment_likes'] == ""){
                                $subcplikescomment2 = 0;
                              } else {
                                $subcplikescomment2 = $subcp2['comment_likes'];
                              }

                              $subcpseconds_ago2 = (time() - strtotime($subcp2['comment_date']));

                              if ($subcpseconds_ago2 >= 31536000) {
                                $subcpcommentdate2 =  intval($subcpseconds_ago2 / 31536000) . " years ago";
                              } elseif ($subcpseconds_ago2 >= 2419200) {
                                $subcpcommentdate2 = intval($subcpseconds_ago2 / 2419200) . " months ago";
                              } elseif ($subcpseconds_ago2 >= 86400) {
                                $subcpcommentdate2 = intval($subcpseconds_ago2 / 86400) . " days ago";
                              } elseif ($subcpseconds_ago2 >= 3600) {
                                $subcpcommentdate2 = intval($subcpseconds_ago2 / 3600) . " hours ago";
                              } elseif ($subcpseconds_ago2 >= 60) {
                                $subcpcommentdate2 = intval($subcpseconds_ago2 / 60) . " minutes ago";
                              } else {
                                $subcpcommentdate2 = "less than a minute ago";
                              }

                              $subcpsqlprofilecomment2 = "SELECT * FROM bs_profiles WHERE email = '$subcpauthorcomment2'";
                              $subcpresultprofilecomment2 = mysqli_query($conn, $subcpsqlprofilecomment2);

                              while($subcprowprofilecomment2 = mysqli_fetch_assoc($subcpresultprofilecomment2)){
                                $subcpprofilecomment2[] = $subcprowprofilecomment2;
                              }
                              foreach($subcpprofilecomment2 as $subcppc2){
                                $subcpavatarpc2 = $subcppc2['avatar'];
                                $subcpnamepc2 = $subcppc2['name'];
                                if($subcpnamepc2 == ""){
                                  $subcpnamepc2 = $subcppc2['email'];
                                }
                              } ?>
                            <div class="post-user-comment-box">
                                <div class="d-flex align-items-start">
                                    <div class="me-2 avatar-sm rounded-circle">
                                    </div>
                                      <a class="pe-2" href="#">
                                        <img src="<?php echo $subcpavatarpc2 ?>" class="me-2 avatar-sm rounded-circle rounded-circle avatar-lg img-thumbnail" alt="Generic placeholder image">
                                      </a>
                                    <div class="w-100">
                                      <h5 class="mt-0"><?php echo $subcpnamepc2 ?> <small class="text-muted"><?php echo $subcpcommentdate2 ?></small></h5>
                                      <?php echo $subcpcommentcomment2 ?>
                                      <br>
                                      <?php
                                      $sqlpcl = "SELECT * FROM bs_did_like WHERE comment_id = '$subcpidcomment2' AND user = '$email'";

                                      $resultpcl = mysqli_query($conn, $sqlpcl);
                                      while($rowpcl = mysqli_fetch_assoc($resultpcl)){
                                        $pcl[] = $rowpcl;
                                      }
                                      if(mysqli_num_rows($resultpcl) > 0){
                                      foreach($pcl as $pcl){
                                      }
                                      }
                                      if($email != "nameisnotseterror"){
                                      if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){
                                      if(!isset($pcl['liked'])){?>
                                      <a href="profile.comment.like.php?id=<?php echo $subcpidcomment2; ?>&like=1" class="font-13 textdanger">Like (<?php echo $subcplikescomment2; ?>)</a>
                                      <?php }
                                      if(isset($pcl['liked'])){
                                      if($pcl['liked'] == 0 && $subcpidcomment2 == $pcl['comment_id']){?>
                                      <a href="profile.comment.like.php?id=<?php echo $subcpidcomment2; ?>&like=0" class="font-13 textdanger">Liked (<?php echo $subcplikescomment2; ?>)</a>
                                      <?php } elseif($pcl['liked'] == 1 && $subcpidcomment2 == $pcl['comment_id']){?>
                                      <a href="profile.comment.like.php?id=<?php echo $subcpidcomment2; ?>&like=1" class="font-13 textdanger">Like (<?php echo $subcplikescomment2; ?>)</a>
                                      <?php } else{ ?>
                                      <a href="profile.comment.like.php?id=<?php echo $subcpidcomment2; ?>&like=0" class="font-13 textdanger">Like (<?php echo $subcplikescomment2; ?>)</a>
                                      <?php } ?>
                                      <?php } ?>
                                      <?php } ?>
                                      <?php } ?>
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['avatar'])){ ?>
                                <form method="post" action="profile.comment.php?base=<?php echo $subcpidcomment2 ?>&profile=<?php echo $email; ?>&issubreply=yes" class="d-flex align-items-start mt-2" enctype=”multipart/form-data”>
                                  <a class="pe-2" href="#">
                                    <img src="<?php echo $_SESSION['avatar'] ?>" class="rounded-circle img-thumbnail-ex-sm" alt="Generic placeholder image" height="31">
                                  </a>
                                <div class="w-100">
                                  <input name="comment" type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                </div>
                                <div class="float-end">
                                  <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                </div>
                              </form>
                              <?php }
                              $subcommentsql3 = "SELECT * FROM bs_profile_comments WHERE comment_sub_reply= 1 AND comment_perent_id= '".$subcpidcomment2."'";
                              $subresultcomment3 = mysqli_query($conn, $subcommentsql3);

                              if(mysqli_num_rows($subresultcomment3) > 0){

                              while($subrowcomment3 = mysqli_fetch_assoc($subresultcomment3)){
                                $subcommentprofile3[] = $subrowcomment3;
                              }

                              foreach($subcommentprofile3 as $subcp3){
                                $subcpidcomment3 = $subcp3['comment_id'];
                                $subcpauthorcomment3 = $subcp3['comment_author'];
                                $subcpcommentcomment3 = $subcp3['comment'];
                                $subcpcommentdate3 = $subcp3['comment_date'];
                                $subcpcommentor3 = $subcp3['comment_reserver'];
                                $subcpperentcomment3 = $subcp3['comment_perent_id'];

                                if($subcpidcomment == $subcpperentcomment2){

                                if($subcp3['comment_likes'] == ""){
                                  $subcplikescomment3 = 0;
                                } else {
                                  $subcplikescomment3 = $subcp3['comment_likes'];
                                }

                                $subcpseconds_ago3 = (time() - strtotime($subcp3['comment_date']));

                                if ($subcpseconds_ago3 >= 31536000) {
                                  $subcpcommentdate3 =  intval($subcpseconds_ago3 / 31536000) . " years ago";
                                } elseif ($subcpseconds_ago3 >= 2419200) {
                                  $subcpcommentdate3 = intval($subcpseconds_ago3 / 2419200) . " months ago";
                                } elseif ($subcpseconds_ago3 >= 86400) {
                                  $subcpcommentdate3 = intval($subcpseconds_ago3 / 86400) . " days ago";
                                } elseif ($subcpseconds_ago3 >= 3600) {
                                  $subcpcommentdate3 = intval($subcpseconds_ago3 / 3600) . " hours ago";
                                } elseif ($subcpseconds_ago3 >= 60) {
                                  $subcpcommentdate3 = intval($subcpseconds_ago3 / 60) . " minutes ago";
                                } else {
                                  $subcpcommentdate3 = "less than a minute ago";
                                }

                                $subcpsqlprofilecomment3 = "SELECT * FROM bs_profiles WHERE email = '$subcpauthorcomment3'";
                                $subcpresultprofilecomment3 = mysqli_query($conn, $subcpsqlprofilecomment3);

                                while($subcprowprofilecomment3 = mysqli_fetch_assoc($subcpresultprofilecomment3)){
                                  $subcpprofilecomment3[] = $subcprowprofilecomment3;
                                }
                                foreach($subcpprofilecomment3 as $subcppc3){
                                  $subcpavatarpc3 = $subcppc3['avatar'];
                                  $subcpnamepc3 = $subcppc3['name'];
                                  if($subcpnamepc3 == ""){
                                    $subcpnamepc3 = $subcppc3['email'];
                                  }
                                } ?>
                              <div class="post-user-comment-box">
                                  <div class="d-flex align-items-start">
                                      <div class="me-2 avatar-sm rounded-circle">
                                      </div>
                                        <a class="pe-2" href="#">
                                          <img src="<?php echo $subcpavatarpc3 ?>" class="me-2 avatar-sm rounded-circle rounded-circle avatar-lg img-thumbnail" alt="Generic placeholder image">
                                        </a>
                                      <div class="w-100">
                                        <h5 class="mt-0"><?php echo $subcpnamepc3 ?> <small class="text-muted"><?php echo $subcpcommentdate3 ?></small></h5>
                                        <?php echo $subcpcommentcomment3 ?>
                                        <br>
                                        <?php
                                        $sqlpcl = "SELECT * FROM bs_did_like WHERE comment_id = '$subcpidcomment3' AND user = '$email'";

                                        $resultpcl = mysqli_query($conn, $sqlpcl);
                                        while($rowpcl = mysqli_fetch_assoc($resultpcl)){
                                          $pcl[] = $rowpcl;
                                        }
                                        if(mysqli_num_rows($resultpcl) > 0){
                                        foreach($pcl as $pcl){
                                        }
                                        }
                                        if($email != "nameisnotseterror"){
                                        if(isset($_SESSION['email']) || isset($_SESSION['user_email_address'])){
                                        if(!isset($pcl['liked'])){?>
                                        <a href="profile.comment.like.php?id=<?php echo $subcpidcomment3; ?>&like=1" class="font-13 textdanger">Like (<?php echo $subcplikescomment3; ?>)</a>
                                        <?php }
                                        if(isset($pcl['liked'])){
                                        if($pcl['liked'] == 0 && $subcpidcomment3 == $pcl['comment_id']){?>
                                        <a href="profile.comment.like.php?id=<?php echo $subcpidcomment3; ?>&like=0" class="font-13 textdanger">Liked (<?php echo $subcplikescomment3; ?>)</a>
                                        <?php } elseif($pcl['liked'] == 1 && $subcpidcomment3 == $pcl['comment_id']){?>
                                        <a href="profile.comment.like.php?id=<?php echo $subcpidcomment3; ?>&like=1" class="font-13 textdanger">Like (<?php echo $subcplikescomment3; ?>)</a>
                                        <?php } else{ ?>
                                        <a href="profile.comment.like.php?id=<?php echo $subcpidcomment3; ?>&like=0" class="font-13 textdanger">Like (<?php echo $subcplikescomment3; ?>)</a>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                      </div>
                                  </div>
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>
                            </div>
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>
                      		</div>
                      	<?php } ?>
                      	<?php } ?>
                      </div>
                      <?php } ?>
                      </div>
                    <?php } ?>
                <?php } ?>


                <?php if(mysqli_num_rows($resultcomment) > 0){ ?>
                      <div class="widget-loadmore text-center">
                      		<a href="#">Load more</a>
                      </div>
                    <?php } ?>
                      </div>
                      </div> <!-- end card-->
                      </div> <!-- end col -->
                      </div>
                      <!-- end row-->
                      </div>
                      </div>
  <!-- End Main -->
<?php }
} else{
  // header("location: new.signin.php?msg=Please Login"); ?>
<center>
<div class="gray-bg">
  <div class="col-xl-7">
    <div class="blog-aside">
        <div class="list-group">
          <div class="card widget-latest-post">
            <div class="widget-body">
              <?php if(isset($_GET['searcherror'])){ ?>
                  <div class="alert alert-danger">
                      <center><?= $_GET['searcherror']; ?>!
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></center>
                    </div>
              <?php } ?>
                <form action="profile.search.php" method="post">
                  <div class="media">
                      <input type="text" placeholder="Search For User!" name="search" class="form-control">
                      <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light searchsummbit">SEARCH</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
</center>
<?php }
unset($_SESSION['searchuser']);
?>

  <?php include "footer.php" ?>

</body>
</html>
