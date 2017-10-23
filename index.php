<?php
  require("auth.php");
  require('connection.php');
  require("login.php");
  require("signup.php");

  function getCount($mode){ 
    $query="";
    switch($mode){
      case 0: $query="SELECT COUNT(*) AS count FROM courses";break;
      case 1: $query='SELECT COUNT(*) AS count FROM users WHERE type="student"'; break;
      case 2: $query="SELECT COUNT(*) AS count FROM `faculty` WHERE `status`='approved'"; break;
    }
    require('connection.php');
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $row=$result->fetch_assoc();
    return $row["count"];
  }

  $card="";
  $query="SELECT * FROM `courses`";
  $result = mysqli_query($con,$query) or die(mysqli_error());
  while($row=$result->fetch_assoc()){
      $cid=$row['courseId'];
      $card.='
              <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-card-2 w3-white">
                  <img src="'.substr($row['courseImage'],3).'" alt="crsimg" style="width:100%">
                  <div class="w3-container">
                    <h3><b>'.$row['courseName'].'</b></h3>
                    <p>
                      <strong>Description : </strong>'.$row['shortD'].'<br />
                    </p>
                    <p><button class="w3-button w3-light-grey w3-block" onclick="login()"><i class="fa fa-envelope"></i> Register</button></p>
                  </div>
                </div>
              </div>';
  }

?>
<!DOCTYPE html>
<html>
<title>Welcome To Course Portal!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="css/plugin/sidebar-menu.css" rel="stylesheet" type="text/css" />
    <link href="css/plugin/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="css/plugin/YTPlayer.css" rel="stylesheet" type="text/css" />


<style>
#canvas{
                width:100%;
                height:100%;
                overflow: hidden;
                position:absolute;
                top:0;
                left:0;
                background-image: url("images/mac.jpg");              
            }
            .canvas-wrap{
                position:relative;
                
            }
            div.canvas-content{
                position:relative;
                z-index:2000;
                color:#fff;
                text-align:center;
                padding-top:30px;
            }
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("images/mac.jpg");
    min-height: 100%;
}
.w3-bar .w3-button {
    padding: 16px;
}
.login-width {
    width:35%;
}
@media (max-width:600px){.w3-display-right{position:absolute;left:50%;bottom:0;transform:translate(-50%,0%);-ms-transform:translate(-50%,0%)}.w3-padding{padding:0px 0px!important}.login-width{width:90%;}}
</style>
<body>

<!-- Preloader -->
<section id="preloader">
        <div class="loader" id="loader">
            <div class="loader-img"></div>
        </div>
    </section>
    <!-- End Preloader -->


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-theme-d3 w3-card-2" id="myNavbar">
    <a href="tryw3css_templates_startup.htm#home" class="w3-bar-item w3-button w3-wide">LOGO</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small w3-hide-medium">
      <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-info"></i>&nbsp ABOUT</a>
      <a href="#course" class="w3-bar-item w3-button"><i class="fa fa-folder"></i>&nbsp COURSE</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i>&nbsp CONTACT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card-2 w3-animate-left w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close &times;</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#course" onclick="w3_close()" class="w3-bar-item w3-button">COURSE</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container " id="home">
<section id="intro" class="dark-bg">

            <!-- Intro Canvas Pattern -->
            <div class="intro-media-wraper bg-image overlay-dark parallax parallax-section1" data-background-img="img/main.jpg">
                <!-- Canvas Pattern -->
                <canvas id="pollyfill-canvas"></canvas>
                <!-- End Canvas Pattern -->
            </div>
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Start something that matters</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
    <span class="w3-large ">Stop wasting valuable time with projects that just isn't you.</span>
    <p><button class="w3-button w3-padding-large w3-large w3-margin-top w3-green w3-hover-red w3-round w3-card-2 w3-ripple" onclick="document.getElementById('id01').style.display='block'" style="margin-left:12px">Sign Up</button>
    <button class="w3-button w3-padding-large w3-large w3-margin-top w3-blue w3-hover-red w3-hide-large w3-ripple" onclick="document.getElementById('id02').style.display='block'" style="margin-left:12px">&nbsp&nbspLogin&nbsp&nbsp</button></p>
  </div> 
  <div class="w3-display-right w3-hide-small w3-hide-medium w3-padding login-width" id="login-box">
      <div class="w3-black w3-transparent w3-opacity-min w3-padding-large w3-round-large">
        <h1 class="w3-xlarge w3-center w3-text-green">Login To Course Portal</h1>
        <form class="w3-container" method="POST" action="">
        <div class="w3-section">
          <input type="hidden" name="action" value="login">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-round w3-card-2" type="password" placeholder="Enter Password" name="password" required>
          <span class="w3-red w3-centre"><?php echo "<br />$passwordErr"; ?></span>
          <button class="w3-button w3-block w3-blue w3-section w3-padding w3-margin-top w3-hover-green w3-round w3-card-2 w3-ripple" type="submit">Login</button>
          <input class="w3-check" type="checkbox" name="remember" checked="checked"> Remember me
          <span class="w3-right w3-padding">Forgot <a href="tryit.asp%3Ffilename=tryw3css_modal_login.html#">password?</a></span>
        </div>
        </form>
    </div>
 </div>

  <div class="w3-panel <?php echo $color." ".$display; ?> w3-round w3-display-container">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-green w3-large w3-display-bottomright">&times;</span>
    <h3><?php echo $headm; ?></h3>
    <p><?php echo $msg; ?></p>
  </div>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-black w3-transparent" style="max-width:500px; opacity:0.90;">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Window">&times;</span>
        <br>
        <h2 class="w3-text-green">Signup Now!</h2>
      </div>
      
      <form class="w3-container" method="POST" action="">
        <div class="w3-section">
          <input type="hidden" name="action" value="signup">
          <label><b>Full Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="text" placeholder="Enter Your Full Name" name="fullname" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="email" placeholder="Enter Email" name="email" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="password" placeholder="Enter Password" name="password" required>
          <label><b>Account Type</b></label>
          <select class="w3-input w3-border w3-margin-bottom w3-select w3-round w3-card-2" name="type">
            <option value="student" selected>Student</option>
            <option value="faculty">Faculty</option>
          </select>
          <label><b>Mobile</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="text" placeholder="Enter Mobile Number" name="mobile" required>
          <label><b>Gender</b></label>
          <select class="w3-input w3-border w3-margin-bottom w3-select w3-round w3-card-2" name="gender">
            <option value="" disabled selected>Select Your Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
          <label><b>Date Of Birth</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="date"  name="dob" required>
          <button class="w3-button w3-block w3-blue w3-section w3-padding w3-hover-green w3-round w3-card-2 w3-ripple" type="submit">Sign Up</button>
        </div>
      </form>

    </div>
  </div>

  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-black w3-transparent" style="max-width:500px; opacity:0.90;">
    <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Window">&times;</span>
      </div>
      <h1 class="w3-xlarge w3-center w3-text-green">Login To Course Portal</h1>
        <form class="w3-container" method="POST" action="">
        <div class="w3-section">
          <input type="hidden" name="action" value="login">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom w3-round w3-card-2" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-round w3-card-2" type="password" placeholder="Enter Password" name="password" required>
          <span class="w3-red w3-centre"><?php echo "<br />$passwordErr"; ?></span>
          <button class="w3-button w3-block w3-blue w3-section w3-padding w3-margin-top w3-hover-green w3-round w3-card-2 w3-ripple" type="submit">Login</button>
          <input class="w3-check" type="checkbox" checked="checked"> Remember me
          <span class="w3-right w3-padding">Forgot <a href="tryit.asp%3Ffilename=tryw3css_modal_login.html#">password?</a></span>
        </div>
        </form>
    </div>
  </div>
</section>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COMPANY</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
  </div>
</div>

<!-- Course Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="course">
  <h3 class="w3-center">COURSES</h3>
  <p class="w3-center w3-large">Courses availble here..!</p>
  <div class="w3-row-padding " style="margin-top:64px">
  
    <?php echo $card; ?>
    
  </div>
</div>

<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-third">
    <span class="w3-button w3-circle w3-red w3-card-2 w3-xlarge  w3-hover-red"><?php echo getCount(0); ?>+</span>
    <br><strong>Courses</strong>
  </div>
  <div class="w3-third">
    <span class="w3-button w3-circle w3-red w3-card-2 w3-xlarge  w3-hover-red"><?php echo getCount(1); ?>+</span>
    <br><strong>Students</strong>
  </div>
  <div class="w3-third">
    <span class="w3-button w3-circle w3-red w3-card-2 w3-xlarge  w3-hover-red"><?php echo getCount(2); ?>+</span>
    <br><strong>Faculties</strong>
  </div>
</div>


<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-half">
      <br>
      <form action="https://www.w3schools.com/action_page.php" target="_blank">
        <p><input class="w3-input w3-border w3-round " type="text" placeholder="Name" required name="Name"></p>
        <p><input class="w3-input w3-border w3-round " type="text" placeholder="Email" required name="Email"></p>
        <p><input class="w3-input w3-border w3-round " type="text" placeholder="Subject" required name="Subject"></p>
        <p><input class="w3-input w3-border w3-round " type="text" placeholder="Message" required name="Message"></p>
        <p>
          <button class="w3-button w3-black w3-round w3-card-2 w3-hover-red w3-ripple" type="submit">
            <i class="fa fa-paper-plane"></i> SEND MESSAGE
          </button>
        </p>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-theme-d5 w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey w3-round w3-card-2"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>© 2017 Course Portal. All Rights Reserved</p>
</footer>

<!-- Main library -->
<script src="js/three.min.js"></script>
      
<!-- Helpers -->
<script src="js/projector.js"></script>
<script src="js/canvas-renderer.js"></script>

<!-- Visualitzation adjustments -->
<script src="js/3d-lines-animation.js"></script>

<!-- Animated background color -->
<script src="js/jquery.min.js"></script>
<script src="js/color.js"></script>

<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.easing.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.flexslider.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.fitvids.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.viewportchecker.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.stellar.min.js" type="text/javascript"></script>
    <script src="js/plugin/wow.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="js/plugin/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/plugin/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.fs.tipper.min.js" type="text/javascript"></script>
    <script src="js/plugin/mediaelement-and-player.min.js"></script>
    <script src="js/plugin/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/theme.js" type="text/javascript"></script>
    <script src="js/plugin/sidebar-menu.js" type="text/javascript"></script>
    <script src="js/navigation.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.singlePageNav.js" type="text/javascript"></script>
    <script src="js/contact-form.js" type="text/javascript"></script>
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/map.js"></script>-->
    <script src="js/plugin/TweenLite.min.js" type="text/javascript"></script>
    <script src="js/plugin/EasePack.min.js" type="text/javascript"></script>
    <script src="js/plugin/pollyfill.js" type="text/javascript"></script>

<script>
function login(){
  document.getElementById('id02').style.display='block';
}
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}

</script>

</body>
</html>