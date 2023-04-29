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


<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Menu</title>
    
<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" >
 <script src="bootstrap-4.3.1-dist/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="w3.css">
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
<script src="bootstrap-4.3.1-dist/popper.min.js"></script>
      
      <link rel="icon" href="220px-NCERT_300px.svg.png">


    <style>
      
        
html,
body {
  height: 100%;
}

body {
  
 
  padding-top: 140px;
 
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
        
  <a class="navbar-brand" href="home.php">Foodshala</a>
  
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto" style="margin-left:1000px;"> 
      
      <li class="nav-item" >
 <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>      </li>
      
    </ul>
    
  </div>
</nav>
<div>
<h2 style="text-align:center; color:blue;font-weight:bold; font-size:50px; text-decoration:underline overline;">Menu</h2><br>
</div>
<?php

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$SESSION['user_email']=$user_email;

$sql = "SELECT c.food,v.dishes,v.restaurant,v.rate FROM veg v,customer c WHERE v.food=c.food AND c.email='".$_SESSION['user_email']."'";


$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<table align='center' style=' padding:15px; width: 1000px; text-align:center;'><tr><th style='padding:15px; font-size:20px; background-color:orange; border-right:2px solid gray;  '>Dishes</th><th style='padding:25px;border-right:2px solid gray; font-size:20px;background-color:orange;'>Restaurant</th><th style='padding:25px; font-size:20px;background-color:orange;border-right:2px solid gray;'>Rate</th><th style='padding:25px; font-size:20px;background-color:orange;'>Click to order</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr style='background-color:skin;'><td style=' padding:15px; border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["dishes"]."</td><td style='padding:15px;border-right:2px solid gray; border-bottom:2px solid gray;'>".$row["restaurant"]."</td> <td style='padding:15px; border-bottom:2px solid gray;border-right:2px solid gray;'>Rs.&ensp;".$row["rate"]."&ensp;per plate.</td><td style='padding:15px; border-bottom:2px solid gray;'><a href='order.php'>Order</a></td></tr>";
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
