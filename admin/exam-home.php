<?php

$card='<div class="w3-row-padding">';
require('../connection.php');
$clist="";
$sstatus="w3-hide";
$query="SELECT * FROM `courses`";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $clist.='<option value="'.$row['courseId'].'">'.$row['courseName'].'</option>';
} 

extract($_POST);

if (isset($add)){
    $query="INSERT INTO `exam` (`sub_id`, `test_name`, `total_que`) VALUES ('$cid', '$ename', '$tque')";
    $result = mysqli_query($con,$query);
    if($result){
        $sql  = 'SELECT MAX(test_id) as tid FROM `exam`';
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        $tid=$row['tid'];
        for ($i = 1; $i <= $tque; $i++) {
            $query="INSERT INTO `exam_question` (`test_id`) VALUES ('$tid')";
            $result = mysqli_query($con,$query);
        }
    }
}

$query="SELECT * FROM `exam` ORDER BY test_id DESC";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $card.='
        <div class="w3-card-2" style="width:100%;margin-top:12px;">
        
<header class="w3-container w3-teal">
<div class="w3-row">
<div class="w3-half"><h4>'.$row['test_name'].'</h4></div>
<div class="w3-half"><a class="w3-button w3-blue w3-hover-red w3-round w3-card-2 w3-right" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=exam-question&id='.$row['sub_id'].'&eid='.$row['test_id'].'&tq='.$row['total_que'].'">ADD/EDIT QUSTIONS</a></div>
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

    <div class="w3-card-4" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Add New Exam</h3>
</header>
<div class="w3-container"><br>
<form action="<?php print $PHP_SELF?>" method="post">
    <input type="hidden" name="cid" value="<?php echo $id; ?>">
    <div class="w3-row">
    <div class="w3-third w3-container form-group1">
    <label class="control-label">Course Name</label>
    <select class="w3-input w3-border w3-margin-top w3-select w3-round" name="cid">
        <option value="" selected disable>Select Course Name</option>
        <?php echo $clist; ?>
    </select>
</div>
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Exam Name</label>
        <input type="text" placeholder="Enter Name Of The Exam" name="ename" required="" >
    </div>
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Total Questions</label>
        <input type="text" placeholder="Enter Total Number Of Questions" name="tque" required="" >
    </div>
    </div>
   <div class="col-md-4 form-group w3-center"><br>
     <button type="submit" name="add" class="w3-button w3-green w3-card-2 w3-ripple w3-round w3-hover-red w3-show">Add</button>
   </div>
</form>
</div>
</div>
<br>
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