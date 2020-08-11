<?php  
require'includes/change_password.php';
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
            <h1 class="text-white">Change Password</h1>
            <a href="index.php">Home</a><span class="mx-2 text-white">&bullet;</span> <span class="text-white"></span>
          </div>
        </div>
      </div>
    </div>  
    <div class="site-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-md-8 mb-5">
            <form action="" method="POST" class="bg-white">
              <?php require'includes/errors.php'; ?>
              <div class="">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_repass" class="text-black">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="c_repass" name="password" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_pass" class="text-black">New Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="psw" name="newPassword" required="required"  
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
                    uppercase and lowercase letter, and at least 8 or more characters">
                      <div id="message">
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                      </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_repass" class="text-black">Re-type New Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="c_repass" name="retypePassword" required="required">
                  </div>
                </div>
                <input type="hidden" name="customer_id" value="<?php if(isset($_SESSION['customer_id'])) echo $_SESSION['customer_id'] ?>">
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="change_password" class="btn btn-primary btn-lg" value="Change Password">
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

  <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
    
  </body>
</html>