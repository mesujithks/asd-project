<?php
require('../connection.php');
$card="";
$sid=$_SESSION['user_id'];
$query="SELECT * FROM discussion_question,discussion_subtopic,users WHERE discussion_question.user_id=users.id AND discussion_question.subtopic_id=discussion_subtopic.subtopic_id AND discussion_subtopic.topic_id IN (SELECT crsId FROM student_courses_taken WHERE stdId=$sid) GROUP BY discussion_question.subtopic_id ORDER BY  datetime desc";
$result = mysqli_query($con,$query);
while($row=$result->fetch_assoc()){
    $card.='<a href="index.php?page=question-view&qid='.$row['question_id'].'&sbtid='.$row['subtopic_id'].'&sbname='.$row['subtopic_name'].'">
    <div class="w3-card-2 w3-hover-gray w3-text-black" style="width:100%;margin-top:12px;">
        <header class="w3-container w3-teal">
            <h4>'.$row['heading'].'</h4>
        </header>
        <div class="dis-container chat-container w3-hover-gray">
        <div class="left">
            <img src="'.getUserAvatar($row['user_id']).'" alt="Avatar" width=60 height=60><br><br>
            <p class="w3-center" style="margin-top:10px;">'.$row['name'].'</p>
        </div>
        <p>'.$row['question_detail'].'</p>
        <span class="time-left"><strong>Posted On: </strong>'.$row['datetime'].'</span>
    </div>
    </div>
     </div>
     </a>';

}
?><ol class="breadcrumb w3-card-2">
<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Discussion Forum</li>
</ol>

<div class="validation-system w3-card-2">

    <div class="validation-form">
        <div class="w3-row">
            <div class="w3-third w3-border w3-padding">
                <a class="w3-blue w3-hover-red w3-button w3-ripple w3-round w3-show" href="index.php?page=forum">View Forum</a>
            </div>
            <div class="w3-third w3-border w3-padding">
                <a class="w3-blue w3-hover-red w3-button w3-ripple w3-round w3-show" href="index.php?page=my-questions">My Questions</a>
            </div>
            <div class="w3-third w3-border w3-padding">
                <a class="w3-blue w3-hover-red w3-button w3-ripple w3-round w3-show" href="index.php?page=my-answers">My Answers</a>
            </div>
        </div><br>
        <header class="w3-container w3-light-grey">
            <h3>Recently Asked Questions</h3>
        </header>
        <div class="w3-container">
            <?php echo $card; ?>     
    </div>
</div>
<div>