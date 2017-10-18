<?php    
    $scnt=getCount("students");
    $fcnt=getCount("faculty");
    $crscnt=getCount("courses");
    $exmcnt=getCount("exam");
    $dfcnt=getCount("discussion_question");
    $chtcnt=getCount("discussion_chatmaster");
    function getCount($table){
        $con = mysqli_connect("localhost","root","admin","asd-project");
        $query="SELECT COUNT(*) AS count FROM $table";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["count"];
    }
    
    
?>