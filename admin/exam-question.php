<?php
    require('../connection.php');
    extract($_GET);
    $edit= $eid;    
    $sstatus="w3-hide";
    $clr="w3-green";
    $hd="Success!";
    $hiden='<input type="hidden" name="action" value="add">';
    $list="";


    extract($_POST);
    
    if (isset($submit)){
        for ($i = 0; $i < $tq; $i++) {
        $query="UPDATE `exam_question` SET `que_desc` = '$ques[$i]', `ans1` = '$op1[$i]', `ans2` = '$op2[$i]', `ans3` = '$op3[$i]', `ans4` = '$op4[$i]', `true_ans` = '$ans[$i]' WHERE `exam_question`.`que_id` = $queid[$i]";
        $result = mysqli_query($con,$query);
        if($result){
            $sstatus="w3-show";
            $smsg="Questions List is updated successfully.!";
        }
    }
        
    }


    $sql  = "SELECT * FROM `exam_question` WHERE test_id=$eid";
    $result = mysqli_query($con,$sql);
    for ($i = 1; $i <= $tq; $i++) {
        $row=$result->fetch_assoc();
        $list.='<tr>
    <td><div class="w3-center w3-padding">'.$i.'</div><input type="hidden" name="queid[]" value="'.$row['que_id'].'"></td>
    <td><input type="text" placeholder="Enter Question" name="ques[]" required="" value="'.$row['que_desc'].'"></td>
    <td><input type="text" placeholder="Enter Option 1" name="op1[]" required="" value="'.$row['ans1'].'"></td>
    <td><input type="text" placeholder="Enter Option 2" name="op2[]" required="" value="'.$row['ans2'].'"></td>
    <td><input type="text" placeholder="Enter Option 3" name="op3[]" required="" value="'.$row['ans3'].'"></td>
    <td><input type="text" placeholder="Enter Option 4" name="op4[]" required="" value="'.$row['ans4'].'"></td>';
    if($row['true_ans']==null)
        $op="Choose your option";
    else $op="Choosed Option : ".$row['true_ans'];
    $list.='
    <td><select class="w3-select" name="ans[]" required="">
            <option value="'.$row['true_ans'].'" selected>'.$op.'</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
            <option value="4">Option 4</option>
        </select>
    </td>
</tr>';
    }

    
?>
<ol class="breadcrumb w3-card-2">
    <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="index.php?page=exam">Exam</a><i class="fa fa-angle-right"></i>Add/Edit Questions</li>
</ol>

<div class="w3-panel w3-round <?php echo $sstatus." ".$clr; ?>">
<h3><?php echo $hd; ?></h3>
<p><?php echo $smsg; ?></p>
</div>

<div class="validation-system w3-card-2">

<div class="validation-form">
<!---->
 
<form action="<?php print $PHP_SELF?>" method="post">
<input type="hidden" name="cid" value="<?php echo $id; ?>">
<?php echo $hiden; ?>
    <div class="vali-form">
   <div class="col-md-12 form-group1">
   <table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>No.</th>
        <th>Question</th>
        <th>Option 1</th>
        <th>Option 2</th>
        <th>Option 3</th>
        <th>Option 4</th>
        <th>Answer</th>
      </tr>
    </thead>
    <?php echo $list; ?>
  </table>
 </div>

   <div class="col-md-12 form-group w3-center"><br>
     <button type="submit" name="submit" class="w3-button w3-blue w3-card-2 w3-ripple w3-round w3-hover-red" <?php echo $flag; ?>>Submit</button>
   </div>
 <div class="clearfix"> </div>
</form>
<!---->
</div>

</div>
</div>
<div class="w3-card-2">