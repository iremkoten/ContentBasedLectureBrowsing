<?php 
session_start();
	if($_SESSION["activeuser"]!=NULL)
		header ("Location: userLog2.php");
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Colebro</title>
    
    <style>
        a{
            text-decoration: none !important;
        }
    </style>
    
</head>
<body style="background-color:#31a7e6;">
   
    <div id='d1' style="position:absolute; top:0px; left:0px; z-index:1"> 
    <canvas id="myCanvas">
    </canvas>
    </div>
    
    
    <div id='d2' style="position:absolute; top:-15px; left:10px; z-index:1"> 
        <a href="index.php"><h1 style="color:#31a7e6;  font-family:verdana; font-size: 40px;">COLEBRO</h1></a>
    </div>
    
    <div id='d3' style="position:absolute; top:150px; left:100px; z-index:1"> 
    <p style="color:#ffffff;  font-family:arial; font-size: 70px;"> Welcome to COLEBRO </p>
    </div>
    
    <div id='d4' style="position:absolute; top:300px; left:100px; z-index:1"> 
    <h2 style="color:#ffffff;  font-family:arial; font-size: 25px;"> -Find easily what you are looking for from the course content processed with Colebro </h2>
    </div>
    
    <div id='d5' style="position:absolute; top:350px; left:100px; z-index:1"> 
    <h3 style="color:#ffffff;  font-family:arial; font-size: 25px;"> -Upload videos for everyone </h3>
    </div>
    
    <div id='d6' style="position:absolute; top:400px; left:100px; z-index:1"> 
    <h4 style="color:#ffffff;  font-family:arial; font-size: 25px;"> -Create and customize account </h4>
    </div>
    
    <div id='d7' style="position:absolute; top:450px; left:100px; z-index:1"> 
    <h5 style="color:#ffffff;  font-family:arial; font-size: 25px;"> -Save your favourite videos </h5>
    </div>

    <script>
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        ctx.canvas.width  = window.innerWidth;
        ctx.canvas.height = window.innerHeight;
        ctx.fillStyle = "#ffffff";
        ctx.fillRect(0,0,3000,70);
    </script>
    
    <form action="userLog.php" method="post"> 
    
    <div id='d8' style="position:absolute; top:4%; right:33%; z-index:1"> 
    <label style="font-family: arial" for="usr">Username:</label>
    <input id="usr" name="usr" required>
    </div>
    
    <div id='d9' style="position:absolute; top:4%; right:14%; z-index:1"> 
    <label style="font-family: arial" for="pwd">Password:</label>
    <input type="password" id="pwd" name="pwd" minlength="8" required>
    </div>
    
    <div id='d10' style="position:absolute; top:4%; right: 9%; z-index:1"> 
    <input type="submit" value="Sign In">
    </div>
    
    </form>
    
    <form action="signUp.html">
    
    <div id='d11' style="position:absolute; top: 4%; right:4%; z-index: 1"> 
    <input type="submit" value="Sign Up">
    </div>
    
    </form>
    
   
    
</body>
</html>