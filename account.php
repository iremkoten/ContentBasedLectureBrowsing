<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Colebro Account</title>
    
    <style>
        a{
            text-decoration: none !important;
        }
    </style>
    
</head>
<body style="background-color:#ffffff;">


 <div id='d1' style="position:absolute; top:0px; left:0px; z-index:1"> 
    <canvas id="myCanvas">
    </canvas>
    </div>

    <div id='d2' style="position:absolute; top:-15px; left:10px; z-index:1"> 
        <a href="userLog2.php"><h1 style="color:#ffffff;  font-family:verdana; font-size: 40px;">COLEBRO</h1></a>
    </div>
	
	<div id='d4' style="position:absolute; top:80px; right:3%; z-index:1"> 
        <a href="logout.php"><h1 name style="color:#000000; font-family:arial; font-size:18px; text-decoration: underline;">Logout</h1></a>
    </div>
	
	<div id='d5' style="position:absolute; top:120px; left:3%; z-index:1"> 
        <a href="userLog2.php"><h1 name style="color:#000000; font-family:arial; font-size:18px; text-decoration: underline;">Search</h1></a>
    </div>
	
	<div id='d6' style="position:absolute; top:120px; left:10%; z-index:1"> 
        <a href="mylist.php"><h1 name style="color:#000000; font-family:arial; font-size:18px; text-decoration: underline;">My List</h1></a>
    </div>
	
	<div id='d4' style="position:absolute; top:120px; left:17%; z-index:1"> 
        <a href="upload.php"><h1 name style="color:#000000; font-family:arial; font-size:18px; text-decoration: underline;">Upload</h1></a>
    </div>
	
	<div id='d4' style="position:absolute; top:120px; left:24%; z-index:1"> 
        <a href="account.php"><h1 name style="color:#000000; font-family:arial; font-size:18px; text-decoration: underline;">Account</h1></a>
    </div>
	
	
	
    
    <script>
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        ctx.canvas.width  = window.innerWidth;
        ctx.canvas.height = window.innerHeight;
        ctx.fillStyle = "#31a7e6";
        ctx.fillRect(0,0,3000,70);
        
    </script>
	
	<div id='d3' style="position:absolute; top:100px; left:2%; z-index:1"> 
    <label style="font-family: arial" for="usr">Active User: <?php session_start(); echo $_SESSION["activeuser"];?></label>
    </div> 
<?php
	$servername = "localhost:3306";
$username = "colebroDB";
$password = "samfyf-xAkfeq-4donto";
$dbname = "st4362761_";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

$sql = "SELECT * FROM log ";
$result = $conn->query($sql);
	
while($row=$result->fetch_assoc()) {
			if($_SESSION["activeuser"]==$row['USERNAME']){
				break;
			}
}?> 
	
	<div id='d9' style="position:absolute; top:200px; left:5%; z-index:1"> 
    <label style="font-family: arial; border-style: solid; background-color: #8FE1FF;">Username: </label>

    </div>
	
	<div id='d9' style="position:absolute; top:200px; left:13%; z-index:1"> 
		    <label style="font-family: arial;">  <?php echo $_SESSION["activeuser"]?> </label>
		</div>
    
    <div id='d8' style="position:absolute; top:230px; left:5%; z-index:1"> 
    <label style="font-family: arial; border-style: solid; background-color: #8FE1FF;">Password: </label>
    </div>
	
	<div id='d8' style="position:absolute; top:230px; left:13%; z-index:1"> 
		<label style="font-family: arial;"> ******** <?php echo '<a href="changepass.php">Change Password</a>';?></label>
		
		 </div>
	
	 <div id='d6' style="position:absolute; top:260px; left:5%; z-index:1"> 
	<label style="font-family: arial; border-style: solid; background-color: #8FE1FF;">Mail: </label>
    
    </div>
	
	<div id='d6' style="position:absolute; top:260px; left:13%; z-index:1"> 
		<label style="font-family: arial"><?php echo $row['MAIL']; ?></label>
		 </div>
  
    <div id='d10' style="position:absolute; top:290px; left:5%; z-index:1"> 
	<label style="font-family: arial; border-style: solid; background-color: #8FE1FF;">Gender: </label>
    </div>
	
	 <div id='d10' style="position:absolute; top:290px; left:13%; z-index:1"> 
		 <label style="font-family: arial"><?php echo $row['GENDER']; ?></label>
		 </div>
    
    <div id='d11' style="position:absolute; top:320px; left:5%; z-index:1">
	<label style="font-family: arial; border-style: solid; background-color: #8FE1FF;">Age: </label>
    </div>
	
	<div id='d11' style="position:absolute; top:320px; left:13%; z-index:1">
		    <label style="font-family: arial"><?php echo $row['AGE']; ?></label>
		</div>
			
	
		<?php 
	if($_SESSION["activeuser"]==NULL)
		header ("Location: index.php");
	?>
   
    
</body>
</html>