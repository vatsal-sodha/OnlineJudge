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

        <form action="hackit.php" method="POST">

        	<input type="submit" value="Q1" name="Q1"></input>
        	<input type="submit" value="Q2" name="Q2"></input>
        	<input type="submit" value="Q3" name="Q3"></input>
        	<input type="submit" value="Q4" name="Q4"></input>
        	<input type="submit" value="Q5" name="Q5"></input>

        </form>

        </body>
        </html>



        <?



        session_start();
        if(!isset($_SESSION['userName']))
{
	header("Location:login.php");
}
        
        if(isset($_POST['Q1']))
        	$ans=1;

        else if(isset($_POST['Q2']))
        	$ans=2;
        
        else if(isset($_POST['Q3']))
        	$ans=3;
        
        else if(isset($_POST['Q4']))
        	$ans=4;
        
        else if(isset($_POST['Q5']))
        	$ans=5;
        else
        	$ans=-1;


        $x=$_SESSION['userName'];
        //echo $x;
		$con=mysqli_connect("localhost","root","","online_judge");
		if(!$con)
				{
				die("Connection failed: " . mysqli_connect_error());
				}

		$query1="SELECT * FROM submissions WHERE userId='$x' and problemId=$ans and verdict='Y'";
		$result1=mysqli_query($con,$query1);
		if(!mysqli_fetch_assoc($result1))
			{
				echo "SORRY, YOU DONT HAVE PERMISSION TO VIEW THE FILES..";
			}
			else
			{
				?>
				<table class="table table-hover">
				<thead>
			      <tr>
			        <th>Serial Number</th>
			        <th>User</th>
			        <th>Submission ID</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?

			    $query2="SELECT * FROM submissions WHERE problemId=$ans and verdict='Y'";
				$result2=mysqli_query($con,$query2);
				$i=1;
				
				while ($row=mysqli_fetch_assoc($result2)) {
					$file=$row['fileName'];
					$namess=$row['userId'];
					echo "<tr><td>$i</td><td>$namess</td>";
					echo '<td>';?> <form action="display_file.php" method="POST"><input type="hidden" name="action" value="<?echo $file;echo $row['language'];?>" /><input type="submit" value="view" name="button"></input></form></td></tr>
					<?
				}

			}




        ?>