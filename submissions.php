<?php
session_start();
if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}

//$_GLOBAL['id']=$_GET['id'];
//$def=$_GLOBAL['id'];

$host="localhost";
$user="root";
$password="";$db_name="online_judge";
$con=mysqli_connect($host,$user,$password,$db_name);

if(!$con)
{
	die("Connection failed: " . mysqli_connect_error());
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
	  div.logout{
		  margin-right:1%;
		  text-align:right;
	  }
   
		</style>
	</head>

	<body>
			<div class="container-fluid">
				<div class="header"> <p class="header">DeCrypt </p></div>
        
				  <nav class="navbar" data-spy="affix">
        <nav class="navbar navbar-default navbar" role="navigation"> 
       
          
        <ul class="nav navbar-nav">
        
         <li ><a href="" align="center" >HOME</a></li>
         <li><a href="leaderboard.php" align="center">LEADERBOARD</a></li>
         <li> <a href="" align="center">SUBMISSIONS</a></li>
    	

         </ul>
          </nav>
        </nav>


	<div>
	Select the appropriate language<br><br>
	<select name="lang" form="submit_file">
		<option value=".c">C (GCC 4.9.2)</option>
		<option value=".cpp">C++ 4.9.2</option>
		<option value=".java">JAVA (Javac 8)</option>
	</select>
	</div>
  <div>
  <?php
  $query="SELECT problemId,title_of_problem from problem";

 
  $query="SELECT problemId,title_of_problem from problem";
  echo '<select name="prob" form="submit_file">' ;
  if($result=mysqli_query($con,$query)){
  while($row=mysqli_fetch_row($result)) {
    if($row[0] .'.     '. $row[1]==$def)
    {
      echo '<option value='.$row[0].' selected=selected>' . $row[0] .'.     '. $row[1].'</option>';
      continue;
    }
     echo '<option value='.$row[0].'>' . $row[0] .'.     '. $row[1].'</option>';

  }
  echo '</select>'; 
}

mysqli_close($con);
?>
</div>
    
      <div style="margin-top:3%;">
      <form action="/OJ/Executables/upload.php" method="post" enctype="multipart/form-data" id="submit_file">
      
         <input type="file" name="fileToUpload" id="fileToUpload">
         <input type = "submit"class="btn btn-primary btn-md" value="Submit the file" style="margin-top:2px;"/>
          
      </form>
  </div>
    	<div class="logout"> <button type="button" class="btn btn-primary btn-md" onclick="location.href='logout.php'">LOG OUT</button> </div>
			</div>
   </body>
</html>

<?php

?>
