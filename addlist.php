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
	
	<!DOCTYPE html>
<html>
<body>
	
	
	<?php	
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

$id=$_GET['videoid'];
$username=$_SESSION["activeuser"];	
$sql = "INSERT INTO MYLIST (USERNAME,VIDEOID)
VALUES ('$username','$id')";
$result = $conn->query($sql);
	
?>
	
	<div id='d3' style="position:absolute; top:170px; left:2%; z-index:1"> 
		
		<h1> <?php echo $_GET['videoname'];?> </h1>
		</div>
	
	<div id='d3' style="position:absolute; top:180px; right:2%; z-index:1"> 
		
		<?php
		
		$control=0;
		$sql = "SELECT * FROM MYLIST";
		$result2 = $conn->query($sql);
		
		while($row=$result2->fetch_assoc()) {
			
			if($row['USERNAME']==$username && $row['VIDEOID']==$id){
				$control=1;
				break;
			
		}
		
		}
		
		$control1=0;
		$sql = "SELECT * FROM VIDEOLIKE";
		$result3 = $conn->query($sql);
		
		while($row=$result3->fetch_assoc()) {
			
			if($row['USERNAME']==$username && $row['VIDEOID']==$id){
				$control1=1;
				break;
			
		}
		}
		
		
		
		
		
		?>
		
		<p> <?php echo "Video Info"; echo '<pre>'; echo $_GET['videoinfo'];  echo '<pre>'; echo "Watch:"; echo $_GET['videohit']; echo '<pre>'; echo "Likes:"; echo $_GET['videolike']; if($control1!=1){echo '<a href="like.php?link=' . $_GET['link'] . '&videoname='.$_GET['videoname'].'&videoinfo='.$_GET['videoinfo'].'&videohit=' .$_GET['videohit'].'&videoid='.$_GET['videoid'].'&videolike='.$_GET['videolike'].'" >  Like</a>' ;} if($control!=1){echo '<a href="addlist.php?link=' . $_GET['link'] . '&videoname='.$_GET['videoname'].'&videoinfo='.$_GET['videoinfo'].'&videohit=' .$_GET['videohit'].'&videoid='.$_GET['videoid'].'&videolike='.$_GET['videolike'].'" >  Add my list</a>';}

?> </p>
		</div>


	<div id='d3' style="position:absolute; top:250px; left:2%; z-index:1"> 
<video width="700" controls autoplay>
   <source src="videos/<?php echo $_GET['link'];?>" type="video/mp4">
  Your browser does not support the video tag.
</video>
		</div>

</body>
</html>
	
	

	
    
</body>
</html>
