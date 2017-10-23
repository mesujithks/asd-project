<?php
	require('connection.php');
	session_start();
	if(isset($_COOKIE['username']) && isset($_COOKIE['user_id']) && isset($_COOKIE['type'])) {
		$_SESSION['username'] = $_COOKIE['username'];
		$_SESSION['user_id'] = $_COOKIE['user_id'];
		$_SESSION['type'] = $_COOKIE['type'];
	}
	if(!isset($_SESSION["username"])){
		if(strpos($_SERVER['PHP_SELF'],"asd-project/index.php")==null){
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
