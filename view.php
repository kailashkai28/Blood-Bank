<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/db.php');
include('includes/functions.php');
if(!loggedIn()){
    
    header("Location:index1.php?err=". urlencode("You need to login to view account!!"));
    exit();
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Requests</title>
    
<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" >
 <script src="bootstrap-4.3.1-dist/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="w3.css">
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
<script src="bootstrap-4.3.1-dist/popper.min.js"></script>
      

    <style>
      
        
html,
body {
  height: 100%;
}

body {
  
 
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
            font-weight:bold; letter-spacing:2px;
        }  
    </style>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color:#D5D5E9;  ">
        
  <a class="navbar-brand" href="home.php">Blood Bank</a>
  
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto" style="margin-left:1000px;"> 
      
      <li class="nav-item" >
 <a class="nav-link" href="logout1.php" onclick="return confirm('Are you sure to logout?');">Logout</a>      </li>
      
    </ul>
    
  </div>
</nav>
<div>
<h5 style="background-color:yellow;"><a href="addmenu.php">&lt;&lt;&lt;&lt;&lt;Go back</a></h5>
<h2 style="text-align:center; color:blue;font-weight:bold; font-size:50px; text-decoration:underline overline;">Requests</h2><br>
</div>
<?php
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT name,address,code,hospital,bgroup FROM samples,receiver;";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    echo "<table align='center' style=' padding:15px; width: 1000px; text-align:center;'>
	<tr><th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;border-left:2px solid gray;'>Name</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Address</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Code</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Hospital</th>
	<th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;'>Blood Group</th>
		</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr style='background-color:skin;'><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray; border-left:2px solid gray;'>".$row["name"]."</td><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["address"]."</td><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["code"]."</td><td style='padding:15px;border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["hospital"]."</td><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["bgroup"]."</td> </tr>";
    }
    echo "</table>";
} 
else{
	echo "0 results";
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
