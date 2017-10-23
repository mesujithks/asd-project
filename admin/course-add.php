<?php
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  
  $cname=$shortD=$longD=$smsg="";
  $sstatus="w3-hide";
  $cid=-1;
  extract($_GET);
  $edit= $eid;
  $flag=1;
  $hiden='<input type="hidden" name="action" value="add">';
  extract($_POST);

  if (isset($submit)){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $smsg.= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


    if($action=="add"){
      $query = "INSERT into `courses` (courseName, shortD, longD) VALUES ('$coursename', '$shortd', '$longd')";
      $result = mysqli_query($con,$query);
      if($result){
        $query = "SELECT * FROM courses WHERE courseName='$coursename'";
        $result = mysqli_query($con,$query);
        $row=$result->fetch_assoc();
        $cid=$row['courseId'];
        $filename="../images/course-cover-".$cid.".".$imageFileType;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          rename("../images/".$_FILES["fileToUpload"]["name"],$filename);
          $query = "UPDATE `courses` SET `courseImage`='$filename' WHERE `courses`.`courseId` = $cid";
          $result = mysqli_query($con,$query);
        }
        $sstatus="w3-show";
        $smsg="New course is successfully created";
      }
    }elseif($action=="edit"){
      $query = "UPDATE `courses` SET courseName='$coursename', shortD='$shortd', longD='$longd' WHERE courseId=$cid";
      $result = mysqli_query($con,$query);
      if($result){
        $filename="../images/course-cover-".$cid.".".$imageFileType;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          rename("../images/".$_FILES["fileToUpload"]["name"],$filename);

          $query = "UPDATE `courses` SET `courseImage`='$filename' WHERE `courses`.`courseId` = $cid";
          $result = mysqli_query($con,$query);
       }
        $sstatus="w3-show";
        $smsg="New course is successfully updated";
      }
    }
  }

  if($edit!=""){
    $query="SELECT * FROM `courses` WHERE courseId=$edit";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $row=$result->fetch_assoc();
    $cid=$edit;
    $cname=$row['courseName'];
    $shortD=$row['shortD'];
    $longD=$row['longD'];
    $hiden='<input type="hidden" name="action" value="edit">
            <input type="hidden" name="cid" value="'.$row['courseId'].'">';
  }

?>

<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=course">Courses</a><i class="fa fa-angle-right"></i>Add/Edit Course</li>
            </ol>
<!--grid-->
<div class="w3-panel w3-green w3-round <?php echo $sstatus; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>
 	<div class="validation-system w3-card-2">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form method="POST" enctype="multipart/form-data">
         	<div class="vali-form">
             <?php echo $hiden; ?>
            <div class="col-md-12 form-group1">
              <label class="control-label">Course Name</label>
              <input type="text" placeholder="Enter New Course Name" required="" name="coursename" value="<?php echo $cname; ?>">
            </div>
            <div class="col-md-12 form-group1">
              <label class="control-label">Short Decription</label>
              <input type="text" placeholder="Enter Short Decription" required="" name="shortd" value="<?php echo $shortD; ?>">
            </div>
            <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
              <label class="control-label">Long Description</label>
              <textarea  placeholder="Enter Long Decription" required="" name="longd"><?php echo $longD; ?></textarea>
            </div>
            <div class="col-md-6 form-group1">
              <label class="control-label">Cover Photo</label>
              <input type="file" class="w3-input w3-border w3-margin-bottom" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="col-md-6 form-group1">
              <img class="w3-card-2 w3-margin-bottom w3-round" width=100 height=100 src="<?php echo getCover($cid); ?>"></img>
            </div>
             <div class="clearfix"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" name="submit" class="w3-button w3-blue w3-card-2 w3-ripple w3-round w3-hover-red">Submit</button>
  
            </div>
          <div class="clearfix"> </div>
        </form>
       
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">