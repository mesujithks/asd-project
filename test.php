<?php
$a="w3-grren";
$b="w3-show";
echo $a." ".$b;
function getName($id){
    require('connection.php');
    $query="SELECT name FROM users WHERE id='$id'";
    echo "hi";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    if($result){
        $row=$result->fetch_assoc();
        echo $row["name"];
    }
    return "";
}
echo getName(4);
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>