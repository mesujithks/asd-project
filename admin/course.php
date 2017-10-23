<?php
    
    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `courses`";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $count+=1;
        $cid=$row['courseId'];
        $card.='
                <div class="w3-third">
                    <div class="w3-card-4" style="width:92%;max-width:300px;margin-top:12px;">
                        <img src="'.$row['courseImage'].'" alt="Avatar" style="width:100%;opacity:0.85">
                        <div class="w3-container">
                            <h4><b>'.$row['courseName'].'</b></h4>    
                            <p>
                                <strong>Description : </strong>'.$row['shortD'].'<br />
                            </p> 
            
                            <a class="w3-button w3-green w3-hover-red w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-view&&id='.$cid.'">VIEW</a>
                            <a class="w3-button w3-blue w3-hover-red w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-add&&eid='.$cid.'">EDIT</a>
                            <a class="w3-button w3-red w3-hover-yellow w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="">DELETE</a>
                        </div>
                     </div>
                </div>';
        if($count%3==0)
            $card.='
            </div>
            <div class="w3-row-padding">
            <br />';
    }
    
?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Course</li>
            </ol>
<!--four-grids here-->
<div class="w3-card-4 validation-system validation-form" style="width:100%">
<div class="w3-half w3-card-2">
<header class="w3-container w3-light-grey">
    <h3>Add New Course</h3>
</header>
<div class="w3-container">
    <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
</div>
<a class="w3-button w3-block w3-green w3-hover-blue w3-ripple" href="index.php?page=course-add">+ Add Course</a>
</div>
<div class="w3-half w3-card-2">
<header class="w3-container w3-light-grey">
    <h3>Course Requests</h3>
</header>
<div class="w3-container">
    <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
</div>
<a class="w3-button w3-block w3-red w3-hover-blue w3-ripple" href="index.php?page=faculty-course">View Requests</a>
</div>
<div>

<div class="w3-card-4 validation-system validation-form" style="width:100%">
<header class="w3-container w3-light-grey">
  <h3>All Available Courses</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div><br />
</div>