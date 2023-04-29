<?php
#Login session for Receiver
function loggedIn1(){
    
    if(isset($_SESSION['user_email1']) || isset($_COOKIE['user_email1'])){
    return true;
    }
    else
		
		return false;
    exit();
}


?>