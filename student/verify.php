<?php
  require('../connection.php');
  $sid=$_SESSION['user_id'];
  $adm=$add=$flag=$smsg="";
  $dep="CSE";
  $sstatus="w3-hide";
  
  
  extract($_POST);
  
  if (isset($submit)){
    $query = "UPDATE `students` SET `admno` = '$admno', `dept` = '$dept', `addrs` = '$addrs', `status` = 'complete' WHERE `students`.`studentId` = $sid";
    $result = mysqli_query($con,$query);
    if($result){
        $sstatus="w3-show";
        $smsg="Your details is submitted to the Administrator for approval.!";
    }
  }

  if(getStatus()=="completed"){
    $sid=$_SESSION['user_id'];
		$query="SELECT * FROM `students` WHERE studentId=$sid";
		$result = mysqli_query($con,$query) or die(mysqli_error());
    $row=$result->fetch_assoc();
    $adm=$row['admno'];
    $add=$row['addrs'];
    $dep=$row['dept'];
    $flag="disabled";
  }
  
?>

<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Verify</li>
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
              <label class="control-label">Admission No</label>
              <input type="text" placeholder="Enter Your Admission No" name="admno" value="<?php echo $adm; ?>" required="" <?php echo $flag; ?>>
            </div>
            <div class="col-md-6 form-group2 group-mail">
              <label class="control-label">Department</label>
            <select name="dept" <?php echo $flag; ?>>
            	<option value="<?php echo $dep; ?>"><?php echo $dep; ?></option>
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
					<strong>Notice!</strong> Once you SUBMIT this, You can't change it later. Be carefull while submitting..!
		</div>
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">