<?php

$card='<div class="w3-row-padding">';
$count=0;
require('../connection.php');
$query="SELECT * FROM `course_content` WHERE courseId='$id'";
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
<p><strong>Description : </strong>'.$row['body'].'<br /></p>
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
<div class="w3-card-4" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Add New Course Content</h3>
</header>
<div class="w3-container">
    <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
</div>
<a class="w3-button w3-block w3-green w3-hover-blue w3-ripple" href="index.php?page=content-add&id=<?php echo $id."&cname=".$cname; ?>">+ Add Course Content</a>
</div>
<br />
<header class="w3-container w3-light-grey">
<h3>All Courses Materials</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>

