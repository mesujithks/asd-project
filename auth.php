<?php
require('database/connection.php');
session_start();
if(!isset($_SESSION["username"])){
	if(strpos($_SERVER['PHP_SELF'],"asd-project/index.php")==null && (strpos($_SERVER['PHP_SELF'],"asd-project/admin/index.php")!=null || strpos($_SERVER['PHP_SELF'],"asd-project/faculty/index.php")!=null || strpos($_SERVER['PHP_SELF'],"asd-project/student/index.php")!=null)){
		header("Location: ../index.php");
	}
 }
else {
	if(strpos($_SERVER['PHP_SELF'],"asd-project/index.php")!=null){
		switch($_SESSION["type"]){
			case "admin": header("Location: admin/index.php"); break;
			case "faculty": header("Location: faculty/index.php"); break;
			case "student": header("Location: student/index.php"); break;
		}
	}
}
?>
