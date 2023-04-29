<?php
#session destroy for Hospital
session_start();

session_destroy();
setcookie("user_email", "", time()-60*5);
header("Location:index1.php?success=" . urlencode("Logged Out Successfully!"));
exit();
?>