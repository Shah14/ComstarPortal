<?php
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["Admin"];
$result1=mysqli_query($con,"SELECT * FROM `advertisement` WHERE `ID`='$_POST[id]'");
while($row = $result1->fetch_assoc()) {
  unlink('../../assets/advertisement/'.$row["Banner"]) ; //remove file from folder
  $title=$row["Title"];
}

$target_dir = "../../assets/advertisement/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 100000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

rename("../../assets/advertisement/".$_FILES["fileToUpload"]["name"],"../../assets/advertisement/".$title.".".$imageFileType); //press ctrl+f5 to hard refresh if image didnt update
$filename= $title.".".$imageFileType;
$sql="UPDATE `advertisement` SET `Banner`='$filename',`Date Updated`=now() WHERE ID='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}header("Location: advertisement.php?name=$_POST[title] ".date('Y-m-d H:i:s')."");
$_SESSION["Alert"] = "You have successfully edited an advertisement!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='advertisement.php'">Back</button>
</body>
</html>