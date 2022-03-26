<?php session_start(); ?>
<?php
include "gconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Landing</title>
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
    <div class="blog-single gray-bg">
            <div class="container">
              <?php if(isset($_GET['msg'])){ ?>
                <div class="panel-body">
                  <div class="alert alert-info">
                      <center><?= $_GET['msg']; ?>!
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></center>
                    </div>
                </div>
              <?php } ?>
                <div class="row align-items-start">
                    <div class="col-lg-8 m-15px-tb">
                        <article class="article">
                            <div class="article-img">
                                <img src="https://via.placeholder.com/800x350/87CEFA/000000" title="" alt="">
                            </div>
                            <div class="article-title">
                                <h6><a href="#">Lifestyle</a></h6>
                                <h2>They Now Bade Farewell To The Kind But Unseen People</h2>
                                <div class="media">
                                    <div class="avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                    </div>
                                    <div class="media-body">
                                        <label>Steven Jacobsen</label>
                                        <span>01 Nov 2021</span>
                                    </div>
                                </div>
                            </div>
                            <div class="article-content">
                                <p>Aenean eleifend ante maecenas pulvinar montes lorem et pede dis dolor pretium donec dictum. Vici consequat justo enim. Venenatis eget adipiscing luctus lorem. Adipiscing veni amet luctus enim sem libero tellus viverra venenatis aliquam. Commodo natoque quam pulvinar elit.</p>
                                <p>Eget aenean tellus venenatis. Donec odio tempus. Felis arcu pretium metus nullam quam aenean sociis quis sem neque vici libero. Venenatis nullam fringilla pretium magnis aliquam nunc vulputate integer augue ultricies cras. Eget viverra feugiat cras ut. Sit natoque montes tempus ligula eget vitae pede rhoncus maecenas consectetuer commodo condimentum aenean.</p>
                                <h4>What are my payment options?</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <p class="blockquote-footer">Someone famous in <cite title="Source Title">Dick Grayson</cite></p>
                                </blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="nav tag-cloud">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Travel</a>
                                <a href="#">Web Design</a>
                                <a href="#">Marketing</a>
                                <a href="#">Research</a>
                                <a href="#">Managment</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 m-15px-tb blog-aside">

                        <!-- Author -->
                        <div class="widget widget-author">
                            <div class="widget-title">
                                <h3>Author</h3>
                            </div>
                            <div class="widget-body">
                                <div class="media align-items-center">
                                    <div class="avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6>Hello, I'm<br> Steven Jacobsen</h6>
                                    </div>
                                </div>
                                <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores</p>
                            </div>
                        </div>
                        <!-- End Author -->

                        <!-- Trending Post -->
                        <div class="widget widget-post">
                            <div class="widget-title">
                                <h3>Trending Now</h3>
                            </div>
                            <div class="widget-body">

                            </div>
                        </div>
                        <!-- End Trending Post -->

                        <!-- Latest Post -->
                        <div class="widget widget-latest-post">
                            <div class="widget-title">
                                <h3>Latest Post</h3>
                            </div>
                            <div class="widget-body">
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="name" href="#">
                                                Rachel Roth
                                            </a>
                                            <a class="date" href="#">
                                                26 FEB 2020
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right">
                                        <a href="#">
                                            <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="name" href="#">
                                                Rachel Roth
                                            </a>
                                            <a class="date" href="#">
                                                26 FEB 2020
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right">
                                        <a href="#">
                                            <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="name" href="#">
                                                Rachel Roth
                                            </a>
                                            <a class="date" href="#">
                                                26 FEB 2020
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right">
                                        <a href="#">
                                            <img src="https://via.placeholder.com/400x200/FFB6C1/000000" title="" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Latest Post -->

                        <!-- widget Tags -->
                        <div class="widget widget-tags">
                            <div class="widget-title">
                                <h3>Latest Tags</h3>
                            </div>
                            <div class="widget-body">
                                <div class="nav tag-cloud">
                                    <a href="#">Design</a>
                                    <a href="#">Development</a>
                                    <a href="#">Travel</a>
                                    <a href="#">Web Design</a>
                                    <a href="#">Marketing</a>
                                    <a href="#">Research</a>
                                    <a href="#">Managment</a>
                                </div>
                            </div>
                        </div>
                        <!-- End widget Tags -->

                    </div>
                </div>
                <div class="contact-form article-comment">
                    <h4>Leave a Reply</h4>
                    <form id="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Email" id="email" placeholder="Email *" class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="send">
                                    <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    <!-- End Main -->

<?php include "footer.php" ?>

</body>
</html>
