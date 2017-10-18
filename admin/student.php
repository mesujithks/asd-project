<?php
    $con = mysqli_connect("localhost","root","admin","asd-project");
    $card='<div class="w3-row-padding">';
    $count=0;
	$query="SELECT * FROM `students`,`users` WHERE `users`.id = `students`.studentId";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    while($row=$result->fetch_assoc()){
        $count+=1;
        $sid=$row['id'];
        $card.='
                <div class="w3-third">
                    <div class="w3-card-4" style="width:92%;max-width:300px;margin-top:12px;">
                        <img src="../images/avatar.png" alt="Avatar" style="width:100%;opacity:0.85">
                        <div class="w3-container">
                            <h4><b>'.$row['name'].'</b></h4>    
                            <p>
                                <strong>Addmission No : </strong>'.$row['admno'].'<br />
                                <strong>Department : </strong>'.$row['department'].'<br />
                                <strong>Address : </strong>'.$row['address'].'<br />
                                <strong>Email : </strong>'.$row['email'].'<br />
                                <strong>Phone : </strong>'.$row['mobile'].'
                            </p> 
            
                            <a class="w3-button w3-green" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="index.php?page=student-view.php?id='.$sid.'">VIEW</a>
                            <a class="w3-button w3-red" style="margin-left:12px;margin-top:12px;margin-bottom:12px" href="">DELETE</a>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Student</li>
            </ol>
<!--four-grids here-->

<div class="w3-card-4">
<header class="w3-container w3-light-grey">
      <h3>All Students</h3>
    </header>
    <div class="w3-container">
        <?php echo $card; ?>
    </div>
</div><br />
</div>