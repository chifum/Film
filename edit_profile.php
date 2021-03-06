<?php  
require'includes/edit_profile.php';
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
    <link href="css/mystyle.css" rel="stylesheet">
    
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
                <!-- <li><a href="about.php">About</a></li> -->
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
    

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white">Update Profile</h1>
            <a href="index.php">Home</a><span class="mx-2 text-white">&bullet;</span> <span class="text-white"></span>
          </div>
        </div>
      </div>
    </div>  

    
    <div class="site-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-md-8 mb-5">
            <form action="edit_profile.php" method="POST" class="bg-white">
              <?php require'includes/errors.php'; ?>
              
              <div class="">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Fullname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="fullName" required="required" 
                    value="<?php if(isset($_SESSION['fullName'])){ echo $fullName; } ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="email" placeholder="" required="required" 
                    value="<?php if(isset($_SESSION['email'])){ echo $email; } ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Address <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" id="c_email" name="addres" placeholder="Enter Address" required="required" value=""><?php if(isset($_SESSION['addres'])){ echo $addres; } ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Date of Birth <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_email" name="dob" value="<?php if(isset($_SESSION['dob'])){ echo $dob; } ?>" placeholder="Example 01/01/2020" required="required">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Gender <span class="text-danger">*</span></label>
                    <?php $gender = array('--Select Gender--', 'Male', 'Female', 'Other'); ?>
                    <select class="form-control" name="gender" required="required">
                      <?php for($t=0; $t<count($gender); $t++ ) { ?>
                          <option <?php if(isset($d)) if($d == $gender[$t]) echo 'Select="selected"'; ?>><?php echo $gender[$t]; ?></option>
                      <?php } ?> 
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="" value="<?php if(isset($_SESSION['phone'])){ echo $phone; } ?>">
                  </div>
                </div>
                <input type="hidden" name="customer_id" value="<?php if(isset($_SESSION['customer_id'])){ echo $customer_id; } ?>">
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update Profile">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
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