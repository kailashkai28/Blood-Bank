<?php
#Receiver Account
session_start();
include('header1.html');
include('includes/config.php');
include('includes/db.php');
include('includes/function1.php');
if(!loggedIn1()){
    header("Location:index2.php?err=". urlencode("You need to login to view account!!"));
    exit();
}
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>::Home::</title>
<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-override.css" /> 
<style media="screen">
body{
	padding-top: 50px;
}
.starter-template{
    padding: 40px 15px;
    text-align: center;
}       
html,body{
	height: 100%;
}
body{
	display: -ms-flexbox;
	display: flex;
	-ms-flex-align: center;
	align-items: center;
	padding-top: 120px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
}
.nav-item{
    font-size: 15px;
}
.para {
	text-align: justify;
	text-justify: inter-word;
}
@keyframes animate{ 
   0%{ 
     opacity: 0; 
   } 
   50%{ 
     opacity: 0.7; 
   } 
   100%{ 
     opacity: 0; 
   } 
 }
</style>
</head>
<body>

<div class="para" style="margin-left:15px;">
</div>
<main role="main" class="container" >
<div class="jumbotron" style="text-align:center; ">
<h4>Welcome to the Blood bank!!<br>
<?php  
if(isset($_SESSION['user_email1'])){
echo $_SESSION['user_email1'];
echo '<br><button style="background-color:none; display:inline-block; border:none;"><a style="text-decoration:none; animation: animate 1.5s linear infinite; font-weight: bold; color:green;" href="mainmenu.php">Click here to go ahead</a></button>';        
echo '<br><br>';
echo '<img src="namaste-symbol-115510531424qc69l0sej.png" height="250px" width="300px">';
echo '<br><br>';
echo '<b style="color:red; border-bottom: 2px solid blue;">"Spare only 15 minutes and save one life"</b>';
}
else echo $_COOKIE['user_email1'];
?>
</h4>
</div>
</main>
</body>
</html>
