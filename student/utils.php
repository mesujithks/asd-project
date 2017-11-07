<?php   

    $mycnt=getCount("mycourse");
    $fcnt=getFCount("faculty");
    $crscnt=getCount("courses");
    $exmcnt=getECount("exam");
    $dfcnt=getDCount("discussion_question");
    $chtcnt=getChatCount("discussion_chatmaster");
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
    function getChatCount($table){
        require("../connection.php");
        $query = "SELECT discussion_chatmaster.chat_id, user_id_from, user_id_to, name, cdatetime FROM discussion_chatmaster, users,discussion_chat WHERE discussion_chatmaster.user_id_from=users.id AND discussion_chat.chat_id=discussion_chatmaster.chat_id AND discussion_chatmaster.user_id_to=$_SESSION[user_id] GROUP BY discussion_chatmaster.chat_id UNION SELECT discussion_chatmaster.chat_id, user_id_from, user_id_to, name, cdatetime FROM discussion_chatmaster, users,discussion_chat WHERE discussion_chatmaster.user_id_to=users.id AND discussion_chat.chat_id=discussion_chatmaster.chat_id AND discussion_chatmaster.user_id_from=$_SESSION[user_id] GROUP BY discussion_chatmaster.chat_id ORDER BY cdatetime DESC";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    function getFCount($table){
        require("../connection.php");
        $query="SELECT * FROM `faculty`,`users`,faculty_courses_taken WHERE faculty.status='approved' AND `users`.id = `faculty`.facultyId and faculty_courses_taken.facultyId=faculty.facultyId and faculty_courses_taken.courseId IN (SELECT crsId FROM student_courses_taken WHERE stdId=$_SESSION[user_id]) GROUP BY id";        
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    function getECount($table){
        require("../connection.php");
        $query="SELECT * FROM `exam`,courses WHERE courses.courseId=exam.sub_id and sub_id IN (SELECT crsId FROM student_courses_taken WHERE stdId=$_SESSION[user_id]) ORDER BY test_id DESC";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    function getDCount($table){
        require("../connection.php");
        $query="SELECT * FROM discussion_question,discussion_subtopic,users WHERE discussion_question.user_id=users.id AND discussion_question.subtopic_id=discussion_subtopic.subtopic_id AND discussion_subtopic.topic_id IN (SELECT crsId FROM student_courses_taken WHERE stdId=$_SESSION[user_id]) GROUP BY discussion_question.subtopic_id ORDER BY  datetime desc";
        $result = mysqli_query($con,$query);
        return mysqli_num_rows($result);
    }
    
?>