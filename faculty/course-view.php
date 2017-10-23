<?php
  $cname="View Course";
  $csd="Not Available";
  $cld="";
  $clr=$head=$msg="";
  $cimg="";
  $flag="disabled";
  $rbtn="w3-show";
  $disp="w3-hide";
  $action="";
  $msg=$head="";
  $dir="Course";
  $path="course";
  $fid=$_SESSION['user_id'];

  extract($_GET);

  $query="SELECT * FROM courses WHERE courseId=$id";
  $result = mysqli_query($con,$query) or die(mysqli_error());
  if(mysqli_num_rows($result)==1){
    $row=$result->fetch_assoc();
    $cname=$row['courseName'];
    $csd=$row['shortD'];
    $cld=$row['longD'];
    $cimg=$row['courseImage'];
  }

  if(getRStatus($fid,$id)==1){
    $flag="";
    $rbtn="w3-hide";
    $dir="My Course";
    $path="my-course";
  }

  if(getRStatus($fid,$id)==2){
    $flag="disabled";
    $rbtn="w3-hide";
    $head="Alert!";
    $msg="You are registred this course..! Aproval from Administrator is needed.";
    $clr="w3-yellow";
    $disp="w3-show";
    $dir="My Course";
    $path="my-course";
  }

  if($action=="register"){
    if(getRStatus($fid,$id)==0){
      $query="INSERT INTO `faculty_courses_taken` (`facultyId`, `courseId`) VALUES ($fid,$id)";
      $result = mysqli_query($con,$query);
      if($result){
        $query="INSERT INTO `notification` (`status`, `user_from`, `user_to`, `heading`, `description`, `page`) VALUES ('active', '$fid', '1', 'Faculty Course Registraion', 'Something...', 'faculty-course')";
        $result = mysqli_query($con,$query);
        if($result){
          $head="Success!";
          $msg="You are registred this course..! Aproval from Administrator is needed.";
          $clr="w3-green";
          $flag="disabled";
          $rbtn="w3-hide";
        }
      }
    }else{
      $head="Notice!";
      $msg="You are already registred this course..!";
      $clr="w3-yellow";
    }
    $disp="w3-show";
  }

  function getRStatus($fid,$cid){
    require('../connection.php');
    $query="SELECT * FROM `faculty_courses_taken` WHERE facultyId=$fid AND courseId=$cid";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    if(mysqli_num_rows($result)==1){
      $row=$result->fetch_assoc();
      if($row['status']=="approved") return 1;
      else return 2;
    }else return 0;
  }

  function getUserName($uid){
      require('../connection.php');
      $query="SELECT name FROM users WHERE id='$uid'";
      $result = mysqli_query($con,$query) or die(mysqli_error());
      if($result){
          $row=$result->fetch_assoc();
          return $row["name"];
      }
      return "";
  }
?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=<?php echo $path; ?>"><?php echo $dir; ?></a><i class="fa fa-angle-right"></i><?php echo $cname; ?></li>
            </ol>
<div class="w3-panel w3-display-container w3-card-2 w3-round <?php echo $disp." ".$clr; ?>">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-display-topright">X</span>
  <h2><?php echo $head; ?></h2>
  <p><?php echo $msg; ?></p>
</div>
            
    <div class="validation-system w3-card-2">
 		
 		<div class="validation-form">
 	<!---->
      <div class="w3-bar blak">
        <button class="w3-bar-item w3-button tablink w3-text-white w3-hover-red w3-blue w3-ripple w3-button" onclick="opentab(event,'Details')" style="width:25%">Details</button>
        <button class="w3-bar-item w3-button tablink w3-text-white w3-hover-red w3-ripple w3-button" onclick="opentab(event,'Contents')" style="width:25%" <?php echo $flag; ?>>Contents</button>
        <button class="w3-bar-item w3-button tablink w3-text-white w3-hover-red w3-ripple w3-button" onclick="opentab(event,'Exam')" style="width:25%" <?php echo $flag; ?>>Exam</button>
        <button class="w3-bar-item w3-button tablink w3-text-white w3-hover-red w3-ripple w3-button" onclick="opentab(event,'Notice')" style="width:25%" <?php echo $flag; ?>>Notice</button>
      </div>
      
      <div id="Details" class="w3-container w3-border tab">
        <h2><?php echo $cname; ?></h2>
        <img class="w3-image w3-round" src="<?php echo $cimg; ?>" style="width:50%"></img>
        <a class="w3-button w3-green w3-hover-red w3-round w3-card-2 <?php echo $rbtn; ?>" style="margin-left:48px;margin-top:16px;" href="index.php?page=course-view&id=<?php echo $id; ?>&action=register">REGISTER</a>
        <p style="margin-top:16px"><strong>Description : </strong><?php echo $csd; ?></p>
        <p><?php echo $cld; ?></p>
      </div>

      <div id="Contents" class="w3-container w3-border tab" style="display:none">
        <?php if(getRStatus($fid,$id)==1) include('course-content.php');  ?></div>
      </div>
<div>
      <div id="Exam" class="w3-container w3-border tab" style="display:none">
        <h2>Tokyo</h2>
        <p>Tokyo is the capital of Japan.</p>
      </div>


    <div id="Notice" class="w3-container w3-border tab" style="display:none">
        <h2>London</h2>
        <p>London is the capital tab of England.</p>
    </div>
    </div>

    <script>
    function opentab(evt, tabName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("tab");
      for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" w3-blue", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " w3-blue";
    }
    </script>
       
 	<!---->
 </div>

 </div>
</div>
<div class="w3-card-2">

