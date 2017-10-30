<?php

$card='<div class="w3-row-padding">';
$count=0;
require('../connection.php');
$query="SELECT * FROM `notice` WHERE course='$id' ORDER BY `Date` DESC";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $count+=1;
    $card.='
        <div class="w3-card-2" style="width:100%;margin-top:12px;">
        
<header class="w3-container w3-teal">
<div class="w3-row">
<div class="w3-half"><h4>'.$row['subject'].'</h4></div>
</div>
</header>
<br />
<div class="w3-container">
<p><strong>Description : </strong>'.$row['Description'].'<br /></p></div>

<footer class="w3-container w3-light-grey">
<div class="w3-row w3-right">
  <strong>Posted On: </strong>'.$row['Date'].'
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
<h3>All Courses Notices</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>

