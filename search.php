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
$servername = "localhost:3306";
$username = "colebroDB";
$password = "samfyf-xAkfeq-4donto";
$dbname = "st4362761_";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

$searchC=$_POST['searchC'];
$search=$_POST['search'];
$count=0;

	if($searchC=='content'){
		
		$sql = "SELECT * FROM videos WHERE METAIMG LIKE '%$search%' OR METAVOICE LIKE '%$search%' ORDER BY VIDEOHIT DESC,VIDEOLIKE DESC;";
		$result = $conn->query($sql);
		
		$sql = "SELECT SUM(total_count) as total, value FROM ( SELECT count(*) AS total_count, REPLACE(REPLACE(REPLACE(x.value,'?',''),'.',''),'!','') as value FROM ( SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(METAVOICE, ' ', n.n), ' ', -1) value FROM videos t CROSS JOIN ( SELECT a.N + b.N * 10 + 1 n FROM (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a ,(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b ORDER BY n ) n WHERE n.n <= 1 + (LENGTH(METAVOICE) - LENGTH(REPLACE(METAVOICE, ' ', ''))) ORDER BY value ) AS x GROUP BY x.value ) AS y GROUP BY value";
		$result1 =  $conn->query($sql);
		while($row=$result1->fetch_assoc()) {
			
			if($row['value']==$search){
				break;
			}
			
		}
		
		$count=$row['total'];
		
		
		
	}
	else{
		
		$sql = "SELECT * FROM videos WHERE VIDEONAME LIKE '%$search%' ORDER BY VIDEOHIT DESC,VIDEOLIKE DESC;";
		$result = $conn->query($sql);
		
		
	}
	
	if($search==NULL){
		header ("Location:userLog2.php");
	}
	else if ($search==" "){
		header ("Location:userLog2.php");
	}

?>
	<div id='d3' style="position:absolute; top:180px; left:2%; z-index:1"> 
	<label style="font-family: arial; border-style: solid; background-color: #8FE1FF; "> RESULT </label>
	</div>
	
	<div id='d3' style="position:absolute; top:200px; left:2%; z-index:1"> 
    <label style="font-family: arial "> <?php $cont=0; while($row=$result->fetch_assoc()) {
	$cont=$cont+1;
	echo '<pre>'; echo $row['USERNAME']; echo " ||| " ;echo $row['VIDEONAME']; echo " ||| "; echo $row['VIDEOINFO']; echo '<pre>';echo "Video hit: "; echo $row['VIDEOHIT']; echo " ||| Video like: "; echo $row['VIDEOLIKE']; echo "  ";if($count>0){echo "||| Count word($search):" ; echo $count; echo "  " ;}echo '<a href="videoplay.php?link=' . $row['VIDEOPATH'] . '&videoname='.$row['VIDEONAME'].'&videoinfo='.$row['VIDEOINFO'].'&videohit=' .$row['VIDEOHIT'].'&videoid='.$row['VIDEOID'].'&videolike='.$row['VIDEOLIKE'].'">Go to video</a>';
} ?>  </label>
    </div>
	
	<div id='d3' style="position:absolute; top:240px; left:2%; z-index:1"> 
		<label style="font-family: arial "> <?php if($cont==0){echo "No results matching the criteria";} ?></label>
	</div>
	
    
</body>
</html>