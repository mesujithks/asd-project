<?php
require('../connection.php');

extract($_GET);
$query="SELECT * from users where id=$id";
$result = mysqli_query($con,$query);
$row=$result->fetch_assoc();
$toname=$row['name'];
$toid=$row['id'];
$type=$row['type'];
$frmid=$_SESSION['user_id'];
$card="";
$cid=getChatId($frmid,$toid);

extract($_POST);
if(isset($submit)){
    if(getChatId($frmid,$toid)==-1){
        $query="INSERT INTO discussion_chatmaster (user_id_from,user_id_to) values ($frmid,$toid)";
        $result = mysqli_query($con,$query);
    }
    $cid=getChatId($frmid,$toid);
    $query="INSERT INTO discussion_chat (user_id, chat_id, message) values ($frmid,$cid,'$reply')";
    $result = mysqli_query($con,$query);
    if($result){
        
    }
	
}

if(getChatId($frmid,$toid)!=-1){

    $query = "SELECT * FROM discussion_chat WHERE chat_id=$cid ORDER BY cdatetime ASC";

    $result = mysqli_query($con,$query);
    while($row=$result->fetch_assoc()){
        if ($row["user_id"] == $frmid){
            $card.='<div class="chat-container darker" style="width:50%">
            <img src="'.getUserAvatar($frmid).'" alt="Avatar" class="right" width=60 height=60>
            <p>'.$row["message"].'</p>
            <span class="time-left">'.$row["cdatetime"].'</span>
        </div>';
        }else {
            $card.='<div class="chat-container" style="width:50%">
            <img src="'.getUserAvatar($toid).'" alt="Avatar" width=60 height=60>
            <p>'.$row["message"].'</p>
            <span class="time-right">'.$row["cdatetime"].'</span>
        </div>';
        }
    }
}

function getChatId($frm,$to){
    require('../connection.php');
    $query = "SELECT chat_id as cid FROM discussion_chatmaster WHERE user_id_from IN ($frm,$to) AND user_id_to IN ($frm,$to)";

    $result = mysqli_query($con,$query);
    echo mysqli_error($con);
    $rows = mysqli_num_rows($result);
    if($rows>0){
        $row = $result->fetch_assoc();
        return $row['cid'];
    }else {
        return -1;
    }
}
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=chat">Chat</a><i class="fa fa-angle-right"></i><?php echo $toname; ?></li>
</ol>
<div class="validation-system w3-card-2">
    <div class="validation-form">
        <div class="w3-card-2 w3-round">
            <div class="w3-container w3-center w3-teal w3-round w3-padding " >
                <span class="prfil-img"><img src="<?php echo getUserAvatar($toid); ?>" alt="Avatar" width=60 height=60> </span> 
                    <h3><?php echo $toname; ?></h3>
                    <span><?php echo $type; ?></span>
            </div>
        </div>
        <div style="">
        <?php echo $card; ?>
    </div>
        
        <form method="POST">
                <div class="vali-form w3-border-top w3-border-green">
                    <div class="clearfix"> </div>
                    <input type="hidden" name="toid" value="<?php echo $toid; ?>">
                    <input type="hidden" name="frmid" value="<?php echo $frmid; ?>">
                    <div class="w3-row-padding">
                        <div class="w3-half form-group1">
                        <textarea  placeholder="Type New Message..." name="reply" required=""></textarea>
                        </div>
                        <div class="w3-half">
                                <button type="submit"  name="submit" class="w3-button w3-ripple w3-blue w3-hover-red w3-round w3-margin">Sent</button>
                        </div>
                    </div> 
                </div>
             <div class="clearfix"> </div>
           </form>

    </div>
</div>