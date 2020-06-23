<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Colebro Search</title>
    
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
    <label style="font-family: arial" for="usr">Active User: <?php session_start(); echo $_SESSION["activeuser"]?> </label>
    </div>
	
		<?php 
	if($_SESSION["activeuser"]==NULL)
		header ("Location: index.php");
	?>
	
<?php	
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$username=$_SESSION["activeuser"];
$sql = "SELECT VIDEOID FROM MYLIST WHERE USERNAME='$username';";
$result = $conn->query($sql);

?>
	
	
	<div id='d3' style="position:absolute; top:200px; left:2%; z-index:1"> 
    <label style="font-family: arial"> My List <?php while($row=$result->fetch_assoc()) { 
	$videonum=$row['VIDEOID'];
	$sql = "SELECT * FROM `VIDEOS` WHERE VIDEOID=$videonum";
    $result2 = $conn->query($sql); while($row=$result2->fetch_assoc()) { 
	echo '<pre>'; echo $row['USERNAME']; echo " ||| " ;echo $row['VIDEONAME']; echo " ||| "; echo $row['VIDEOINFO']; echo '<pre>';echo "Video hit: "; echo $row['VIDEOHIT']; echo " ||| Video like: "; echo $row['VIDEOLIKE']; echo "  ";if($count>0){echo "||| Count word($search):" ; echo $count; echo "  " ;}echo '<a href="videoplay.php?link=' . $row['VIDEOPATH'] . '&videoname='.$row['VIDEONAME'].'&videoinfo='.$row['VIDEOINFO'].'&videohit=' .$row['VIDEOHIT'].'&videoid='.$row['VIDEOID'].'&videolike='.$row['VIDEOLIKE'].'">Go to video</a>';}
} ?>  </label>
    </div>
	
    
</body>
</html>
