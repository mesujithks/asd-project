<?php    
    $scnt=getCount("students");
    $myccnt=getCount("faculty_courses_taken");
    $crscnt=getCount("courses");
    $exmcnt=getCount("exam");
    $dfcnt=getCount("discussion_question");
    $chtcnt=getCount("discussion_chatmaster");
    function getCount($table){
        $con = mysqli_connect("localhost","root","admin","asd-project");
        $query="SELECT COUNT(*) AS count FROM $table";
        $fid=$_SESSION['user_id'];
        if($table == "faculty_courses_taken")   $query="SELECT COUNT(*) AS count FROM $table WHERE facultyId=$fid";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["count"];
    }

?>