<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

session_start(); 
$username=$_SESSION["activeuser"];
$password=$_POST['pwd'];
$password2=$_POST['pwd2'];


if($password==$password2){
	 $sql = "UPDATE LOG SET PASSWORD = '$password' WHERE USERNAME = '$username';";
 	 $conn->query($sql);
	 header ("Location: account.php");
}
else
	header ("Location: wrongpasschange.php");
	
$conn->close();

?>
