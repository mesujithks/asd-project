<?php
    require('connection.php');
	
	$usenameErr=$passwordErr=$username=$password="";
    $flag=0;

   
    if ($_SERVER["REQUEST_METHOD"]=="POST" && $_POST['action']=="login"){
        if(!isset($_SESSION["username"])){
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            $query = "SELECT * FROM `users` WHERE email='$username' and pass='".md5($password)."'";
            $result = mysqli_query($con,$query) or die(mysqli_error());
            $rows = mysqli_num_rows($result);

            if($rows==1){
                $_SESSION['username'] = $username;
                $row=$result->fetch_assoc();
                $_SESSION['user_id']=$row["id"];
                $_SESSION['type']=$row["type"];
                if($_POST['remember']=="on"){
                    setcookie("username", $username, time()+(86400 * 30), "/","", 0);
                    setcookie("user_id", $row["id"], time()+(86400 * 30), "/","", 0);
                    setcookie("type", $row["type"], time()+(86400 * 30), "/","", 0);
                }
                switch($row["type"]){
                    case "admin": header("Location: admin/index.php"); break;
                    case "faculty": header("Location: faculty/index.php"); break;
                    case "student": header("Location: student/index.php"); break;
                    default : header("Location: index.php"); break; 
                }
            }else {$s= '<script>
                showSnakbar("w3-red","Invalid Username/Password, Try again.!");
                </script>';
            }
        }else {
            header("Location: index.php");
            exit();
        }
		
	}
    
   function test_input($data) {
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>