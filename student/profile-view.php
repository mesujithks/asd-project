<?php
    $id=$_SESSION[user_id];
    $list='<li class="w3-padding">No Courses Registerd</li>';
    $sql  = "SELECT courseId,courseName FROM students JOIN student_courses_taken ON student_courses_taken.stdId=students.studentId JOIN courses ON courses.courseId=student_courses_taken.crsId WHERE students.studentId='$id'";
    $result = mysqli_query($con,$sql) or die(mysqli_error());
    if(mysqli_num_rows($result)>0) $list="";
    while($row=$result->fetch_assoc()){
        $list.='<a href="index.php?page=course-view&id='.$row['courseId'].'"><li class="w3-padding w3-text-black">'.$row['courseName'].'</li></a>';
    }
    $sql  = "SELECT * FROM users JOIN students ON students.studentId=users.id WHERE students.studentId='$id'";
    $result = mysqli_query($con,$sql) or die(mysqli_error());
    $row=$result->fetch_assoc();

?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Profile View</li>
            </ol>
<!--grid-->

 	<div class="validation-system w3-card-2">
 		
 		<div class="validation-form">
 	<!---->
  	    <div class="w3-container w3-border w3-center"><br>
          <img class="prfil-pic w3-card-2 w3-margin-bottom" width=150 height=150 src="<?php echo $row['image']; ?>"></img>
          <h2><?php echo $row['name']; ?></h2>
                  <div>
        <div class="w3-row-padding">
            <div class="w3-half">
                <label>Full Name</label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="fullname" value="<?php echo $row['name']; ?>" disabled>
            </div>
            <div class="w3-half">
                <label><b>Mobile</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text" name="mobile" value="<?php echo $row['mobile']; ?>" disabled>
            </div>
        </div>

        <div class="w3-row-padding">
            <div class="w3-half">
                <label><b>Email</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="fullname" value="<?php echo $row['email']; ?>" disabled>   
            </div>
            <div class="w3-half">
                <label><b>Gender</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="fullname" value="<?php if($row['gender']=="M") echo "MALE"; else echo "FEMALE" ?>" disabled>
            </div>
        </div>
        <div class="w3-row-padding">
            <div class="w3-half">
                <label>Date Of Birth</label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="fullname" value="<?php echo $row['dob']; ?>" disabled>
            </div>
            <div class="w3-half">
                <label><b>Admission No</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="mobile" value="<?php echo $row['admno']; ?>" disabled>
            </div>
        </div>

        <div class="w3-row-padding">
            <div class="w3-half">
                <label><b>Department</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="fullname" value="<?php echo $row['dept']; ?>" disabled>   
            </div>
            <div class="w3-half">
                <label><b>Address</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text"  name="fullname" value="<?php echo $row['addrs']; ?>" disabled>
            </div>
        </div><br>
        <header class="w3-container w3-light-grey">
        <h3>Courses Registered</h3>
        </header>

        <ul class="w3-ul w3-hoverable">
            <?php echo $list; ?>
        </ul>
          <br>    
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">