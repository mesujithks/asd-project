<?php
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
    $query="INSERT INTO `discussion_subtopic` (`subtopic_name`, `subtopic_description`,  `topic_id`) VALUES ('$stname', '$stdesc', '$course')";
    $result = mysqli_query($con,$query);
    if($result){
        $sstatus="w3-show";
        $smsg="New Subtopic is added.";
    }
}

?>
<ol class="breadcrumb w3-card-2">
<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Discussion Forum</li>
</ol>

<div class="w3-panel w3-green w3-round <?php echo $sstatus; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

    <div class="validation-form">
    <div class="w3-card-4" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Add New Subtopic</h3>
</header>
<div class="w3-container"><br>
<form action="<?php print $PHP_SELF?>" method="post">
    <div class="w3-row">
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Course Name</label>
        <select class="w3-input w3-border w3-margin-top w3-select w3-round" name="course">
            <option value="" selected disable>Select Course Name</option>
            <?php echo $clist; ?>
        </select>
    </div>
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Subtopic Name</label>
        <input type="text" placeholder="Enter Name Of The Exam" name="stname" required="" >
    </div>
    <div class="w3-third w3-container form-group1">
        <label class="control-label">Description</label>
        <input type="text" placeholder="Enter Total Number Of Questions" name="stdesc" required="" >
    </div>
    </div>
   <div class="col-md-4 form-group w3-center"><br>
     <button type="submit" name="add" class="w3-button w3-green w3-card-2 w3-ripple w3-round w3-hover-red w3-show">Add</button>
   </div>
</form>
</div>
</div><br>
        <div class="w3-row">
            <div class="w3-third  w3-padding">
            </div>
            <div class="w3-third w3-border w3-padding">
                <a class="w3-blue w3-hover-red w3-button w3-ripple w3-round w3-show" href="index.php?page=forum">View Forum</a>
            </div>
            <div class="w3-third  w3-padding">
            </div>
        </div><br>
        <header class="w3-container w3-light-grey">
            <h3>Recently Asked Questions</h3>
        </header>
        <div class="w3-container">
            <a href="#">
            <div class="w3-card-2" style="width:100%;margin-top:12px;">
                <header class="w3-container w3-teal">
                    <h4>What is this?</h4>
                </header>
                <div class="w3-container">
                    <div class="w3-row-padding w3-margin">
                        <div class="w3-col w3-center w3-border w3-cell w3-mobile" style="width:15%">
                            <p><img class="prfil-pic w3-card-2" width=50 height=50 src="<?php echo getAvatar(); ?>"></img></p>
                            <p><strong>Name</strong></p>
                        </div>
                        <div class="w3-col w3-cell w3-mobile" style="width:85%">
                            <p>Any one tell me who is the father of php ???????</p>
                            <p><strong>Posted On: </strong>05-11-2017
                        </div>
                    </div>
                </div>
             </div>
             </a>
        </div>
    </div>
</div>