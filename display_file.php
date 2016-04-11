
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

        <?php

session_start();

$file=$_POST['action'];
$target_dir = "/Users/adeshkala/Security/Submissions/";
$target_file = $target_dir . $file;


echo "<pre><code>";
$handle = fopen($target_file, "r");

if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096); // assuming max line len is 4096.
        echo htmlspecialchars($buffer);
    }
    fclose($handle);
}
echo "</code></pre>";


?>
</body>

</html>




