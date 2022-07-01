<?php
    require('includes/database.php');
    require('includes/function.php');
    
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/fav.png" />
  <!-- Author Meta -->
  <meta name="author" content="colorlib" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>Eclipse Education</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
  <!--
      CSS
      =============================================
    -->
  <link rel="stylesheet" href="css/linearicons.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/owl.carousel.css" />
  <link rel="stylesheet" href="css/nice-select.css">
  <link rel="stylesheet" href="css/hexagons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <!-- ================ Start Header Area ================= -->
  <?php
    include_once('includes/header.php')
  ?>
  <!-- ================ End Header Area ================= -->

    <!-- Modal -->
   


    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="">
            <div class="modal-body">
              <input type="text" name="email" placeholder="Email" class="single-input-primary" required /><br><br>
              <input type="password" name="password" placeholder="Password" class="single-input-primary" required />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="loginto">Login</button>
            </div>
          </form>
          <?php
                if(isset($_POST['loginto']))
                  {
                      $umail=mysqli_real_escape_string($db, $_POST['email']);
                      $pwd=mysqli_real_escape_string($db, $_POST['password']);
                      //$pawd= md5($pwd);
                      
                      $query="SELECT * FROM userdb WHERE email='$umail' && password='$pwd'";
                      $data=mysqli_query($db, $query);
                      $total=mysqli_num_rows($data);
                      if($total==1)
                      {
                        $_SESSION['usrid'] = $umail;
                        
                        session_write_close();
                          header('location:blog-home.php');
                      }
                      else
                      {
                          ?>
                              <script>
                                  alert("login error");
                              </script>
                          <?php
                      }
                  }  
          ?>
        </div>
      </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="">
            <div class="modal-body">
              <input type="text" name="name" placeholder="Name" class="single-input-primary" required /><br>
              <input type="text" name="regd" placeholder="Regd. No" class="single-input-primary" required /><br>
              <input type="text" name="email" placeholder="Email" class="single-input-primary" required /><br>
              <input type="password" name="password" placeholder="Password" class="single-input-primary" required />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="sineinto">Create Account</button>
            </div>
          </form>

          <?php
                if(isset($_POST['sineinto']))
                  {
                      $uname=mysqli_real_escape_string($db, $_POST['name']);
                      $uregd=mysqli_real_escape_string($db, $_POST['regd']);
                      $umail=mysqli_real_escape_string($db, $_POST['email']);
                      $pwd=mysqli_real_escape_string($db, $_POST['password']);
                      //$pawd= md5($pwd);
                      
                      $emailquery= "SELECT * FROM userdb WHERE email='$umail' ";
                      $inquery=mysqli_query($db, $emailquery);
                      $emailcount=mysqli_num_rows($inquery);
                      
                      if($emailcount>0)
                      {
                          ?>
                                <script>
                                    alert("Email already exist");
                                </script>
                            <?php
                      }
                      else
                      {
                        $insertquery= " insert into userdb (name,regd,email,password) values('$uname', '$uregd', '$umail', '$pwd')";
                          $iquery=mysqli_query($db,$insertquery);
                          if($iquery)
                            {
                             
                                ?>
                                  <script>
                                      alert("Inserted Successful");
                                  </script>
                                <?php
                            }
                            else
                            {
                                ?>
                                  <script>
                                      alert("Connection Faild Error. Please contact us using whatsapp or any social address so we can solve it");
                                  </script>
                                <?php
                            }
                      }
                  }  
              ?>



        </div>
      </div>
    </div>




  <!-- ================ start banner Area ================= -->
  <section class="home-banner-area">
    <div class="container">
      <div class="row justify-content-center fullscreen align-items-center">
        <div class="col-lg-5 col-md-8 home-banner-left">
          <h1 class="text-white">
            Take the first step <br />
            to learn with us
          </h1>
          <p class="mx-auto text-white  mt-20 mb-40">
            In the history of modern astronomy, there is probably no one
            greater leap forward than the building and launch of the space
            telescope known as the Hubble.
          </p>
          <a href="#" class="genric-btn success circle arrow" data-toggle="modal" data-target="#login">Login<span class="lnr lnr-arrow-right"></span></a>
          <a href="#" class="genric-btn success circle arrow" data-toggle="modal" data-target="#create">Create<span class="lnr lnr-arrow-right"></span></a>
        </div>
        <div class="offset-lg-2 col-lg-5 col-md-12 home-banner-right">
          <img class="img-fluid" src="img/header-img.png" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End banner Area ================= -->

  <!-- ================ Start Feature Area ================= -->
  <section class="feature-area">
    <div class="container-fluid">
      <div class="feature-inner row">
        <div class="col-lg-2 col-md-6">
          <div class="feature-item d-flex">
            <i class="ti-book"></i>
            <div class="ml-20">
              <h4>New Classes</h4>
              <p>
                In the history of modern astronomy, there is probably no one greater leap forward.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="feature-item d-flex">
            <i class="ti-cup"></i>
            <div class="ml-20">
              <h4>Top Courses</h4>
              <p>
                In the history of modern astronomy, there is probably no one greater leap forward.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="feature-item d-flex border-right-0">
            <i class="ti-desktop"></i>
            <div class="ml-20">
              <h4>Full E-Books</h4>
              <p>
                In the history of modern astronomy, there is probably no one greater leap forward.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End Feature Area ================= -->



  <!-- ================ Start Video Area ================= -->
  <section class="video-area section-gap-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="section-title text-white">
            <h2 class="text-white">
              Watch Our Trainers <br>
              in Live Action
            </h2>
            <p>
              In the history of modern astronomy, there is probably no one greater leap forward than the building and
              launch of the space telescope known as the Hubble.
            </p>
          </div>
        </div>
        <div class="offset-lg-1 col-md-6 video-left">
          <div class="owl-carousel video-carousel">
            <div class="single-video">
              <div class="video-part">
                <img class="img-fluid" src="img/video-img.jpg" alt="">
                <div class="overlay"></div>
                <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
                  <img class="play-icon" src="img/play-btn.png" alt="">
                </a>
              </div>
              <h4 class="text-white mb-20 mt-30">Learn Angular js Course for Legendary Persons</h4>
              <p class="text-white mb-20">
                In the history of modern astronomy, there is probably no one greater leap forward than the building and
                launch of the space telescope known as the Hubble.
              </p>
            </div>

            <div class="single-video">
              <div class="video-part">
                <img class="img-fluid" src="img/video-img.jpg" alt="">
                <div class="overlay"></div>
                <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
                  <img class="play-icon" src="img/play-btn.png" alt="">
                </a>
              </div>
              <h4 class="text-white mb-20 mt-30">Learn Angular js Course for Legendary Persons</h4>
              <p class="text-white mb-20">
                In the history of modern astronomy, there is probably no one greater leap forward than the building and
                launch of the space telescope known as the Hubble.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End Video Area ================= -->





  <!-- ================ start footer Area ================= -->
  <?php
        include_once('includes/footer.php')
    ?>
  <!-- ================ End footer Area ================= -->

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/hexagons.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>