<?php
require('../connection.php');
$card="";
$uid=$_SESSION['user_id'];
$query = "SELECT chat_id, user_id_from, user_id_to, name FROM discussion_chatmaster, users WHERE discussion_chatmaster.user_id_to=users.id AND discussion_chatmaster.user_id_from=$uid";
$result = mysqli_query($con,$query);
while($row=$result->fetch_assoc()){
    $card.='<a href="index.php?page=message&id='.$row[user_id_to].'"><div class="chat-container w3-hover-gray w3-text-black">
    <img src="'.getUserAvatar($row['user_id_to']).'" alt="Avatar" width=60 height=60>
    <h4>'.$row["name"].'</h4>';
    $sql="SELECT * FROM discussion_chat WHERE chat_id=$row[chat_id] ORDER BY cdatetime DESC";
    $result1 = mysqli_query($con,$sql);
    $chatrow=$result1->fetch_assoc();
    if($chatrow[user_id]==$uid) $icon="fa-reply";
    else $icon="fa-envelope";
    $card.='<span><i class="fa '.$icon.'"></i> &nbsp'.$chatrow["message"].'</span>
    <span class="time-right">'.$chatrow["cdatetime"].'</span>
</div></a>';
}

$query = "SELECT chat_id, user_id_from, user_id_to, name FROM discussion_chatmaster, users WHERE discussion_chatmaster.user_id_from=users.id AND discussion_chatmaster.user_id_to=$uid";
$result = mysqli_query($con,$query);
while($row=$result->fetch_assoc()){
    $card.='<a href="index.php?page=message&id='.$row[user_id_from].'"><div class="chat-container w3-hover-gray w3-text-black">
    <img src="'.getUserAvatar($row['user_id_from']).'" alt="Avatar" width=60 height=60>
    <h4>'.$row["name"].'</h4>';
    $sql="SELECT * FROM discussion_chat WHERE chat_id=$row[chat_id] ORDER BY cdatetime DESC";
    $result1 = mysqli_query($con,$sql);
    $chatrow=$result1->fetch_assoc();if($chatrow[user_id]==$uid) $icon="fa-reply";
    else $icon="fa-envelope";
    $card.='<span><i class="fa '.$icon.'"></i> &nbsp'.$chatrow["message"].'</span>
    <span class="time-right">'.$chatrow["cdatetime"].'</span>
</div></a>';
}

?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Chats</li>
</ol>
<div class="validation-system w3-card-2">
    <div class="validation-form">
    <div class="w3-row">
            <div class="w3-third  w3-padding">
            </div>
            <div class="w3-third w3-border w3-padding">
                <a class="w3-blue w3-hover-red w3-button w3-ripple w3-round w3-show" href="index.php?page=search">Start A New Conversation</a>
            </div>
            <div class="w3-third  w3-padding">
            </div>
        </div><br>
        <header class="w3-container w3-light-grey">
            <h3>All Chats</h3>
        </header>
        <?php echo $card; ?>
    </div>
</div>