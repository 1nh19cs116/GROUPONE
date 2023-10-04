<?php
error_reporting(E_ERROR | E_PARSE);
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$mysql=mysqli_connect("localhost","root")
or die("can't connect");
mysqli_select_db($mysql,"miniproj")
or die("can't select");
mysqli_query($mysql,"insert into login values('$username','$password','$email')")
or die("query failed to insert");
$result=mysqli_query($mysql,"select * from login");

?>

<html>  
<head><title>LOGIN CREDENTIALS</title>
<style>
body {  background-color: #301934;}
p,h3,a{font-family: Helvetica;
  font-size: 30px;
  font-weight: 200;
  background-image: linear-gradient(#553c9a, #b393d3);
  color: #fdfdfe;
  text-shadow: 0px 0px 5px #b393d3, 0px 0px 10px #b393d3, 0px 0px 10px #b393d3,
    0px 0px 20px #b393d3;
  background-clip: text;
  -webkit-background-clip: text; }
table{font-family: Helvetica;
  font-size: 15px;
  font-weight: 200;
  background-image: linear-gradient(#553c9a, #b393d3);
  color: #fdfdfe;
  text-shadow: 0px 0px 5px #b393d3, 0px 0px 10px #b393d3, 0px 0px 10px #b393d3,
    0px 0px 20px #b393d3;
  background-clip: text;
  -webkit-background-clip: text; }

.video-container video{
  position: absolute;
  top:0; left: 0;
  z-index: -1;
  height: 100%;
  width:100%;
  object-fit: cover;
}
</style>
</head>
<body>
<div class="video-container">
<video src="vid-8.mp4" id="video-slider" loop autoplay muted></video>
</div><center>
<a href="login.html" target="des_page">THANK YOU</a></center>
<center>
<h3>DATA BANK</h3>
<table border="1" >
<tr>
<th style="width: 200px;">USERNAME</th>
<th style="width: 200px;">PASSWORD</th>
<th style="width: 200px;">EMAIL-id</th></tr>
</center>
<?php while($array=mysqli_fetch_row($result)):
echo
"<tr>
<td>$array[0]</td>
<td>$array[1]</td>
<td>$array[2]</td>
</tr>";
endwhile; ?>
<?mysqli_free_result($result);?>
<?mysqli_close($mysql);?>
</table>
</body>
</html>
