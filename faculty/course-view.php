
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=course">Courses</a><i class="fa fa-angle-right"></i>View Course</li>
            </ol>
            
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
