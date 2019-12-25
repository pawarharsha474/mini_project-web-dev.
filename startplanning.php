<?php
$var = $_GET['cost'];

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,"theshaadiproject");

$sql="select cost from info WHERE id='$var'";

$res=mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($res);
if($rowcount>0)
{
	$row = mysqli_fetch_array($res);
	echo $row[0];
}
else
{
	die();
}	
?>