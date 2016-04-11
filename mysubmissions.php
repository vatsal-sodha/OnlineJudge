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
         <li ><a href="leaderboard.php" align="center">LEADERBOARD</a></li>
         <li class="active"> <a href="mysubmissions.php" align="center">SUBMISSIONS</a></li>
         </ul>
		 <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php" align="center">LOGOUT</a></li></ul>
          </nav>
        </nav>
		<table class="table table-hover">
    <thead>
      <tr>
        <th>Problem</th>
        <th>Result</th>
        <th>Time</th>
        <th>Language</th>
        <th>Username</th>
		<th>Detail</th>
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
$temp=$_SESSION['userName'];
$query="SELECT * from submissions";
	if($result=mysqli_query($con,$query))
	{
		while($row=mysqli_fetch_assoc($result))
		{
      $code=$row['problemId'];
      //echo $code;
      $query2="SELECT `title_of_problem` from problem Where problemId=$code";
      $result2=mysqli_query($con,$query2);
      $row2=mysqli_fetch_assoc($result2);
		
      echo "<tr >";
			echo '<td>'.$row2['title_of_problem'].'</td>';

			if($row['verdict']=='Y')
			{
				echo "<td BGCOLOR='#b3ffb3'>".'&#x2714'."</td>";
			}
			else
			{
				echo "<td BGCOLOR='#ff3333'>".'&#x2718'."</td>";
			}
			echo '<td>'.date('H:i:s', strtotime($row['timestamp'])).'</td>';
			echo '<td>'.$row['language'].'</td>';
      echo '<td>'.$row['userId'].'</td>';
      $file=$row['fileName'];
      echo '<td>';?> <form action="display_file.php" method="POST"><input type="hidden" name="action" value="<?echo $file;echo $row['language']?>" /><input type="submit" value="view" name="button"></input></form>

      <?
			echo '</tr>';
		}
	}
?>
