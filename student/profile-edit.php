
<?php
require('../connection.php');
$target_dir = "../images/";
$smsg="";
$gendb="F";
$genda="M";
$gb="Female";
$ga="Male";
$flag=2;
$clr="w3-green";
$hmsg="Success!";
$disp="w3-hide";
$sid=$_SESSION['user_id'];

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename="../images/avatar-".$sid.".".$imageFileType;
// Check if image file is a actual image or fake image
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
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $smsg.= "<br />Your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        $flag=1;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            rename("../images/".$_FILES["fileToUpload"]["name"],$filename);
            $query = "UPDATE `users` SET `image`='$filename' WHERE `users`.`id` = $sid";
            $result = mysqli_query($con,$query);
        } else {
            $flag=0;
            $smsg.= " There was an error uploading your file.";
        }
    }

    $query = "UPDATE `users` SET `name`='$fullname',`mobile`='$mobile',`gender`='$gender',`dob`='$doba' WHERE `users`.`id` = $sid";
    $result = mysqli_query($con,$query);
    if(!$result){ 
       $flag=0;     
    } else $flag=1;
    
    if($flag==1){
        $smsg="Your profile is updated.";
        $disp="w3-show";
    }elseif($flag==0){
        $smsg.="<br />Your profile is not updated.";
        $disp="w3-show";
        $clr="w3-red";
        $hmsg="Error!";
    }
}


$query="SELECT * FROM `users` WHERE id=$sid";
$result = mysqli_query($con,$query) or die(mysqli_error());
$row=$result->fetch_assoc();
$nme=$row['name'];
$ph=$row['mobile'];
$genda=$row['gender'];
$dob=$row['dob'];

if($genda=="F"){
    $gendb="M";
    $gb="Male";
    $ga="Female";
}

?>

<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Profile Edit</li>
            </ol>
<!--grid-->
<div class="w3-panel w3-green w3-round <?php echo $clr." ".$disp; ?>">
<h3><?php echo $hmsg; ?></h3>
<p><?php echo $smsg; ?></p>
</div>
 	<div class="validation-system w3-card-2">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form method="POST" enctype="multipart/form-data">
         	<div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Profile Picture</label>
              <input type="file" class="w3-input w3-border w3-margin-bottom" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="col-md-6 form-group1">
              <img class=" prfil-pic w3-card-2 w3-margin-bottom" width=100 height=100 src="<?php echo getAvatar(); ?>"></img>
            </div>
             <div class="clearfix"> </div>

             <div class="w3-row-padding">
                <div class="w3-half">
                    <label>Full Name</label>
                    <input class="w3-input w3-border w3-margin-bottom w3-round" type="text" placeholder="Enter Your Full Name" name="fullname" value="<?php echo $nme; ?>" required>
                </div>
                <div class="w3-half">
                <label><b>Mobile</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-round" type="text" placeholder="Enter Mobile Number" name="mobile" value="<?php echo $ph; ?>" required>
                </div>
            </div>

            <div class="w3-row-padding">
                <div class="w3-half">
                    <label><b>Gender</b></label>
                    <select class="w3-input w3-border w3-margin-bottom w3-select w3-round" name="gender">
                      <option value="<?php echo $genda; ?>"><?php echo $ga; ?></option>
                      <option value="<?php echo $gendb; ?>"><?php echo $gb; ?></option>
                    </select>
                </div>
                <div class="w3-half">
                <label><b>Date Of Birth</b></label>
                <input class="w3-input w3-border w3-margin-bottom w3-select w3-round" type="date"  name="doba" value="<?php echo $dob; ?>" required>
</div>
</div>
                    <button type="submit"  name="submit" class="w3-button w3-ripple w3-blue w3-hover-red w3-round">Submit</button>
                </div>
            </div>
          
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">