<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet"  href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
     <link rel="stylesheet" href="css/style.css">
     <script src="js/jquery.js"></script>
     <script src="js/jquery-migrate-1.2.1.js"></script>
     <script src="js/script.js"></script> 
     <script src="js/superfish.js"></script>
     <script src="js/jquery.ui.totop.js"></script>
     <script src="js/jquery.equalheights.js"></script>
     <script src="js/jquery.mobilemenu.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
      <script src="js/jquery.tooltipster.js"></script>
     <script src="js/camera.js"></script>
     <!--[if (gt IE 9)|!(IE)]><!-->
     <script src="js/jquery.mobile.customized.min.js"></script>
     <!--<![endif]-->
    <script src="js/modernizr.custom.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="\Give Me On Rent/service_provider/css/mainbody.css" >

<link rel="stylesheet" type="text/css" href="\Give Me On Rent/service_provider/css/responsive.css" media="screen and (max-width:800px)">

<title>Admin Login </title>
<style>
form {

}


input[type=text], input[type=password] {
    width: 100%;
    padding: 10px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

div2 {
    margin-bottom: 15px;
    padding: 4px 12px;
}

.danger {
    background-color: #ffdddd;
    border-left: 6px solid #f44336;
}

.success {
    background-color: #ddffdd;
     border-left: 6px solid #4CAF50;
}

.info {
    background-color: #e7f3fe;
    border-left: 6px solid #2196F3;
}


.warning {
    background-color: #ffffcc;
    border-left: 6px solid #ffeb3b;
}
</style>

</head>

<body>
<center>
<a style="font-size:90px ;padding:25px;" href="about.html" class="btn">Imobillier</a>
</center>
<form name="form1" method="POST" action="login.php" >




<div class="container">
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
	include 'connect.php';
	$u=$_POST['uname'];
	$p=$_POST['pass'];
	
	$sql="SELECT * FROM admin WHERE username='$u' and password='$p'";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	mysqli_close($conn);
	
	if($count==1){
	$seconds = 5 + time();
    setcookie(loggedin, date("F jS - g:i a"), $seconds);
		session_start();
		$_SESSION['username']=$u;
		$_SESSION['password']=$p;
		header("location:index.html");
	}else{
	print '
		<div class="warning div2">
		<p><strong> Error !</strong> Account not found in Database</p>
		</div>
		';
	}
}

?>
    <h4><lable>Username</label></h4>
   <input type="text" placeholder="Enter your user name" name="uname" requierd></br>
    <h4><lable>Password</label></h4>
   <input type="password" placeholder="Enter your password" name="pass" requierd> <br><br><br>
   <button type="submit" name="submit" class="btn btn-info">Log me in</button>
</form>
</body>

</div>

</html>
