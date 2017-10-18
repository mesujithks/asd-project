<?php
$cedit=$_GET['cedit'];
if($cedit!=""){
    setcookie("cedit", $cedit, time()+5, "/","", 0);
    header("Location: index.php?page=course-add");
}

?>