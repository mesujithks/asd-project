<?php
    $con = mysqli_connect("localhost","root","admin","asd-project");
    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `courses`";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $count+=1;
        $cid=$row['courseId'];
        $card.='
                <div class="w3-third">
                    <div class="w3-card-4" style="width:92%;max-width:300px;margin-top:12px;">
                        <img src="../images/avatar.png" alt="Avatar" style="width:100%;opacity:0.85">
                        <div class="w3-container">
                            <h4><b>'.$row['courseName'].'</b></h4>    
                            <p>
                                <strong>Description : </strong>'.$row['shortD'].'<br />
                            </p> 
            
                            <a class="w3-button w3-blue" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-view&id='.$cid.'">VIEW</a>
                            <a class="w3-button w3-green" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=course-view&id='.$cid.'&action=register">REGISTER</a>
                        </div>
                     </div>
                </div>';
        if($count%3==0)
            $card.='
            </div>
            <div class="w3-row-padding">
            <br />';
    }
?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Course</li>
            </ol>
<!--four-grids here-->
<div class="w3-card-4" style="width:100%">

<div class="w3-card-4">
<header class="w3-container w3-light-grey">
  <h3>All Available Courses</h3>
</header>
<div class="w3-container">
    <?php echo $card; ?>
</div>
</div><br />
</div>