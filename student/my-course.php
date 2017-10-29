<?php
    $sid=$_SESSION['user_id'];
    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `student_courses_taken` join courses on courses.courseId=student_courses_taken.crsId WHERE stdId=$sid";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $count+=1;
        $cid=$row['courseId'];
        $card.='
                <div class="w3-third">
                    <div class="w3-card-2" style="width:92%;max-width:300px;margin-top:12px;">
                        <img src="'.$row['courseImage'].'" alt="Avatar" style="width:100%;opacity:0.85">
                        <div class="w3-container">
                            <h4><b>'.$row['courseName'].'</b></h4>    
                            <p>
                                <strong>Description : </strong>'.$row['shortD'].'<br />
                            </p> 
            
                            <a class="w3-button w3-blue w3-hover-red w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-view&id='.$cid.'">VIEW</a>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i>My Course</li>
            </ol>
<!--four-grids here-->
<div class="w3-card-4" style="width:100%">

<div class="w3-card-4  validation-system validation-form">
<header class="w3-container w3-light-grey">
  <h3>Registerd Courses</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div><br />
</div>