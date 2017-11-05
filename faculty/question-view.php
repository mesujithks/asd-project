<?php
require('../connection.php');
$clist="";
$sstatus="w3-hide";

extract($_GET);
extract($_POST);

if (isset($add)){
    $query="INSERT INTO discussion_answer(question_id,answer_detail,user_id) VALUES('$qid','$reply','$uid')";
    $result = mysqli_query($con,$query);
    if($result){
        $sstatus="w3-show";
        $smsg="Reply is posted.";
    }
}

$query="select * from discussion_answer,users where question_id=$qid and discussion_answer.user_id=users.id ORDER BY  datetime desc";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $clist.='<div class="w3-card-2 w3-border w3-border-blue" style="width:100%;margin-top:12px;">

    <div class="w3-container">
        <div class="w3-row-padding w3-margin">
            <div class="w3-col w3-cell w3-mobile" style="width:85%">
                <p>'.$row['answer_detail'].'</p>
                <p><strong>Posted On: </strong>'.$row['datetime'].'
            </div>
            <div class="w3-col w3-center w3-border w3-cell w3-mobile" style="width:15%">
            <p><img class="prfil-pic w3-card-2" width=50 height=50 src="'.getUserAvatar($row['user_id']).'"></img></p>
            <p><strong>'.$row['name'].'</strong></p>
        </div>
        </div>
    </div>
 </div>';
}

$query="SELECT * FROM discussion_question,users WHERE question_id=$qid and discussion_question.user_id=users.id";
$result = mysqli_query($con,$query);
$row=$result->fetch_assoc();
?>
<ol class="breadcrumb w3-card-2">
<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=discussion">Discussion Forum</a><i class="fa fa-angle-right"></i><a href="index.php?page=forum">View Forum</a><i class="fa fa-angle-right"></i><a href="index.php?page=discussion-questions&id=<?php echo $sbtid.'&tname='.$tname.'&sbname='.$sbname; ?>"><?php echo $tname." : ".$sbname; ?></a><i class="fa fa-angle-right"></i>View Question</li>
</ol>

<div class="w3-panel w3-green w3-round <?php echo $sstatus; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

    <div class="validation-form">
    <div class="w3-border w3-border-green">
    <header class="w3-container w3-light-grey">
            <h3><?php echo $row['heading']; ?></h3>
        </header>
        <div class="w3-container">
            <div class="w3-row-padding w3-margin">
                <div class="w3-col w3-center w3-border w3-cell w3-mobile" style="width:15%">
                    <p><img class="prfil-pic w3-card-2" width=50 height=50 src="<?php echo getUserAvatar($row['user_id']); ?>"></img></p>
                    <p><strong><?php echo $row['name']; ?></strong></p>
                </div>
                <div class="w3-col w3-cell w3-mobile" style="width:85%">
                    <p><?php echo $row['question_detail']; ?></p>
                    <p><strong>Posted On: </strong><?php echo $row['datetime']; ?>
                </div>   
            </div>
        </div>
    </div>
    <button onclick="myReply('Demo1')" class="w3-button w3-block w3-green w3-hover-blue w3-center w3-ripple" id="reply"><i class="fa fa-reply-all"></i> Reply</button>
<div id="Demo1" class="w3-hide w3-animate-opacity">
    <div class="w3-card-4" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Add New Reply</h3>
</header>
<div class="w3-container"><br>
<form action="<?php print $PHP_SELF?>" method="post">
    <div class="w3-row">
        <input type="hidden" name="qid" value="<?php echo $qid; ?>">
        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
    <div class="w3-container form-group1">
        <label class="control-label">Description</label>
        <textarea  placeholder="Enter Reply For The Question" name="reply" required=""></textarea>
    </div>
    </div>
   <div class="col-md-4 form-group w3-center"><br>
     <button type="submit" name="add" class="w3-button w3-green w3-card-2 w3-ripple w3-round w3-hover-red w3-show">Post</button>
   </div>
</form>
</div>
</div></div><br>
<script>
function myReply(id) {
    var x = document.getElementById(id);
    var y = document.getElementById('reply');
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        y.innerHTML='<i class="fa fa-angle-double-up"></i> Reply';
    } else { 
        x.className = x.className.replace(" w3-show", "");
        y.innerHTML='<i class="fa fa-reply-all"></i> Reply';
    }
}
</script>
        <header class="w3-container w3-light-grey">
            <h3>Recently Replyed Answers</h3>
        </header>
        <div class="w3-container">
            <?php echo $clist; ?>
        </div>
    </div>
</div>