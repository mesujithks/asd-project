<?php
require('../connection.php');
$sql  = "select t.test_name,t.total_que,r.test_date,r.score, name,crsId from exam t, exam_result r,users,student_courses_taken where
t.test_id=r.test_id and users.id=r.sid and student_courses_taken.stdId=r.sid and crsId IN (SELECT courseId FROM faculty_courses_taken WHERE facultyId=$_SESSION[user_id]) GROUP BY t.total_que, r.score,name ORDER BY r.test_date DESC";
$result = mysqli_query($con,$sql);

while($row=$result->fetch_assoc()){
    $list.='<tr>
<td>'.$row['test_name'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['total_que'].'</td>
<td>'.$row['test_date'].'</td>
<td>'.$row['score'].'</td>
</tr>';
}
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=exam">Exam</a><i class="fa fa-angle-right"></i>Results</li>
</ol>
<div class="validation-system w3-card-2">

    <div class="validation-form">
    <header class="w3-container w3-light-grey">
<h3>All Exams</h3>
</header><br>
<div class="w3-container">
<div class="col-md-12 form-group1">
   <table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Test Name</th>
        <th>Student Name</th>
        <th>Total Questions</th>
        <th>Test Date</th>
        <th>Score</th>
      </tr>
    </thead>
    <?php echo $list; ?>
  </table>
 </div>
</div>

   </div>
</div>