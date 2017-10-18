<?php
echo $_SERVER['PHP_SELF'];
echo "\n";
if(strpos($_SERVER['PHP_SELF'],"asd-project/admin/test.php")==null) echo "not found";
?>