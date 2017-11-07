<?php

$card='<div class="w3-row-padding">';
require('../connection.php');


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

$query="SELECT * FROM `exam` WHERE sub_id=$id";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $card.='
        <div class="w3-card-2" style="width:100%;margin-top:12px;">
        
<header class="w3-container w3-teal">
<div class="w3-row">
<div class="w3-half"><h4>'.$row['test_name'].'</h4></div>
<div class="w3-half"><a class="w3-button w3-blue w3-hover-red w3-round w3-card-2 w3-right" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=exam-question&id='.$id.'&cname='.$cname.'&eid='.$row['test_id'].'&tq='.$row['total_que'].'">ADD/EDIT QUSTIONS</a></div>
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

<br />
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
        <input type="text" name="cname" required="" value="<?php echo $cname; ?>" disabled>
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

<br />
<header class="w3-container w3-light-grey">
<h3>All Exams</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>

