<?php
	session_start();
	
	if(!isset($_SESSION["username"])){
		if(strpos($_SERVER['PHP_SELF'],"asd-project/index.php")==null){
			header("Location: ../index.php");
		}
	}
	else {
			switch($_SESSION["type"]){
				case "admin": header("Location: ../admin/index.php"); break;
				case "faculty": header("Location: ../faculty/index.php"); break;
				case "student": header("Location: ../student/index.php"); break;
			}
	}
?>
