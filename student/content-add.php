<?php
    extract($_GET);
    require('../connection.php');
    $sstatus="w3-hide";
    extract($_POST);
    
    if (isset($submit)){
      $query = "INSERT INTO `course_content` (`courseId`, `title`, `body`, `post_by`) VALUES ('$cid', '$title', '$body', '$post_by')";
      $result = mysqli_query($con,$query);
      if($result){
          $sstatus="w3-show";
          $smsg="New content for the course is posted successfully.!";
      }
    }
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=my-course">My Courses</a><i class="fa fa-angle-right"></i><a href="index.php?page=course-view&id=<?php echo $id; ?>"><?php echo $cname; ?></a><i class="fa fa-angle-right"></i>Add Conent</li>
</ol>

<div class="w3-panel w3-green w3-round <?php echo $sstatus; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

<div class="validation-form">
<!---->
 
<form method="POST">
<input type="hidden" name="cid" value="<?php echo $id; ?>">
    <div class="vali-form">
   <div class="col-md-12 form-group1">
     <label class="control-label">Title</label>
     <input type="text" placeholder="Enter Title Of The Post" name="title" required="">
   </div>

   </div><div class="clearfix"> </div>
   <div class="col-md-12 form-group1 ">
     <label class="control-label">Body</label>
     <textarea  placeholder="Enter Body Of The Post" name="body" required=""></textarea>
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