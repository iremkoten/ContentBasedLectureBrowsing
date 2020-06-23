<?php
	
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$username=$_SESSION["activeuser"];
$videoid=$_GET['videoid'];
$sql = "DELETE FROM VIDEOS WHERE VIDEOID='$videoid';";
$result = $conn->query($sql);

header ("Location: upload.php");


?>
