<?php

require('../connection.php');

extract($_GET);
$btn="Next Question";
$rc=$hide="";
$show="w3-hide";
$sql="select * from exam_question where test_id=$testid";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));

if(isset($subid) && isset($testid))
{
    $_SESSION[subid]=$subid;
    $_SESSION[tid]=$testid;
}
extract($_POST);
extract($_SESSION);
if(!isset($_SESSION[qn]))
{
  
    $_SESSION[qn]=0;
    $query="delete from exam_useranswer where sess_id='" . session_id() ."'";
	mysqli_query($con,$query) or die(mysqli_error());
	$_SESSION[trueans]=0;
	
}
else
{
    if($submit=='Next Question' && isset($ans))
    {
            mysqli_data_seek($rs,$_SESSION[qn]);
            $row= mysqli_fetch_row($rs);	
        
           mysqli_query($con,"insert into exam_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
            if($ans==$row[7])
            {
                        $_SESSION[trueans]=$_SESSION[trueans]+1;
            }
            $_SESSION[qn]=$_SESSION[qn]+1;
    }
    else if($submit=='Get Result' && isset($ans))
    {
            mysqli_data_seek($rs,$_SESSION[qn]);
            $row= mysqli_fetch_row($rs);	
            mysqli_query($con,"insert into exam_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
            if($ans==$row[7])
            {
                        $_SESSION[trueans]=$_SESSION[trueans]+1;
            }
            $_SESSION[qn]=$_SESSION[qn]+1;
            $rc.= "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
            $rc.= "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
            $w=$_SESSION[qn]-$_SESSION[trueans];
            $rc.= "<tr class=fans><td>Wrong Answer<td> ". $w;
            $rc.= "</table>";
            mysqli_query($con,"insert into exam_result(sid,test_id,score) values($_SESSION[user_id],$tid,$_SESSION[trueans])") or die(mysqli_error());
            $rc.= "<h1 align=center><a href=review.php> Review Question</a> </h1>";
            $hide="w3-hide";
            $show="w3-show";
            unset($_SESSION[qn]);
            unset($_SESSION[subid]);
            unset($_SESSION[tid]);
            unset($_SESSION[trueans]);
    }
}

$rs=mysqli_query($con,"select * from exam_question where test_id=$tid",$cn) or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
$n=$_SESSION[qn]+1;
?>

<div class="validation-system">
 		
 		<div class="validation-form">
<div class="w3-card-2 <?php echo $hide; ?>" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3><?php echo $cname." : ".$tname." - Exam" ?></h3>
</header>
<div class="w3-container">
<form action="<?php print $PHP_SELF?>" method="post">
    <div class="w3-border w3-margin w3-padding">
       <h4><?php echo "Question ".$n.": ".$row[2]; ?></h4>
    </div>
    <div class="w3-border w3-margin w3-padding">
        <p>
        <input class="w3-radio" type="radio" name="ans" value=1>
        <label><?php echo $row[3]; ?></label></p>
        <p>
        <input class="w3-radio" type="radio" name="ans" value=2>
        <label><?php echo $row[4]; ?></label></p>
        <p>
        <p>
        <input class="w3-radio" type="radio" name="ans" value=3>
        <label><?php echo $row[5]; ?></label></p>
        <p>
        <input class="w3-radio" type="radio" name="ans" value=4>
        <label><?php echo $row[6]; ?></label></p>
        <p>
    </div>
   <div class="col-md-4 form-group w3-center">
    <?php if(!($_SESSION[qn]<mysqli_num_rows($rs)-1)) $btn="Get Result"; ?>
     <button type="submit" name="submit" class="w3-button w3-green w3-card-2 w3-ripple w3-round w3-hover-red w3-show" value="<?php echo $btn; ?>"><?php echo $btn; ?></button>
   </div>
</form>
</div>
</div>
<div class="w3-card-2 <?php echo $show; ?>" style="width:100%">
<header class="w3-container w3-light-grey">
    <h3>Result</h3>
</header>
<div class="w3-container">
<?php echo $rc; ?>
</div>
</div>
</div>
</div>