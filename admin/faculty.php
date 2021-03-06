<?php

    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `faculty`,`users` WHERE status='approved' AND `users`.id = `faculty`.facultyId";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $count+=1;
        $fid=$row['id'];
        $card.='
                <div class="w3-third">
                    <div class="w3-card-2" style="width:92%;max-width:300px;margin-top:12px;">
                        <img src="'.getUserAvatar($fid).'" alt="Avatar" style="width:100%;opacity:0.85" height=300>
                        <div class="w3-container">
                            <h4><b>'.$row['name'].'</b></h4>    
                            <p>
                                <strong>Employee ID : </strong>'.$row['empId'].'<br />
                                <strong>Department : </strong>'.$row['department'].'<br />
                                <strong>Address : </strong>'.$row['address'].'<br />
                                <strong>Email : </strong>'.$row['email'].'<br />
                                <strong>Phone : </strong>'.$row['mobile'].'
                            </p> 
            
                            <a class="w3-button w3-green w3-hover-red w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=view-faculty&id='.$fid.'">VIEW</a>
                            <a class="w3-button w3-red w3-hover-yellow w3-round w3-card-2" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="">DELETE</a>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Faculty</li>
            </ol>
<!--four-grids here-->
<div class="w3-card-4 validation-system validation-form" style="width:100%">
    <header class="w3-container w3-light-grey">
      <h3>Faculty Requests</h3>
    </header>
    <div class="w3-container">
      <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
    </div>
    <a class="w3-button w3-block w3-dark-grey w3-hover-blue" href="index.php?page=faculty-request">View Requests</a>
  </div>
</div>

<div class="w3-card-4 validation-system validation-form">
<header class="w3-container w3-light-grey">
      <h3>All Faculty Members</h3>
    </header>
    <div class="w3-container">
        <?php echo $card; ?>
    </div>
</div><br />
</div>
<div>