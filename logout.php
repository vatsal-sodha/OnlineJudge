<?php
session_start();
if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}
$host="localhost";
$user="root";
$password="";$db_name="online_judge";
$con=mysqli_connect($host,$user,$password,$db_name);

if(!$con)
{
	die("Connection failed: " . mysqli_connect_error());

}
$x=$_SESSION['userName'];
$query="UPDATE `online_judge`.`users` SET `loggedIn` = 'N', `Ip` = '' WHERE `users`.`userName` = '$x'; ";
$result=mysqli_query($con,$query);
if($result)
{
	/*$row=mysqli_fetch_assoc($result);
	$row['loggedIn']='N';
	$row['Ip']='';*/
	unset($_SESSION['userName']);
session_destroy();
echo "<script type='text/javascript'>alert('succesfully logged out');window.location.href = 'login.php';</script>";

//header("Location:login.php");
}
else
	echo "Error";
?>