<?php
require('../connection.php');
$card="";
$sid=$_SESSION['user_id'];
$query="SELECT * FROM discussion_question,users,discussion_subtopic WHERE discussion_question.user_id=users.id AND users.id=$sid GROUP BY discussion_question.subtopic_id ORDER BY datetime desc";
$result = mysqli_query($con,$query);
while($row=$result->fetch_assoc()){
    $card.='<a href="index.php?page=question-view&qid='.$row['question_id'].'&sbtid='.$row['subtopic_id'].'&sbname='.$row['subtopic_name'].'">
    <div class="w3-card-2" style="width:100%;margin-top:12px;">
        <header class="w3-container w3-teal">
            <h4>'.$row['heading'].'</h4>
        </header>
        <div class="w3-container">
            <div class="w3-row-padding w3-margin">
                <div class="w3-col w3-center w3-border w3-cell w3-mobile" style="width:15%">
                    <p><img class="prfil-pic w3-card-2" width=50 height=50 src="'.getUserAvatar($row['user_id']).'"></img></p>
                    <p><strong>'.$row['name'].'</strong></p>
                </div>
                <div class="w3-col w3-cell w3-mobile" style="width:85%">
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
<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=discussion">Discussion Forum</a><i class="fa fa-angle-right"></i>My Questions</li>
</ol>

<div class="validation-system w3-card-2">

    <div class="validation-form">
        <header class="w3-container w3-light-grey">
            <h3>My Questions</h3>
        </header>
        <div class="w3-container">
            <?php echo $card; ?>
        </div>
    </div>
</div>