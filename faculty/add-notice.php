<?php
    require('../connection.php');
    extract($_GET);
    $edit= $eid;    
    $sstatus="w3-hide";
    $clr="w3-green";
    $hd="Success!";
    $hiden='<input type="hidden" name="action" value="add">';

    extract($_POST);
    
    if (isset($submit)){
        
        if($action=="add"){
            $query = "INSERT INTO `notice` (`user`, `course`, `subject`, `Description`) VALUES ('$post_by', '$cid', '$title', '$body')";
        }elseif($action=="edit"){
           $query= "UPDATE `notice` SET `subject` = '$title', `Description` = '$body' WHERE `notice`.`notice_id` = '$conid'";
        }
        $result = mysqli_query($con,$query);
        if($result){
            $sstatus="w3-show";
            $smsg="New content for the course is posted successfully.!";
        }
        
    }

    if($edit!=""){
        $query="SELECT * FROM `notice` WHERE notice_id=$edit";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        $cntid=$edit;
        $tit=$row['subject'];
        $bod=$row['Description'];
        $hiden='<input type="hidden" name="action" value="edit">
                <input type="hidden" name="conid" value="'.$cntid.'">';
      }
    
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=my-course">My Courses</a><i class="fa fa-angle-right"></i><a href="index.php?page=course-view&id=<?php echo $id; ?>"><?php echo $cname; ?></a><i class="fa fa-angle-right"></i>Add Conent</li>
</ol>

<div class="w3-panel w3-round <?php echo $sstatus." ".$clr; ?>">
<h3><?php echo $hd; ?></h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

<div class="validation-form">
<!---->
 
<form action="<?php print $PHP_SELF?>" method="post">
<input type="hidden" name="cid" value="<?php echo $id; ?>">
<?php echo $hiden; ?>
    <div class="vali-form">
   <div class="col-md-12 form-group1">
     <label class="control-label">Subject</label>
     <input type="text" placeholder="Enter Subject Of The Notice" name="title" required="" value="<?php echo $tit; ?>">
   </div>

   </div><div class="clearfix"> </div>
   <div class="col-md-12 form-group1 ">
     <label class="control-label">Description</label>
     <textarea  placeholder="Enter Description Of The Notice" name="body" required=""><?php echo $bod; ?></textarea>
   </div>
   
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