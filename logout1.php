<?php
#session destroy for Receiver
session_start();

session_destroy();
setcookie("user_email1", "", time()-60*5);
header("Location:index2.php?success=" . urlencode("Logged Out Successfully!"));
exit();
?>