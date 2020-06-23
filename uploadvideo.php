<?php 

session_start();
$targetfolder = "videos/".$_SESSION["activeuser"]."-";

 $targetfolder = $targetfolder . basename( $_FILES['kullanici_dosyasi']['name']) ;

if(move_uploaded_file($_FILES['kullanici_dosyasi']['tmp_name'], $targetfolder))

 {
	
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

$username=$_SESSION["activeuser"];
$videoname=$_POST['title'];
$videoinfo=$_POST['videoinfo'];
$videopath=$_SESSION["activeuser"]."-".$_FILES['kullanici_dosyasi']['name'];

	
$sql = "INSERT INTO VIDEOS (USERNAME, VIDEONAME,VIDEOINFO,VIDEOPATH,VIDEOHIT,VIDEOLIKE)
VALUES ('$username','$videoname','$videoinfo','$videopath','0','0')";
	
if ($conn->query($sql) === TRUE) {
	echo "The file ". basename( $_FILES['kullanici_dosyasi']['name']). " is uploaded";
} 
	else {

 echo "Problem uploading file";

 }


 }

 else {

 echo "Problem uploading file";

 }
?>

