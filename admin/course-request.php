<?php

    extract($_GET);
    require("../connection.php");
    if($action=="approved"){
        $query = "UPDATE `faculty_courses_taken` SET `status` = 'approved' WHERE `faculty_courses_taken`.`facultyId` ='$id' and `faculty_courses_taken`.`courseId`='$cid'";
        echo $query;
        $result = mysqli_query($con,$query);
        if($result){
            $query = "UPDATE `notification` SET `action` = 'done' WHERE `notification`.`notificationId` ='$nid'";
            $result2 = mysqli_query($con,$query);
            if($result2) header("Location: index.php?page=faculty-course");
        }
    }elseif($action=="delete"){

    }
?>