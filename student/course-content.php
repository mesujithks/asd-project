<?php

$card='<div class="w3-row-padding">';
$count=0;
require('../connection.php');
$query="SELECT * FROM `course_content` WHERE courseId='$id' ORDER BY `post_date` DESC";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $count+=1;
    $card.='
    <div class="w3-card-2" style="width:100%;margin-top:12px;">
    
<header class="w3-container w3-teal">
<h4>'.$row['title'].'</h4>
</header>
<br />
<div class="w3-container">
<p><strong>Description : </strong>'.$row['body'].'<br /></p>';
if($row['attachment']!="")
$card.='<p><strong>Attachment : </strong><a class="w3-button w3-red w3-hover-blue w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="'.$row['attachment'].'"><i class="fa fa-paperclip"></i> DOWNLOAD</a><br /></p>';
$card.='
</div>

<footer class="w3-container w3-light-grey">
<div class="w3-row">
<div class="w3-half w3-center">
<strong>Post By: </strong>'.getUserName($row['post_by']).'
</div>
<div class="w3-half w3-center">
<strong>Posted On: </strong>'.$row['post_date'].'
</div>
</div>
</footer>
     </div>
</div>
    <div class="w3-row-padding">
    <br />';
}


?>
<br />
<header class="w3-container w3-light-grey">
<h3>All Courses Materials</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div>
