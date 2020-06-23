<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

session_start();

$username=$_POST['usr'];
$password=$_POST['pwd'];
$userControl=0;
$passControl=0;

$_SESSION["activeuser"] = $username;

$sql = "SELECT * FROM log";
$result = $conn->query($sql);


 while($row=$result->fetch_assoc()) {
			if($username==$row['USERNAME']){
				$userControl=1;
			}
	 		if($password==$row['PASSWORD'])
				$passControl=1;
}

if($userControl==1 && $passControl==1)
	 header ("Location: userLog2.php");
else
	header ("Location: wrongLog.html");
	
$conn->close();

?>
