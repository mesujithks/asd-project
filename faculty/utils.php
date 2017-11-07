<?php    
    $scnt=getSCount("students");
    $myccnt=getCount("faculty_courses_taken");
    $crscnt=getCount("courses");
    $exmcnt=getECount("exam");
    $dfcnt=getDCount("discussion_question");
    $chtcnt=getChatCount("discussion_chatmaster");
    function getCount($table){
        require('../connection.php');
        $query="SELECT COUNT(*) AS count FROM $table";
        $fid=$_SESSION['user_id'];
        if($table == "faculty_courses_taken")   $query="SELECT COUNT(*) AS count FROM $table WHERE facultyId=$fid";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["count"];
    }
    function getChatCount($table){
        require("../connection.php");
        $query = "SELECT discussion_chatmaster.chat_id, user_id_from, user_id_to, name, cdatetime FROM discussion_chatmaster, users,discussion_chat WHERE discussion_chatmaster.user_id_from=users.id AND discussion_chat.chat_id=discussion_chatmaster.chat_id AND discussion_chatmaster.user_id_to=$_SESSION[user_id] GROUP BY discussion_chatmaster.chat_id UNION SELECT discussion_chatmaster.chat_id, user_id_from, user_id_to, name, cdatetime FROM discussion_chatmaster, users,discussion_chat WHERE discussion_chatmaster.user_id_to=users.id AND discussion_chat.chat_id=discussion_chatmaster.chat_id AND discussion_chatmaster.user_id_from=$_SESSION[user_id] GROUP BY discussion_chatmaster.chat_id ORDER BY cdatetime DESC";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    function getSCount($table){
        require("../connection.php");
        $query="SELECT * FROM `students`,`users`,student_courses_taken WHERE `users`.id = `students`.studentId and student_courses_taken.stdId=students.studentId and student_courses_taken.crsId IN (SELECT courseId FROM faculty_courses_taken WHERE facultyId=$_SESSION[user_id]) GROUP BY id";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    function getECount($table){
        require("../connection.php");
        $query="SELECT * FROM `exam` WHERE sub_id IN (SELECT courseId FROM faculty_courses_taken WHERE facultyId=$_SESSION[user_id]) ORDER BY test_id DESC";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    function getDCount($table){
        require("../connection.php");
        $query="SELECT * FROM discussion_question,users,discussion_subtopic WHERE discussion_question.user_id=users.id AND discussion_subtopic.topic_id IN (SELECT courseId FROM faculty_courses_taken WHERE facultyId=$_SESSION[user_id] AND status='approved') GROUP BY discussion_question.subtopic_id ORDER BY  datetime desc";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }

?>