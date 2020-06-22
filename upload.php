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
    <label style="font-family: arial" for="usr">Active User: <?php session_start(); echo $_SESSION["activeuser"];?> </label>
    </div>
	
		<?php 
	if($_SESSION["activeuser"]==NULL)
		header ("Location: index.html");
	?>
	

<form enctype="multipart/form-data" action="uploadvideo.php" method="POST">
	 <div id='d10' style="position:absolute; top:200px; left:5%; z-index:1"> 
	<label style="font-family: arial">Title:</label>
    <input id="title" name="title" style="position:absolute; left:55px; z-index:1" required>
	</div>
	
	<div id='d10' style="position:absolute; top:230px; left:5%; z-index:1"> 
	<label style="font-family: arial">Video Info:</label>
    <input id="videoinfo" name="videoinfo" style="position:absolute; left:90px; z-index:1" required>
	</div>
	
	<div id='d10' style="position:absolute; top:320px; left:5%; z-index:1"> 
		<label style="font-family: arial">If you want your videos to appear in content based search, you can use the links below</label>
	</div>
	
	<div id='d10' style="position:absolute; top:350px; left:5%; z-index:1">
		<a href="/app.app.zip" target="_blank"><h1 style="color:#000000;  font-family:verdana; font-size: 20px; text-decoration:underline;">Mac OS</h1></a>
	</div>
	
	<div id='d10' style="position:absolute; top:350px; left:15%; z-index:1">
		<a href="/colebroapp.exe" target="_blank"><h1 style="color:#000000;  font-family:verdana; font-size: 20px; text-decoration:underline;">Windows</h1></a>
	</div>
	
    <div id='d10' style="position:absolute; top:280px; left:5%; z-index:1"> 
	<input type="file" name="kullanici_dosyasi" size="50" />
    <input type="submit" value="Upload" />
		</div>
</form>
	
<?php
	
$servername = "localhost:3306";
$username = "colebroDB";
$password = "samfyf-xAkfeq-4donto";
$dbname = "st4362761_";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$username=$_SESSION["activeuser"];
$sql = "SELECT * FROM VIDEOS WHERE USERNAME='$username';";
$result = $conn->query($sql);
?>
	
	<div id='d3' style="position:absolute; top:420px; left:2%; z-index:1"> 
    <label style="font-family: arial"> My Uploads <?php while($row=$result->fetch_assoc()) { 
	echo '<pre>'; echo $row['USERNAME']; echo " ||| " ;echo $row['VIDEONAME']; echo " ||| "; echo $row['VIDEOINFO']; echo '<pre>';echo "Video hit: "; echo $row['VIDEOHIT']; echo " ||| Video like: "; echo $row['VIDEOLIKE']; echo "  ";if($count>0){echo "||| Count word($search):" ; echo $count; echo "  " ;}echo '<a href="delete.php?link=' . $row['VIDEOPATH'] . '&videoname='.$row['VIDEONAME'].'&videoinfo='.$row['VIDEOINFO'].'&videohit=' .$row['VIDEOHIT'].'&videoid='.$row['VIDEOID'].'&videolike='.$row['VIDEOLIKE'].'">Delete</a>';}
 ?>  </label>
    </div>

	
	
	
		<?php 
	if($_SESSION["activeuser"]==NULL)
		header ("Location: index.php");
	?>
	
	
   
    
</body>
</html>