<?php

    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `notification`join faculty_courses_taken ON notification.user_from=faculty_courses_taken.facultyId WHERE user_to='1' AND action='pending' AND page='faculty-course' AND faculty_courses_taken.status='pending' GROUP BY user_from";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $fid=$row['user_from'];
        $nid=$row['notificationId'];
        if($temp===$query) continue;
        $query="SELECT * FROM `faculty`,`users`,faculty_courses_taken,courses WHERE `faculty`.facultyId='$fid' and `users`.id='$fid' and faculty_courses_taken.facultyId='$fid' and courses.courseId=faculty_courses_taken.courseId and faculty_courses_taken.status='pending'";
        $temp=$query;
        $result1 = mysqli_query($con,$query) or die(mysqli_error());
        while($row1=$result1->fetch_assoc()){
            $count+=1;
            $card.='
                    <div class="w3-third">
                        <div class="w3-card-4" style="width:92%;max-width:300px;margin-top:12px;">
                            <img src="'.getUserAvatar($fid).'" alt="Avatar" style="width:100%;opacity:0.85">
                            <div class="w3-container">
                                <h4><b>'.$row1['name'].'</b></h4>    
                                <p>
                                    <strong>Employee ID : </strong>'.$row1['empId'].'<br />
                                    <strong>Department : </strong>'.$row1['department'].'<br />
                                    <strong>Address : </strong>'.$row1['address'].'<br />
                                    <strong>Email : </strong>'.$row1['email'].'<br />
                                    <strong>Phone : </strong>'.$row1['mobile'].'<br />
                                    Has requested to join the course,
                                </p>
                                <h4><b>'.$row1['courseName'].'</b></h4> 
                                <p>
                                    <strong>Decription : </strong>'.$row1['shortD'].'<br />
                                </p>
                
                                <a class="w3-button w3-green w3-hover-red w3-round w3-card-2 w3-ripple" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="course-request.php?id='.$fid.'&action=approved&cid='.$row1['courseId'].'&nid='.$nid.'">APPROVE</a>
                                <a class="w3-button w3-red w3-hover-yellow w3-round w3-card-2 w3-ripple" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="">DELETE</a>
                            </div>
                        </div>
                    </div>';
            if($count%3==0)
                $card.='
                </div>
                <div class="w3-row-padding">
                <br />';
        }
        $query = "UPDATE `notification` SET `status` = 'read' WHERE `notification`.`notificationId` ='$nid' ;";
        $result2 = mysqli_query($con,$query);
    }
    
?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="index.php?page=course">Course</a> <i class="fa fa-angle-right"></i> Course Request</li>
            </ol>
<!--four-grids here-->

<div class="w3-card-4 validation-system validation-form">
<header class="w3-container w3-light-grey">
      <h3>All Course Requests</h3>
    </header>
    <div class="w3-container">
        <?php echo $card; ?>
    </div>
</div><br />
</div>