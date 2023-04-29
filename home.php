<?php
include('header.html');
include('includes/config.php');
include('includes/db.php');
include('includes/functions.php');
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
body {
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
.para{
  text-align: justify;
  text-justify: inter-word;
}
blink{
  -webkit-animation: 1s linear infinite condemned_blink_effect; 
  animation: 1s linear infinite condemned_blink_effect;
}

@-webkit-keyframes condemned_blink_effect{ 
  0%{
    visibility: hidden;
  }
  50%{
    visibility: hidden;
  }
  100%{
    visibility: visible;
  }
}
@keyframes condemned_blink_effect {
  0%{
    visibility: hidden;
  }
  50%{
    visibility: hidden;
  }
  100%{
    visibility: visible;
  }
}
blink:hover{
  -webkit-animation-play-state:paused;
  -moz-animation-play-state:paused;
  -o-animation-play-state:paused;
  animation-play-state:paused;
  cursor: pointer;
}
</style>
</head>
<body>
<div class="para" style="margin-left:15px;">
</div>
<main role="main" class="container" >
<div class="jumbotron" style="text-align:center; ">
<h3 style="font-weight:bold;">&#9786;Blood bank&#9786;</h3>
<br>
<blink>
<h2>
<a class="nav-link" href="mainmenu.php" style="font-weight:bold ;">Click here</a></h2></blink> to see Available blood samples.
</div>
</main>
</body>
</html>
