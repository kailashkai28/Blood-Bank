<?php
#Registration for Hospital
session_start();
include('includes/config.php');
include('includes/db.php');
include('includes/functions.php');
if(loggedIn()){
    header("Location:myaccount.php");
    exit();
}
function isUnique($email){
    
    $query = "select* from hospital where email='$email'";
    global $db;
    $result = $db->query($query);
    if($result->num_rows >0 ){
        return false;
    }
    else{
        return true;
    }
}

if(isset($_POST['register'])){
    
    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['confirm_password']=$_POST['confirm_password'];
if(strlen($_POST['name'])<3){
    header("Location:register1.php?err=" . urlencode("Name must be atleast 3 characters long."));
    exit();
}
    else if($_POST['password'] != $_POST['confirm_password']){
        header("Location:register1.php?err=" . urlencode("The password and confirm password do not match."));
        exit();
    }
    else if(strlen($_POST['password'])<5){
        header("Location:register1.php?err=" . urlencode("Password length must be atleast 5 characters long."));
        exit();
        
    }
    else if(strlen($_POST['confirm_password'])<5){
        header("Location:register1.php?err=" . urlencode("Password length must be atleast 5 characters long."));
        exit();
        
    }
    else if(!isUnique($_POST['email'])){
        header("Location:register1.php?err=" . urlencode("Email is already in use. Please use another one."));
        exit();
        
    }
    else{
        
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $state = mysqli_real_escape_string($db, $_POST['state']);
        $district = mysqli_real_escape_string($db, $_POST['district']);        
        $email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
        $query = "insert into hospital (name,state,district,email,password) values('$name','$state','$district','$email','$password')";
        $db->query($query);
    }
           
    
}

?>


<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    
    <title>Hospital Registration</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" >
<style>
      
        body{
            
			background-size:100%;
        }
        .starter-template{
            
            padding: 40px 15px;
            text-align: center;
        }
        
      
html,
body {
  height: 100%;
}

body {
  -ms-flex-align: center;
  align-items: center;
  padding-top: 20px;
  background-color: #f5f5f5;
    border-block-end: 5px solid black;
}

.form-signin {
  width: 100%;
  max-width: 430px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.nav-item{
 font-weight: bold;
 font-size: 20px;
}
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem;            /* Footer height */
}

</style>
    
  </head>
  <body>
    <h3 style="border-bottom:2px solid gray; text-align:center;" class="glow"><a style=" text-decoration:none; color:white;" href="home.php">Blood Bank</a></h3>

      <a href="index2.php"><b>Login(For Receiver)</b></a><a href="index1.php"><b style="float:right;">Login(for Hospital)</b></a>   
<main role="main" class="container">
 <form action="register1.php" method="post" class="form-signin"><br><br>
     <b>Register Yourself(Only for Hospital)</b><br>
      
     <?php 
     if(isset($_GET['err'])){ ?>
     
     <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>  
    <?php
                            }
     ?>
     
  <input type="text"  class="form-control" placeholder="Name" name="name"  required autofocus>
  <input type="text"  class="form-control" placeholder="State" name="state"  required autofocus>
  <input type="text"  class="form-control" placeholder="District" name="district"  required autofocus>
   <input type="email"  class="form-control" placeholder="Email address" name="email" required autofocus>
  <input type="password" class="form-control" placeholder="Password" name="password" required >
  <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required >
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
    
</form>
</main>
</body>
</html>
