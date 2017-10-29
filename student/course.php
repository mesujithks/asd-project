<?php
    $sid=$_SESSION['user_id'];
    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `courses`";
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
            
                            <a class="w3-button w3-blue w3-hover-red w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-view&id='.$cid.'">VIEW</a>';
        if(!getRStatus($sid,$cid)) $card.='<a class="w3-button w3-green w3-hover-red w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-view&id='.$cid.'&action=register">REGISTER</a>';
                        $card .='</div>
                     </div>
                </div>';
        if($count%3==0)
            $card.='
            </div>
            <div class="w3-row-padding">
            <br />';
    }

    function getRStatus($sid,$cid){
        require('../connection.php');
        $query="SELECT * FROM `student_courses_taken` WHERE stdId=$sid AND crsId=$cid";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        if(mysqli_num_rows($result)==1) return true;
        else return false;
      }
?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Course</li>
            </ol>
<!--four-grids here-->
<div class="w3-card-" style="width:100%">

<div class="w3-card-4  validation-system validation-form">
<header class="w3-container w3-light-grey">
  <h3>All Available Courses</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div><br />
</div>