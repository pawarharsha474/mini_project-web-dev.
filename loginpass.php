<html>
<head>
	<title>PASSWORD</title>
</head>
</html>
<?php
	
	$con=mysqli_connect('localhost','root','','theshaadiproject');
	if(!$con)
	{
		die("Connection Failed:".mysqli_connect_error());
	}
	
	$userid = $_REQUEST['userid'];
	$pass = $_REQUEST['password'];
	
	$sql="select password from customer WHERE userid='$userid'";

	$res=mysqli_query($con,$sql)or die(mysqli_error($con));
	
	$row = @mysqli_fetch_array($res);
	
	if($pass != $row[0])
	{
		echo "<script type=\"text/javascript\">alert('Incorrect Password.')</script>";
		echo "<script type=\"text/javascript\">window.location = 'login.html';</script>";

	}
	else
	{
		header("Location:invoice.php?userid=$userid");
	}
	mysqli_close($con);
?>