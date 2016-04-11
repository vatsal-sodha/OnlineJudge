<?php
session_start();
/*if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}*/

if(isset($_GET['id']))
{
	$con=mysqli_connect("localhost","root","","online_judge");
	if(!$con)
			{
			die("Connection failed: " . mysqli_connect_error());
			}
			$temp=$_GET['id'];	
			$query ="SELECT * FROM problem WHERE problemCode='$temp'";
			$result=mysqli_query($con,$query);
			if($result)
			{
				$row=mysqli_fetch_assoc($result);
			
			}			
			
else
	echo header("Location:index.php");;
}
			

?>
<html>
	<head>
			<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<style>
				div.header
				{
					background-color :#3d566e;
					height: 20%;
					width: 100%;
				}
				p.header
				{
					font-size: 50px;
					color:white;
					margin-left: 50px;
					padding-top: 35px;
				}
				  div.logout
    {
      text-align: right;
	  margin-right:1%;
    }
        .navbar-default 
      {
        background-color: #555555;
        border-color: #e7e7e7;
        font-size: 18px;
        font-color: white;
        width:100%;
      }
      .navbar-default .navbar-nav > li > a:hover,
      .navbar-default .navbar-nav > li > a:focus 
      {
      color: white;
      background-color: #3d566e;
      } 
      .navbar-default .navbar-nav > li > a 
      {
      color:black;
      }
      .navbar-default .navbar-nav > .active > a,
      .navbar-default .navbar-nav > .active > a:hover,
      .navbar-default .navbar-nav > .active > a:focus 
      { 
      color: #3d566e;
      background-color: #7f8c8d;
      width: 100%;
      }
      p.head
      {
        color :#3d566e;
        font-size: 30px;
        text-align: center;
      }
   
		</style>
	</head>

	<body>
			<div class="container-fluid">
				<div class="header"> <p class="header">DeCrypt </p></div>
        
				  <nav class="navbar" data-spy="affix">
        <nav class="navbar navbar-default navbar" role="navigation"> 
       
          
        <ul class="nav navbar-nav">
        
         <li><a href="index.php" align="center" >HOME</a></li>
         <li><a href="leaderboard.php" align="center">LEADERBOARD</a></li>
         <li> <a href="" align="center">SUBMISSIONS</a></li>
    		

         </ul>
          </nav>
        </nav>

<h1> <?php echo $row['title_of_problem'];?><h1>
<h3>Problem Statement</h3>
	<h4>
	<?php echo $row['problem_stmt'];?>
	<h4>
<h3>Input</h3>
	<h4>
	<?php echo $row['input'];?>
	</h4>
<h3>Output</h3>

	<h4>
	<?php echo $row['output'];?><br>
	</h4>
	
	<?php if($row['explanation']){?>
	<h3>Explanation</h3>
	<h4>
	<?php echo nl2br($row['explanation']);}?><br>
	<span style="color:#9CA3A8;font-size:15px;">Time Limit:<?php echo $row['timelimit']?></span><br>
	<span style="color:#9CA3A8;font-size:15px;">Memory Limit:<?php echo $row['memory']?></span><br>
	<span style="color:#9CA3A8;font-size:15px;">Allowed Languages:C,C++,Java</span><br>
	<span style="color:#9CA3A8;font-size:15px;">Problem Author: <?php echo $row['author']?></span>
	<form method="get" action="submissions.php">
 <input type="submit" style="margin-top:5px;"name="submit"  class="btn btn-primary btn-md" onclick="submissions.php" value="Submit" />
</form>
			<div class="logout"> <button type="button" class="btn btn-primary btn-md" onclick="location.href='logout.php'">LOG OUT</button> </div>
			</div>

	
	
	
	</html>
</body>
