<?php   

    $mycnt=getCount("mycourse");
    $fcnt=getCount("faculty");
    $crscnt=getCount("courses");
    $exmcnt=getCount("exam");
    $dfcnt=getCount("discussion_question");
    $chtcnt=getCount("discussion_chatmaster");
    function getCount($table){
        $sid=$_SESSION['user_id'];
        require('../connection.php');
        switch($table){
            case "mycourse": $query="SELECT COUNT(*) AS count FROM `student_courses_taken` WHERE `stdId`=$sid";break;
            case "faculty": $query="SELECT COUNT(*) AS count FROM `faculty` WHERE `status`='approved'";break;
            default: $query="SELECT COUNT(*) AS count FROM $table";
        }
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["count"];
    }
    
    
?>