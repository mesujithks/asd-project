<?php
$card='<div class="w3-row-padding">';
require('../connection.php');
$query="SELECT * FROM `notice` ORDER BY `Date` DESC";
$result = mysqli_query($con,$query) or die(mysqli_error());
while($row=$result->fetch_assoc()){
    $card.='
        <div class="w3-card-2" style="width:100%;margin-top:12px;">
        
<header class="w3-container w3-teal">
<div class="w3-row">
<div class="w3-half"><h4>'.$row['subject'].'</h4></div>
<div class="w3-half"><a class="w3-button w3-blue w3-hover-red w3-round w3-card-2 w3-right" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=add-notice&id='.$id.'&cname='.$cname.'&eid='.$row['notice_id'].'">EDIT</a></div>
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

<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Notice</li>
</ol>
<div class="w3-card-4" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Add New Notice</h3>
</header>
<div class="w3-container">
    <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
</div>
<a class="w3-button w3-block w3-green w3-hover-blue w3-ripple" href="index.php?page=add-notice&id=<?php echo $id."&cname=".$cname; ?>">+ Add Course Notice</a>
</div>
<br />
<div class="validation-system w3-card-2">

    <div class="validation-form">
   
<header class="w3-container w3-light-grey">
<h3>All Notices</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div>
</div>