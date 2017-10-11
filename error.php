<!DOCTYPE html>
<html>
<?php
//$_SERVER['QUERY_STRING']
$error_code = $_GET['error_code'];
switch ($error_code) {
    case 400:
    $h2 = "Bad Request";
    $h1 = "Error Code 400";
    $h3 = "The browser has made a Bad Request.";
    break;
    
    case 401:
    $h2 = "Authorization Required";
    $h1 = "Error Code 401";
    $h3 = "You have supplied the wrong information to access a secure resource.";
    break;
    
    case 403:
    $h2 = "Access Forbidden";
    $h1 = "Error Code 403";
    $h3 = "You have been denied access to this resource.";
    break;
    
    case 404:
    $h2 = "Page Not Found";
    $h1 = "Error Code 404";
    $h3 = "Sorry ! the page you are looking for can't be found";
    break;
    
    case 500:
    $h2 = "Internal Server Error";
    $h1 = "Error Code 500";
    $h3 = "The Server has encountered an internal error.";
    break;
    
    default:
    $h2 = "Oops";
    $h1 = "Error Page";
    $h3 = "Sorry ! the page you are looking for can't be found";
    
}
?>
<head>
	<title><?php echo $h1 ; ?></title>
	<link rel="stylesheet" href="css/error.css">
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200italic,200,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- For-Mobile-Apps-and-Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps-and-Meta-Tags -->

</head>
<body>
	<div class="main w3l">
		<h2><?php echo $h2 ; ?></h2>
		<h1><?php echo $h1 ; ?></h1>
		<h3><?php echo $h3 ; ?></h3>
		<a href="admin_login.php" class="back">BACK TO HOME</a>
	</div>
	
</body>
</html>