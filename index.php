<?php
session_start();
if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}
else{
	$x=$_SESSION['userName'];
	$con=mysqli_connect("localhost","root","","online_judge");
	if(!$con)
			{
			die("Connection failed: " . mysqli_connect_error());
			}
			$query1="SELECT userName FROM users WHERE userName='$x'";
			$result1=mysqli_query($con,$query1);
			if(!$result1)
			{
				header("Location:login.php"); 
			}
			
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
	   div.logout
    {
      text-align: right;
	  margin-right:1%;
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
        
         <li class="active"><a href="" align="center" >HOME</a></li>
         <li><a href="leaderboard.php" align="center">LEADERBOARD</a></li>
         <li> <a href="mysubmissions.php" align="center">SUBMISSIONS</a></li>
        <li> <a href="hackit.php" align="center">HACK</a></li>
          
    	

         </ul>
          </nav>
        </nav>

        <p class="head"> <b>CODE WARS</b> </p>
				  <table class="table table-hover">
    <thead>
      <tr>
        <th>Serial Number</th>
        <th>Problem</th>
        <th>Problem ID</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
      <?php

	  		$con=mysqli_connect("localhost","root","","online_judge");
			$query ="SELECT * FROM problem";
			$result=mysqli_query($con,$query);
			if(!$con)
			{
			die("Connection failed: " . mysqli_connect_error());
			}
		
			while ($row=mysqli_fetch_assoc($result)) {
				$x=$row['problemCode'];
				echo "<tr><td>";echo $row['problemId'];
				echo "</td><td><span ><a href='problems.php?id=$x' name='id' class='hovers_item hovers_effect_1'>";echo $row['title_of_problem'];
				echo "</span></a></td><td>";echo $row['problemCode'];
				echo "</td><td>";
				echo $row['score'];
				echo "</td></tr>";
				
				}


	  		?>
    </tbody>
  </table>
			</div>
				<div class="logout"> <button type="button" class="btn btn-primary btn-md" onclick="location.href='logout.php'">LOG OUT</button> </div>
			</div>
	</body>
</html>
	</body>
</html>