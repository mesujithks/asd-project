<?php
    $con = mysqli_connect("localhost","root","admin","asd-project");
    extract($_GET);

    if($action=="approved"){
        $query = "UPDATE `faculty` SET `status` = 'approved' WHERE `faculty`.`facultyId` ='$id'";
        $result = mysqli_query($con,$query);
        if($result){
            $query = "UPDATE `notification` SET `action` = 'done' WHERE `notification`.`notificationId` ='$nid'";
            $result2 = mysqli_query($con,$query);
            if($result2) header("Location: index.php?page=faculty-request");
        }
    }elseif($action=="delete"){

    }
?>