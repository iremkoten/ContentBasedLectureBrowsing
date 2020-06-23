<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

$userControl=0;
$mailControl=0;
$username=$_POST['usr'];
$password=$_POST['pwd'];
$password2=$_POST['pwd2'];
$mail=$_POST['mail'];
$gender=$_POST['option'];
$age=$_POST['age'];

$sql = "SELECT * FROM log";
$result = $conn->query($sql);


 while($row=$result->fetch_assoc()) {
			if($username==$row['USERNAME']){
				$userControl=1;
			}
	 		if($mail==$row['MAIL'])
				$mailControl=1;
}

if($mailControl==0){

if($userControl==0){

if($password==$password2){
	
$sql = "INSERT INTO LOG (USERNAME, PASSWORD,MAIL,GENDER,AGE)
VALUES ('$username','$password','$mail','Male','$age')";

if ($conn->query($sql) === TRUE) {
	header ("Location: welcomeColebro.html");
} else {
	header ("Location: errorsignUp.html");
}
}
else {
	
	header ("Location: errorpass.html");

}
}

else {
	
	header ("Location: errrorusername.html");
	
}
}
else {
	
	header ("Location: errormail.html");
	
}

$conn->close();

?>
