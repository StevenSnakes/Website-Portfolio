<!-- <div id="wrapper" class="wrapper-content">
  <div>
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <button class="btn-menu btn btn-toggle-menu" type="button" id="button3">
              <i class="fa fa-bars"></i>
          </button>
            <li class="sidebar-brand">
                <a href="index.php">
                    Boostrap.com
                </a>
            </li>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="posts.php">Posts</a>
            </li>
            <li>
                <a href="forum.php">Forum</a>
            </li>
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="profile.php">Profile</a>
            </li>
            <li>
              <a href="new.signup.php">Sign Up</a>
            </li>
            <li>
              <a href="new.signin.php">Sign In</a>
            </li>
            <li>
              <a href="new.posts.php">Create-A-Post</a>
            </li>

        </ul>
    </div>
</div> -->
<!-- End Sidebar -->

<!-- Light Mode or Dark Mode Check -->
<?php
if(isset($_COOKIE['lightvsdark'])){
  if($_COOKIE['lightvsdark'] == "dark"){ ?>
    <link href="style.dark.css" rel="stylesheet"> <?php
  }
}?>

<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="page-content-wrapper">
  <!-- <button class="btn-menu btn btn-toggle-menu" type="button" id="button2">
    <i class="fa fa-bars"></i>
  </button> -->
  <div class="container">
    <a class="navbar-brand" href="">Steven.J Portfolio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
        <li class="nav-item">
          <?php
          if($_SERVER['PHP_SELF'] == "/bs/index.php"){?>
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <?php
          } else{ ?>
            <a class="nav-link" href="index.php">Home</a>
            <?php
          } ?>
        </li>
        <?php if($_SERVER['PHP_SELF'] == "/bs/posts.php"){?>
          <a class="nav-link active" aria-current="page" href="posts.php">Posts</a>
          <?php
          } else{ ?>
          <a class="nav-link" href="posts.php">Posts</a>
          <?php
          } ?>
          <li class="nav-item">
            <?php
            $forum = $_SERVER['PHP_SELF'];
            $forum = substr($forum, 4, 5); ?>
            <?php if($forum == "forum"){?>
              <a class="nav-link active" aria-current="page" href="forum.php">Forum</a>
              <?php
            } else{ ?>
              <a class="nav-link" href="forum.php">Forum</a>
              <?php
            } ?>
          </li>
          <li class="nav-item">
            <?php
            include "config.php";
            $sqlac = "SELECT * FROM bs_profiles WHERE admin = 1";
            $resultac = mysqli_query($conn, $sqlac);
            while($rowac = mysqli_fetch_assoc($resultac)){
              $pac[] = $rowac;
            }
            if(isset($pac)){
              foreach($pac as $pac){
                if(isset($_SESSION['email'])){
                  if($_SESSION['email'] == $pac['email']){
                    if($_SERVER['PHP_SELF'] == "/bs/dashboard.php"){ ?>
                      <a class="nav-link active" aria-current="page" href="dashboard.php?type=users">Dashboard</a>
                      <?php
                    } else{ ?>
                      <a class="nav-link" href="dashboard.php?type=users">Dashboard</a>
                      <?php
                    }
                  }
                }
                if(isset($_SESSION['user_email_address'])){
                  if($_SESSION['user_email_address'] == $pac['email']){
                    if($_SERVER['PHP_SELF'] == "/bs/dashboard.php"){ ?>
                      <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                      <?php
                    } else{ ?>
                      <a class="nav-link" href="dashboard.php">Dashboard</a>
                      <?php
                    }
                  }
                }
              }
            }
            ?>
          </li>
          <li class="nav-item">
            <?php if($_SERVER['PHP_SELF'] == "/bs/profile.php"){?>
              <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
              <?php
            } else{ ?>
              <a class="nav-link" href="profile.php">Profile</a>
              <?php
            } ?>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
          <li class="nav-item dropdown">
            <?php if(isset($_SESSION['access_token']) || isset($_SESSION['email'])) { ?>
              <?php
              if(isset($_SESSION['email'])){
                $headersql = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['email']."'";
                $headerresult = mysqli_query($conn, $headersql);
                while($headerrow = mysqli_fetch_assoc($headerresult)){
                  $header[] = $headerrow;
                }
                foreach($header as $header){}
              }
              if(isset($_SESSION['access_token'])){
                $headersql = "SELECT * FROM bs_profiles WHERE email = '".$_SESSION['access_token']."'";
                $headerresult = mysqli_query($conn, $headersql);
                while($headerrow = mysqli_fetch_assoc($headerresult)){
                  $header[] = $headerrow;
                }
                foreach($header as $header){}
              }
              ?>
              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $header['name'] . "&nbsp;&nbsp;&nbsp;" ?><i class="fa fa-user"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a href="new.posts.php" class="dropdown-item"><i class="bi bi-question-circle"></i> Create-A-Post</a>
                  <a href="logout.php" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> SignOut</a>
                </ul>
              </li>
              <?php
              }else{ ?>
              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a href="new.signup.php" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> SignUp</a>
                  <a href="new.signin.php" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> SignIn</a>
                </ul>
              </li>
              <?php
            } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
