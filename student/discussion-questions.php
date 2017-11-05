<?php
require('../connection.php');
$sstatus="w3-hide";
extract($_GET);

extract($_POST);

if (isset($add)){
    $query="INSERT INTO discussion_question ( `heading`,`question_detail`, `user_id`, `subtopic_id`) VALUES ( '$hd','$ta', '$uid', '$stid')";
    $result = mysqli_query($con,$query);
    if($result){
        $sstatus="w3-show";
        $smsg="New Question is added.";
    }
}
$card="";
$query="SELECT * FROM discussion_question, users WHERE discussion_question.user_id=users.id and subtopic_id=$id ORDER BY  datetime desc";
$result = mysqli_query($con,$query);
while($row=$result->fetch_assoc()){
    $card.='<a href="index.php?page=question-view&qid='.$row['question_id'].'&sbtid='.$id.'&tname='.$tname.'&sbname='.$sbname.'">
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
<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=discussion">Discussion Forum</a><i class="fa fa-angle-right"></i><a href="index.php?page=forum">View Forum</a><i class="fa fa-angle-right"></i><?php echo $tname." : ".$sbname; ?></li>
</ol>

<div class="w3-panel w3-green w3-round <?php echo $sstatus; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

    <div class="validation-form">
    <div class="w3-card-4" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Ask New Question</h3>
</header>
<div class="w3-container"><br>
<form action="<?php print $PHP_SELF?>" method="post">
    <div class="w3-row">
        <input type="hidden" name="stid" value="<?php echo $id; ?>">
        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Heading</label>
        <input type="text" placeholder="Enter Title Of The Question" name="hd" required="" >
    </div>
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Description</label>
        <input type="text" placeholder="Enter Detailed Description Of The Question" name="ta" required="" >
    </div>
    </div>
   <div class="col-md-4 form-group w3-center"><br>
     <button type="submit" name="add" class="w3-button w3-green w3-card-2 w3-ripple w3-round w3-hover-red w3-show">Add</button>
   </div>
</form>
</div>
</div><br>
<header class="w3-container w3-light-grey">
            <h3>Recently Asked Questions</h3>
        </header>
        <div class="w3-container">
            <?php echo $card; ?>
        </div>
    </div>
</div>