<?php
include("database/auth.php"); 
require("database/connection.php");

$successMessage = "";
$color="w3-red";
$display="none";
$headm="";
$msg="";
$flag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action']=="signup") {

    $name = test_input($_POST['fullname']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $type = test_input($_POST['type']);
    $mobile = test_input($_POST['mobile']);
    $gender = test_input($_POST['gender']);
    $dob = test_input($_POST['dob']);
    
    $query = "INSERT into `users` (name, email, pass, type, mobile, gender, dob) VALUES ('$name', '$email', '" . md5($password) . "', '$type', '$mobile', '$gender', '$dob')";
    $result = mysqli_query($con, $query);
    if ($result) {

        $query = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($con, $query);
        if ($result) {

            $row = $result->fetch_assoc();
            $userId = $row["id"];
            if($row["type"]=="student"){
                $query = "INSERT into `students` (studentId) VALUES ($userId)";
                $result = mysqli_query($con, $query);
                $flag=1;
            }else if($row["type"]=="faculty"){
                $query = "INSERT into `faculty` (facultyId) VALUES ($userId)";
                $result = mysqli_query($con, $query);
                $flag=1;
            }
            
            if ($flag) {
                $color="w3-green";
                $display="block";
                $headm="Success!";
                $msg="You are succesfully registered. Please login below..!";
            } else {
                $query = "DELETE `users` WHERE email='$email'";
                $result = mysqli_query($con, $query);
            }
        }
    }
    
}

?>