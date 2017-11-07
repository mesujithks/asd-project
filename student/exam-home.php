<?php

$card='<div class="w3-row-padding">';
require('../connection.php');

$query="SELECT * FROM `exam`,courses WHERE courses.courseId=exam.sub_id and sub_id IN (SELECT crsId FROM student_courses_taken WHERE stdId=$_SESSION[user_id]) ORDER BY test_id DESC";

$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $card.='
        <div class="w3-card-2" style="width:100%;margin-top:12px;">
        
<header class="w3-container w3-teal">
<div class="w3-row">
<div class="w3-half"><h4>'.$row['test_name'].'</h4></div>
<div class="w3-half"><a class="w3-button w3-blue w3-hover-red w3-round w3-card-2 w3-right" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=exam&testid='.$row['test_id'].'&subid='.$row['sub_id'].'&cname='.$row['courseName'].'&tname='.$row['test_name'].'">START EXAM</a></div>
</div>
</header>
<footer class="w3-container w3-light-grey">
<div class="w3-row w3-center">
  <strong>Total Questions: </strong>'.$row['total_que'].'
</div>
</footer>
         </div>
    </div>
        <div class="w3-row-padding">
        <br />';
}

?>

<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Exam</li>
</ol>
<div class="validation-system w3-card-2">

    <div class="validation-form">

<div class="w3-row">
            <div class="w3-third  w3-padding">
            </div>
            <div class="w3-third w3-border w3-padding">
                <a class="w3-blue w3-hover-red w3-button w3-ripple w3-round w3-show" href="index.php?page=result">View Results</a>
            </div>
            <div class="w3-third  w3-padding">
            </div>
        </div><br>
<header class="w3-container w3-light-grey">
<h3>All Exams</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div>
</div>