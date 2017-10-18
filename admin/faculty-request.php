<?php
    $con = mysqli_connect("localhost","root","admin","asd-project");
    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `notification` WHERE user_to='1' AND (action='pending' OR status='active') AND page='faculty-request'";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $count+=1;
        $fid=$row['user_from'];
        $nid=$row['notificationId'];
        $query="SELECT * FROM `faculty`,`users` WHERE `faculty`.facultyId='$fid' and `users`.id='$fid'";
        $result1 = mysqli_query($con,$query) or die(mysqli_error());
        $row1=$result1->fetch_assoc();
        $card.='
                <div class="w3-third">
                    <div class="w3-card-4" style="width:92%;max-width:300px;margin-top:12px;">
                        <img src="../images/avatar.png" alt="Avatar" style="width:100%;opacity:0.85">
                        <div class="w3-container">
                            <h4><b>'.$row1['name'].'</b></h4>    
                            <p>
                                <strong>Employee ID : </strong>'.$row1['empId'].'<br />
                                <strong>Department : </strong>'.$row1['department'].'<br />
                                <strong>Address : </strong>'.$row1['address'].'<br />
                                <strong>Email : </strong>'.$row1['email'].'<br />
                                <strong>Phone : </strong>'.$row1['mobile'].'
                            </p> 
            
                            <a class="w3-button w3-green" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="request.php?id='.$fid.'&action=approved&nid='.$nid.'">APPROVE</a>
                            <a class="w3-button w3-red" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="">DELETE</a>
                        </div>
                     </div>
                </div>';
        if($count%3==0)
            $card.='
            </div>
            <div class="w3-row-padding">
            <br />';
        
        $query = "UPDATE `notification` SET `status` = 'read' WHERE `notification`.`notificationId` ='$nid' ;";
        $result2 = mysqli_query($con,$query);
    }
?>
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="index.php?page=faculty">Faculty</a> <i class="fa fa-angle-right"></i> Faculty Request</li>
            </ol>
<!--four-grids here-->

<div class="w3-card-4">
<header class="w3-container w3-light-grey">
      <h3>All Faculty Requests</h3>
    </header>
    <div class="w3-container">
        <?php echo $card; ?>
    </div>
</div><br />
</div>