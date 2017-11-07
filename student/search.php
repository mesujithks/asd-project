<?php
require('../connection.php');
$card="";
extract($_POST);
if(isset($submit)){
    $query="SELECT * FROM users WHERE name LIKE '$name%'";
    $result = mysqli_query($con,$query);
    while($row=$result->fetch_assoc()){
        $card.='<div class="w3-border-bottom w3-border-red">
        <div class="w3-row-padding w3-margin">
                <div class="w3-col w3-center w3-cell w3-mobile" style="width:15%">
                    <p><img class="prfil-pic w3-card-2" width=50 height=50 src="'.$row['image'].'"></img></p>
                </div>
                <div class="w3-col w3-cell w3-mobile" style="width:85%;overflow: auto;">
                    <div class="w3-panel">
                        <p><strong>'.$row['name'].'</strong> ('.$row['type'].')</p>
                        <a class="w3-button w3-ripple w3-green w3-hover-red w3-round" href="index.php?page=message&id='.$row['id'].'">MESSAGE</a>
                    </div>
                </div>
        </div>
        </div>';
    }
}
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=chat">Chat</a><i class="fa fa-angle-right"></i>Search</li>
</ol>
<div class="validation-system w3-card-2">
    <div class="validation-form">
        <!---->
        <header class="w3-container w3-light-grey">
            <h3>Start New Conversation</h3>
        </header>
             
           <form method="POST">
                <div class="vali-form w3-border-bottom w3-border-green">
                    <div class="clearfix"> </div>
                    <div class="w3-row-padding">
                        <div class="w3-half">
                            <input class="w3-input w3-border w3-margin-bottom w3-round" type="text" placeholder="Enter Name To Search.." name="name" required>
                        </div>
                        <div class="w3-half">
                                <button type="submit"  name="submit" class="w3-button w3-ripple w3-blue w3-hover-red w3-round">Search</button>
                        </div>
                    </div> 
                </div>
             <div class="clearfix"> </div>
           </form>
        <!---->

        <div class="w3-container">
            <?php echo $card; ?>
        </div>
    </div>
</div>
   
