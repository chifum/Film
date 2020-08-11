<?php 
require'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Podcast</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900"> 
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>
<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="row align-items-center">


          <div class="col-3">
            <h1 class="site-logo"><a href="index.php" class="h2">Podcast<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-9">
            <nav class="site-navigation position-relative text-right text-md-right" role="navigation">



              <div class="d-block d-lg-none ml-md-0 mr-auto"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active">
                  <a href="index.php">Home</a>
                </li>
                <li><a href="film.php">Films</a></li>
                <!-- <li><a href="contact.php">Contact</a></li> -->
                <li></li>
                <li></li>
                <li><?php if(isset($_SESSION["fullName"])) echo "Hi " .$_SESSION["fullName"]; ?></li>
                <li class="has-children">
                    <a href="#">Settings</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="order.php">My Order</a></li>
                      <li><a href="edit_profile.php">Edit Profile</a></li>
                      <li><a href="change_password.php"> Change Password</a></li>
                      <li><a href="logout.php"><?php if(isset($_SESSION["email"])){ ?><i class="icon-signout"></i>Logout<?php } ?></a></li>
                    </ul>
                  </li>
              </ul>
            </nav>


          </div>

        </div>
      </div>
      
    </header>

    

    <div class="container pt-5 hero">
      <div class="row align-items-center text-center text-md-left">
        
        <div class="col-lg-4">
          <h1 class="mb-3 display-3">Tell Your Story to the World</h1>
          <!-- <p>Join with us! Login or Register. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, ex!</p> -->
        </div>
        <div class="col-lg-8">
          <img src="images/1x/asset-1.png" alt="Image" class="img-fluid">    
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">

        <div class="row">
          <?php for($a = 0; $a<$count; $a++) { ?>
          <div class="col-lg-12">

            <div class="d-block d-md-flex podcast-entry bg-white mb-5" data-aos="fade-up">
              
              <div class="image">
                <a href="single-post.php?film_id=<?php echo $film_id[$a]; ?>"><img class="image" src="upload/<?php echo $image[$a]; ?>" alt=""></a>
              </div>
              <div class="text">

                <h3 class="font-weight-light"><a href="single-post.php?film_id=<?php echo $film_id[$a]; ?>"><?php echo $filmName[$a]; ?></a></h3>
                <div class="text-white mb-3"><span class="text-black-opacity-05"><small>$<?php echo $filmPrice[$a]; ?><span class="sep"></span> 16 September 2017 <span class="sep">/</span> <?php //echo $date_created[$a]; ?></small></span></div>


                <div class="player">
                  <audio id="player2" preload="none" controls style="max-width: 100%">
                    <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3" type="audio/mp3">
                    </audio>
                  </div>
                </div>
               
              </div>
            </div>
            <?php } ?>
            </div>
          </div>
        </div>

    <div class="site-section bg-light block-13">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-black">Related Films</h2>
          </div>
        </div>
        
        <div class="nonloop-block-13 owl-carousel">
          <?php for($b = 0; $b<$count1; $b++) { ?>
          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="upload/<?php echo $image1[$b]; ?>" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <a href="single-post.php?film_id=<?php echo $film_id1[$b]; ?>"><h3 class="font-weight-light h5"><?php echo $filmName1[$b]; ?></h3></a>
              <p></p>
            </div>
          </div>
           <?php } ?>

        </div>

      </div>
    </div>
  
    
    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h2>Subscribe</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit nihil saepe libero sit odio obcaecati veniam.</p>
            <form action="#" method="post" class="site-block-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium animi, odio beatae aspernatur natus recusandae quasi magni eum voluptatem nam!</p>
          </div>
          <div class="col-lg-3 mx-auto">
            <h3>Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#">Podcasts</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-lg-4">
            <h3>Subscribe</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quibusdam!</p>
            
          </div>
        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved 
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/mediaelement-and-player.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

      for (var i = 0; i < total; i++) {
        new MediaElementPlayer(mediaElements[i], {
          pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
          shimScriptAccess: 'always',
          success: function () {
            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
            for (var j = 0; j < targetTotal; j++) {
              target[j].style.visibility = 'visible';
            }
          }
        });
      }
    });
  </script>


  <script src="js/main.js"></script>

</body>
</html>