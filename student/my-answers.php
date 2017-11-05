<?php
require('../connection.php');
$card="";
$sid=$_SESSION['user_id'];
$query="SELECT * from  discussion_answer,discussion_question where discussion_answer.user_id=$sid and discussion_answer.question_id=discussion_question.question_id ORDER BY discussion_answer.datetime desc";
$result = mysqli_query($con,$query);
while($row=$result->fetch_assoc()){
    $card.='<a href="index.php?page=question-view&qid='.$row['question_id'].'&sbtid='.$row['subtopic_id'].'&sbname='.$row['subtopic_name'].'">
    <div class="w3-card-2" style="width:100%;margin-top:12px;">
        <header class="w3-container w3-teal">
            <h4>'.$row['heading'].'</h4>
        </header>
        <div class="w3-container">
            <div class="w3-row-padding w3-margin">
                <div class="w3-col w3-cell w3-mobile" style="width:100%">
                    <p>'.$row['question_detail'].'</p>
                    <p><strong>Posted On: </strong>'.$row['datetime'].'
                </div>
            </div>
        </div>
     </div>
     </a>';

}
?>
<ol class="breadcrumb w3-card-2">
<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=discussion">Discussion Forum</a><i class="fa fa-angle-right"></i>My Answers</li>
</ol>

<div class="validation-system w3-card-2">

    <div class="validation-form">
        <header class="w3-container w3-light-grey">
            <h3>My Answers</h3>
        </header>
        <div class="w3-container">
            <?php echo $card; ?>
        </div>
    </div>
</div>