<?php
require('../connection.php');
$card="";
$sstatus="w3-hide";
$sid=$_SESSION['user_id'];
$query="SELECT * FROM `courses`,discussion_subtopic WHERE discussion_subtopic.topic_id=courses.courseId AND courses.courseId IN (SELECT crsId FROM student_courses_taken WHERE stdId=$sid) GROUP BY courses.courseName";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $card.='
    <div class="w3-card-2" style="width:100%;margin-top:12px;">
        <header class="w3-container w3-teal">
            <h4>'.$row['courseName'].'</h4>
        </header>
        <div class="w3-container">
            <div class="w3-row-padding w3-margin">
                <div class="w3-col w3-center w3-border w3-cell w3-mobile" style="width:15%">
                    <p><img class="prfil-pic w3-card-2" style="overflow: auto;" width=50 height=50 src="'.$row['courseImage'].'"></img></p>
                </div>';
   
    $query1="SELECT * FROM discussion_subtopic WHERE topic_id=$row[courseId]";
    $result1 = mysqli_query($con,$query1) or die(mysqli_error());          
    while ($r2 = $result1->fetch_assoc()){

        $card.='<div class="w3-col w3-cell w3-mobile" style="width:85%;overflow: auto;">
        <a href="index.php?page=discussion-questions&id='.$r2['subtopic_id'].'&tname='.$row['courseName'].'&sbname='.$r2['subtopic_name'].'">
            <div class="w3-panel w3-border-bottom w3-border-red  w3-hover-gray">
                <strong>'.$r2['subtopic_name'].'</strong>
                <p>'.$r2['subtopic_description'].'</p>
            </div></a>';
    }       
                $card.='</div>
            </div>
        </div>
     </div>
     ';
}

?>
<ol class="breadcrumb w3-card-2">
<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=discussion">Discussion Forum</a><i class="fa fa-angle-right"></i>View Forum</li>
</ol>

<div class="validation-system w3-card-2">

    <div class="validation-form">
   
        <header class="w3-container w3-light-grey">
            <h3>All Topics</h3>
        </header>
        <div class="w3-container">
           <?php echo $card; ?>
        </div>
    </div>
</div>