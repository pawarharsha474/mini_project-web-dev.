<html>
<head>
	<title>LOGOUT</title>
</head>
</html>
<?php
	$con=mysqli_connect('localhost','root','','theshaadiproject');
	if(!$con)
	{
		die("Connection Failed:".mysqli_connect_error());
	}
	$userid=@$_REQUEST['userid'];
	$rev= @$_REQUEST['review'];
	$sql ="INSERT INTO review VALUES('$userid','$rev')";
	mysqli_query($con,$sql);
	mysqli_close($con);
	
	echo "<script type=\"text/javascript\">alert('Reviewed Succesfully.')</script>";
	echo "<script type=\"text/javascript\">window.location = 'homepage.html';</script>";
	
?>