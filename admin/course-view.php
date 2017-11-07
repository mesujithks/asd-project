<?php
  $cname="View Course";
  $csd="Not Available";
  $cld="";
  $clr=$head=$msg="";
  $cimg="";
  $rbtn="w3-show";
  $disp="w3-hide";
  $action="";
  $msg=$head="";
  $dir="Course";
  $path="course";
  $fid=$_SESSION['user_id'];

  extract($_GET);

  $slist='<li class="w3-padding">No Students Registerd</li>';
  $sql  = "SELECT studentId,name FROM students JOIN student_courses_taken ON student_courses_taken.stdId=students.studentId JOIN users ON users.id=student_courses_taken.stdId WHERE student_courses_taken.crsId='$id'";
  $result = mysqli_query($con,$sql) or die(mysqli_error());
  if(mysqli_num_rows($result)>0) $slist='<li class="w3-padding w3-light-green">Total Number Of Students : '.mysqli_num_rows($result).'</li>';
  while($row=$result->fetch_assoc()){
      $slist.='<a href="index.php?page=view-student&id='.$row['studentId'].'"><li class="w3-padding w3-text-black">'.$row['name'].'</li></a>';
  }

  $flist='<li class="w3-padding">No Students Registerd</li>';
  $sql  = "SELECT faculty.facultyId,name FROM faculty JOIN faculty_courses_taken ON faculty_courses_taken.facultyId=faculty.facultyId JOIN users ON users.id=faculty_courses_taken.facultyId WHERE faculty_courses_taken.courseId='$id'";
  $result = mysqli_query($con,$sql) or die(mysqli_error());
  if(mysqli_num_rows($result)>0) $flist='<li class="w3-padding w3-light-green">Total Number Of Faculties : '.mysqli_num_rows($result).'</li>';
  while($row=$result->fetch_assoc()){
      $flist.='<a href="index.php?page=view-faculty&id='.$row['facultyId'].'"><li class="w3-padding w3-text-black">'.$row['name'].'</li></a>';
  }

  $query="SELECT * FROM courses WHERE courseId=$id";
  $result = mysqli_query($con,$query) or die(mysqli_error());
  if(mysqli_num_rows($result)==1){
    $row=$result->fetch_assoc();
    $cname=$row['courseName'];
    $csd=$row['shortD'];
    $cld=$row['longD'];
    $cimg=$row['courseImage'];
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
        <a class="w3-button w3-blue w3-hover-red w3-round w3-card-2" style="margin-left:48px;margin-top:16px;" href="index.php?page=course-add&eid=<?php echo $id; ?>">EDIT</a>
        <p style="margin-top:16px"><strong>Description : </strong><?php echo $csd; ?></p>
        <p><?php echo $cld; ?></p>

        <br />
        <header class="w3-container w3-light-grey">
<h3>Registerd Faculties</h3>
</header>
<div class="w3-container">
<ul class="w3-ul w3-hoverable">
            <?php echo $flist; ?>
        </ul>
</div><br>
<header class="w3-container w3-light-grey">
<h3>Registerd Students</h3>
</header>
<div class="w3-container">
<ul class="w3-ul w3-hoverable">
            <?php echo $slist; ?>
        </ul>
</div>
<br>
      </div>

      <div id="Contents" class="w3-container w3-border tab" style="display:none">
        <?php include('course-content.php');  ?></div>
      </div>
<div>
      <div id="Exam" class="w3-container w3-border tab" style="display:none">
      <?php include('course-exam.php');  ?></div>
      </div>


    <div id="Notice" class="w3-container w3-border tab" style="display:none">
    <?php include('course-notice.php');  ?></div>
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


