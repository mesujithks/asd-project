<?php
  $fid=$_SESSION['user_id'];
  $emp=$addr=$flag=$smsg="";
  $dep="CSE";
  $sstatus="w3-hide";
  $con = mysqli_connect("localhost","root","admin","asd-project");
  
  extract($_POST);
  
  if (isset($submit)){
    $query = "UPDATE `faculty` SET `empId` = '$empid', `department` = '$dept', `address` = '$addrs', `status` = 'pending' WHERE `faculty`.`facultyId` = $fid";
    $result = mysqli_query($con,$query);
    if($result){
      $query="INSERT INTO `notification` (`status`, `user_from`, `user_to`, `heading`, `description`, `page`) VALUES ('active', '$fid', '1', 'Faculty Join Request', 'Something...', 'faculty-request')";
      $result = mysqli_query($con,$query);
      if($result){
        $sstatus="w3-show";
        $smsg="Your details is submitted to the Administrator for approval.!";
      }
    }
  }

  if(getStatus()=="pending"){
    $fid=$_SESSION['user_id'];
		$query="SELECT * FROM `faculty` WHERE facultyId=$fid";
		$result = mysqli_query($con,$query) or die(mysqli_error());
    $row=$result->fetch_assoc();
    $emp=$row['empId'];
    $add=$row['address'];
    $emp=$row['empId'];
    $dep=$row['department'];
    $flag="disabled";
  }
  
?>

<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Verify</li>
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
            <div class="col-md-6 form-group1">
              <label class="control-label">Employee ID</label>
              <input type="text" placeholder="Enter Your Employee ID" name="empid" value="<?php echo $emp; ?>" required="" <?php echo $flag; ?>>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Department</label>
            <select name="dept" <?php echo $flag; ?>>
            	<option value="<?php echo $dep; ?>">CSE</option>
            	<option value="EC">EC</option>
            	<option value="EEE">EEE</option>
            </select>
            </div><div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
              <label class="control-label">Address</label>
              <textarea  placeholder="Your Address" name="addrs" required="" <?php echo $flag; ?>><?php echo $add; ?></textarea>
            </div>
            
             <div class="clearfix"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" name="submit" class="btn btn-primary" <?php echo $flag; ?>>Submit</button>
              <button type="reset" class="btn btn-default" <?php echo $flag; ?>>Reset</button>
            </div>
          <div class="clearfix"> </div>
        </form>
        <div class="alert alert-warning" role="alert">
					<strong>Notice!</strong> Aproval from Administrator is needed. SUBMIT this form will send a mail to Administrator.
		</div>
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">