<?php
	
$servername = "localhost:3306";
$username = "colebroDB";
$password = "samfyf-xAkfeq-4donto";
$dbname = "st4362761_";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$username=$_SESSION["activeuser"];
$videoid=$_GET['videoid'];
$sql = "DELETE FROM VIDEOS WHERE VIDEOID='$videoid';";
$result = $conn->query($sql);

header ("Location: upload.php");


?>