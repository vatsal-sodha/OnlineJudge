<?php

if($_GET['res']==1) {
	echo '
	<html>
	<body>
		<br><br><br><br>
		<div align="center" style="padding:25px">
			<img src = "congrats.png" alt ="Congratulations." style="align:centre;width:304px;height:228px;">
		</div>
		<div align="center">
			Congratulation you have Completed the Problem Successfully.
			<br><br>
			You earned xxx Score.
			<br><br>
			<p>You will be automatically redirected in 5 seeconds</p>

			 <p><a href="home.php">Click here</a> to return to home page </p> ';
				 header('Refresh: 3;URL= index.php');		
		echo '</div>
	</body>
	</html>';
}
else{
	echo '
	<html>
	<body>
		<br><br><br><br>
		<div align="center" style="padding:25px;">
			<img src = "failed.png" alt ="Incorrect Result" style="align:centre;width:304px;height:228px;">
		</div>
		<div align="center">
			Sorry !!! The submitted code failed the test.
			<br><br>
			The Penalty for Incorrect code .......
			<br><br>
			<p>You will be automatically redirected in 5 seeconds</p>
			 <p><a href="home.php">Click here</a> to return to home page </p> ';
			header('Refresh: 5;URL= index.php');		
		echo '</div>
	</body>
	</html>';

}
	
?>