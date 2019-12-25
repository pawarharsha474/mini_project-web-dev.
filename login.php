<?php
$var = $_GET['userid'];
if($var == '') 
  {
	die("Please enter User Name");
  }

$con=mysqli_connect('localhost','root','','theshaadiproject');

$sql="select userid from customer WHERE userid='$var'";

$res=mysqli_query($con,$sql)or die(mysqli_error($con));
if(mysqli_num_rows($res)>0)
{
	echo "Please Proceed with Login";

}
else
{
	die("User doesn't Exist.");
}	
?>
  