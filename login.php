<?php
session_start();?>
<script>
function validate(){
var user=f1.username;
var pass=f1.password;

if(user.value.length==0 && pass.value.length==0){

alert("All fields are required");
user.focus();
return false;
}

else if(pass.value.length==null || pass.value.length==""){
console.log(typeof(pass.name.value));
alert("Please enter password");
pass.focus();
return false;
}
else if(user.value.length==0){

alert("Please enter username");
user.focus();
return false;
}

else{
return true;
}
}
</script>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<h1 class="head">The Code War</h1>


<div class="login">    
<form name="f1" method="post">

<input type="text" placeholder="Username"  name="username" autofocus="">  
  


  <input type="password" placeholder="password"  name="password">  
  <div id="error"></div>
  <input type="submit" value="Login" onclick="return validate();" name="login"><div id="error"></div>
</div>
</form>

<div class="shadow"></div>
</body>
</html>
<?php
$host="localhost";
$user="root";
$password="";$db_name="online_judge";
$con=mysqli_connect($host,$user,$password,$db_name);

if(!$con)
{
	die("Connection failed: " . mysqli_connect_error());

}

if(isset($_POST['login'])){
	
$user=$_POST['username'];
$pass=$_POST['password'];
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();//echo $user_ip;//."\n".$user."\n".$pass;
$query="SELECT * FROM users WHERE userName='$user' AND pass='$pass'";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);//echo $numrows."\n";
if($numrows==1)
{
	$row=mysqli_fetch_row($result);
	if($row[3]=='N'){
	$query1="UPDATE `online_judge`.`users` SET `Ip` = '$user_ip',loggedIn='Y' WHERE `users`.`userName` = '$user'";
	if(mysqli_query($con,$query1)){
        $_SESSION['userName']=$user;
	header("location:index.php");
		//echo "<script type='text/javascript'>alert('logged in');</script>";
	}
	}
	else if($row[3]=='Y' && $row[4]==$user_ip)
	{
		$_SESSION['userName']=$user;
        header("location:index.php");
	}
	else{
		echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Already Logged in';</script>";

	}
}
else{
	echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Wrong credentials';</script>";

}
mysqli_close($con);
}

?>