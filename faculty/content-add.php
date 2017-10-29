<?php
    require('../connection.php');
    extract($_GET);
    $edit= $eid;    
    $uploadOk = 0;
    $flag=1;
    $sstatus="w3-hide";
    $clr="w3-green";
    $hd="Success!";
    $hiden='<input type="hidden" name="action" value="add">';
    define ("filesplace","../files");


    extract($_POST);
    
    if (isset($submit)){
        if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {
            if ($_FILES['classnotes']['type'] != "application/pdf") {
                $clr="w3-red";
                $hd="Error!";
                $sstatus="w3-show";
                $flag=0;
                $smsg="Class notes must be uploaded in PDF format.";
            } else {
                $filename= "../files/attachment-".time().".pdf";
                $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], $filename);
                if ($result == 1) $uploadOk = 1;
                else {$hd="Error!";$smsg= "Sorry, Error happened while uploading . ";$clr="w3-red";$sstatus="w3-show";$flag=0;}
            } 
        }
        if($flag==1){
            if($action=="add"){
                if($uploadOk == 1)  $query="INSERT INTO `course_content` (`courseId`, `title`, `body`, `attachment`, `post_by`) VALUES ('$cid', '$title', '$body', '$filename', '$post_by')";
                else    $query = "INSERT INTO `course_content` (`courseId`, `title`, `body`, `post_by`) VALUES ('$cid', '$title', '$body', '$post_by')";
            }elseif($action=="edit"){
                if($uploadOk == 1) {
                     $query= "UPDATE `course_content` SET `title` = '$title', `body` = '$body', `attachment` = '$filename' WHERE `course_content`.`conentId` = '$conid'";
                     unlink($afile);
                }
                else $query= "UPDATE `course_content` SET `title` = '$title', `body` = '$body' WHERE `course_content`.`conentId` = '$conid'";
            }
            $result = mysqli_query($con,$query);
            if($result){
                $sstatus="w3-show";
                $smsg="New content for the course is posted successfully.!";
            }
        }
    }

    if($edit!=""){
        $query="SELECT * FROM `course_content` WHERE conentId=$edit";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        $cntid=$edit;
        $tit=$row['title'];
        $bod=$row['body'];
        $hiden='<input type="hidden" name="action" value="edit">
                <input type="hidden" name="conid" value="'.$cntid.'">
                <input type="hidden" name="afile" value="'.$row['attachment'].'">';
        $afile='<div class="col-md-6 form-group2">
        <label class="control-label">Attached File</label>
        <div class="input-group input-icon right">
            <span class="input-group-addon">
                <i class="fa fa-paperclip"></i>
            </span>
            <input class="form-control1" type="text" name="attached" value="'.basename($row['attachment']).'" disabled/>
        </div>
    </div>';
      }
    
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=my-course">My Courses</a><i class="fa fa-angle-right"></i><a href="index.php?page=course-view&id=<?php echo $id; ?>"><?php echo $cname; ?></a><i class="fa fa-angle-right"></i>Add Conent</li>
</ol>

<div class="w3-panel w3-round <?php echo $sstatus." ".$clr; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

<div class="validation-form">
<!---->
 
<form action="<?php print $PHP_SELF?>" enctype="multipart/form-data" method="post">
<input type="hidden" name="cid" value="<?php echo $id; ?>">
<?php echo $hiden; ?>
    <div class="vali-form">
   <div class="col-md-12 form-group1">
     <label class="control-label">Title</label>
     <input type="text" placeholder="Enter Title Of The Post" name="title" required="" value="<?php echo $tit; ?>">
   </div>

   </div><div class="clearfix"> </div>
   <div class="col-md-12 form-group1 ">
     <label class="control-label">Body</label>
     <textarea  placeholder="Enter Body Of The Post" name="body" required=""><?php echo $bod; ?></textarea>
   </div>
   <div class="col-md-6 form-group1">
              <label class="control-label">Attach File</label>
              <input type="file" class="w3-input w3-border w3-margin-bottom" name="classnotes" />
    </div>
    <?php echo $afile; ?>
   
    <div class="clearfix"> </div>
    <input type="hidden" name="post_by" value="<?php echo $_SESSION['user_id']; ?>">
   <div class="col-md-12 form-group">
     <button type="submit" name="submit" class="w3-button w3-blue w3-card-2 w3-ripple w3-round w3-hover-red" <?php echo $flag; ?>>Submit</button>
   </div>
 <div class="clearfix"> </div>
</form>
<!---->
</div>

</div>
</div>
<div class="w3-card-2">