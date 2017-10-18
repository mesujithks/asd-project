<?php
  $cname=$shortD=$longD=$smsg="";
  $sstatus="w3-hide";
  extract($_GET);
  $edit= $eid;
  $hiden='<input type="hidden" name="action" value="add">';
  $con = mysqli_connect("localhost","root","admin","asd-project");

  extract($_POST);

  if (isset($submit)){
    if($action=="add"){
      $query = "INSERT into `courses` (courseName, shortD, longD) VALUES ('$coursename', '$shortd', '$longd')";
      $result = mysqli_query($con,$query);
      if($result){
        $sstatus="w3-show";
        $smsg="New course is successfully created";
      }
    }elseif($action=="edit"){
      $query = "UPDATE `courses` SET courseName='$coursename', shortD='$shortd', longD='$longd' WHERE courseId=$cid";
      $result = mysqli_query($con,$query);
      if($result){
        $sstatus="w3-show";
        $smsg="New course is successfully updated";
      }
    }
  }

  if($edit!=""){
    //setcookie("cedit", "", time()-60, "/","", 0);
    $query="SELECT * FROM `courses` WHERE courseId=$edit";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $row=$result->fetch_assoc();
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
  	    
        <form method="POST">
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
            
             <div class="clearfix"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          <div class="clearfix"> </div>
        </form>
       
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">