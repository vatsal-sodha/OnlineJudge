<?php
session_start();
if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
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
      .btn-primary {
  color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4;
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
         <li class="active"><a href="" align="center">LEADERBOARD</a></li>
         <li> <a href="mysubmissions.php" align="center">SUBMISSIONS</a></li>
         </ul>
          </nav>
        </nav>

        <p class="head"> <b>LEADERBOARD</b> </p>
	<form method="get">
        <button type="submit" class="btn btn-primary btn-md" name="year" value="2nd">Second Year</button>
        <button type="submit" class="btn btn-primary btn-md" name="year" value="3rd">Third Year</button>
        <button type="submit" class="btn btn-primary btn-md" name="year" value="All">All Years</button>
		</form>
				<table class="table table-hover">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Score</th>
        <th>Time</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>
     <?php

$host="localhost";
$user="root";
$password="";$db_name="online_judge";
$con=mysqli_connect($host,$user,$password,$db_name);

if(!$con)
{
	die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['year'])){
	
if($_GET['year']==='2nd'){
$query="SELECT userName,current_score,total_time,year from users where year=2 ORDER BY current_score DESC, total_time";
}
else if($_GET['year']==='3rd'){
	$query="SELECT userName,current_score,total_time,year from users where year=3 ORDER BY current_score DESC, total_time";
}
else if($_GET['year']==='All'){
	$query="SELECT userName,current_score,total_time,year from users  ORDER BY current_score DESC, total_time";
}
}
else{
	$query="SELECT userName,current_score,total_time,year from users  ORDER BY current_score DESC, total_time";
}

if($result=mysqli_query($con,$query)){
	while($row=mysqli_fetch_assoc($result))
	{
		/*echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3];
		echo "\n";*/
		echo '<tr>';
		echo '<td>'.$row['userName'].'</td>';
		echo '<td>'.$row['current_score'].'</td>';
		echo '<td>'.$row['total_time'].'</td>';
		echo '<td>'.$row['year'].'</td>';
		echo '</tr>';
		}
}
echo '</table>';

mysqli_close($con);

?>
    </tbody>
  </table>
  	<div class="logout"> <button type="button" class="btn btn-primary btn-md" onclick="location.href='logout.php'">LOG OUT</button> </div>
			</div>

			</div>
	</body>
</html>