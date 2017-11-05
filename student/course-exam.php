<?php

require('../connection.php');
$list='<li class="w3-padding">No Courses Registerd</li>';
$sql  = "SELECT * from exam where sub_id='$id'";
$result = mysqli_query($con,$sql) or die(mysqli_error());
if(mysqli_num_rows($result)>0) $list="";
while($row=$result->fetch_assoc()){
    $list.='<a class=" w3-text-black"href=index.php?page=exam&testid='.$row['test_id'].'&subid='.$id.'&cname='.$cname.'&tname='.$row['test_name'].'><li class="w3-padding w3-center"><strong>'.$row['test_name'].'</strong></li></a>';
}

?>

<br />
<header class="w3-container w3-light-grey">
<h3>Select Exam Name To Start Exam</h3>
</header>
<div class="w3-container">
<ul class="w3-ul w3-hoverable">
            <?php echo $list; ?>
        </ul>
          <br> 
</div>

