<?php    
    $scnt=getCount("students");
    $fcnt=getCount("faculty");
    $crscnt=getCount("courses");
    $exmcnt=getCount("exam");
    $dfcnt=getCount("discussion_question");
    $chtcnt=getChatCount("discussion_chatmaster");
    function getCount($table){
        require("../connection.php");
        $query="SELECT COUNT(*) AS count FROM $table";
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
    
    
?>