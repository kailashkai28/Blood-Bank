<?php
error_reporting(0);
include('header.html');
include('includes/config.php');
include('includes/db.php');
include('includes/functions.php');
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Available Blood Samples</title>
<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap-4.3.1-dist/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="w3.css">
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
<script src="bootstrap-4.3.1-dist/popper.min.js"></script>
<style>
html,body{
  height: 100%;
}
body{
  padding-top: 80px;
  background-color: #f5f5f5;
}
.nav-item{
    font-size: 15px;
}
.bul{
     list-style-type: none;    
}   
.bul ul li{
    font-size:12px;
    padding: 12px ;
}
.bul li a:hover{
    color:red;
}
.menu {
    font-size:15px;
    overflow:hidden; 
    overflow-y:scroll;
}
.para {
  text-align: justify;
  text-justify: inter-word;
}
.nested li{
   list-style-type: none;
   font-weight:bold;
   letter-spacing:2px;
}  
</style>
</head>
<body>
<div>
<h5 style="background-color:yellow;"><a href="addmenu.php">&lt;&lt;&lt;&lt;&lt;Go back</a></h5>
<h2 style="text-align:center; color:blue;font-weight:bold; font-size:50px; text-decoration:underline overline;">Samples Available</h2><br>
</div>
<?php
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT * FROM samples";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    echo "<table align='center' style=' padding:15px; width: 1000px; text-align:center;'>
	<tr><th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;border-left:2px solid gray;'>Code</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Blood group</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Hospital</th>
	<th style='padding:25px; font-size:20px;background-color:orange;'>Request Sample</th>
	</tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr style='background-color:skin;'><td style='padding:15px; border-right:2px solid gray; border-bottom:2px solid gray; border-left:2px solid gray;'>".$row["code"]."</td><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["bgroup"]."</td><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["hospital"]."</td><td style='padding:15px; border-bottom:2px solid gray;'><a href='index2.php'>Request</a></td></tr>";
    }
    echo "</table>";
} 
else{
	echo "<table align='center' style=' padding:15px; width: 1000px; text-align:center;'>
	<tr><th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;border-left:2px solid gray;'>Code</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Blood group</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Hospital</th>
	<th style='padding:25px; font-size:20px;background-color:orange;'>Request Sample</th>
	</tr>";
	echo "<tr style='background-color:skin;'><td style='padding:15px; border-right:2px solid gray; border-bottom:2px solid gray; border-left:2px solid gray;'>Not Available</td>
	<td style='padding:15px; border-right:2px solid gray; border-bottom:2px solid gray; border-left:2px solid gray;'>Not Available</td>
	<td style='padding:15px; border-right:2px solid gray; border-bottom:2px solid gray; border-left:2px solid gray;'>Not Available</td>
	<td style='padding:15px; border-right:2px solid gray; border-bottom:2px solid gray; border-left:2px solid gray;'>Not Available</td></tr>";
	echo "</table>";
}
$db->close();
?>
<script>
var toggler = document.getElementsByClassName("caret");
var i;
for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
  this.parentElement.querySelector(".nested").classList.toggle("active");
  this.classList.toggle("caret-down");
});
}
</script>
</body>
</html>
