<?php
session_start();
if(!isset($_SESSION['userName']) || !isset($_POST['prob']) || !isset($_POST['lang']))
{
    header("Location:../login.php");
    exit();
}
$userName=$_SESSION['userName'];
$host="localhost";
$user="root";
$password="";$db_name="online_judge";
$con=mysqli_connect($host,$user,$password,$db_name);

$time=time();

$query1="SELECT * from submissions where userId='$userName' ORDER BY `submissions`.`timestamp` DESC";
$result1=mysqli_query($con,$query1);
$row=mysqli_fetch_row($result1);
if($time-$row[3]<120)
{
    header("Location:../index.php");
    exit();
    // TODO :: JAVASCRIPT ON TIME
    $uploadOk=0;
}


$problem=$_POST['prob'];
$lang=$_POST['lang'];
$imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
$name=$userName . $problem  . $time  . $lang;

$target_dir = "/Users/adeshkala/Security/Submissions/";
$target_file = $target_dir . $name ;
//echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "cpp" && $imageFileType != "c" && $imageFileType != "java" ) {
    echo "Sorry, only CPP, C and JAVA files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     //   echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//$name=basename( $_FILES["fileToUpload"]["name"]);
//echo $name;

if($uploadOk==1){

$my_files=$target_file;

$names=substr($my_files, -1);;

if($names=="c"){

$name=substr_replace($name,"", -2);
shell_exec("gcc {$my_files} -o $name");

}
else if($names=="p"){

$name=substr_replace($name,"", -4);
shell_exec("g++ {$my_files} -o $name");

}
else
{
    echo "none";

}

system("./file_print $name $problem");

//echo sha1_file("/Users/adeshkala/Security/Submissions/input/output2.txt");

if($problem==1)
    $file_op="c70209b9db8603f55585eec31de3ff4f7d31be54";
else if($problem==2)
    $file_op="240135dc29c15987b444a1f51a4cd9925c2b0b42";
else if($problem==3)
    $file_op="d2464c28f6bbbe24073be81c02ed82688b80391c";
else if($problem==4)
    $file_op="623ad328cd2fc8b278fae48462ec485ec5af7eb7";
else
    $file_op="4143d3a341877154d6e95211464e1df1015b74bd";



$file_op2=sha1_file("output" . $name . ".txt");

//echo $file_op2;

if(strcmp($file_op,$file_op2)==0){
    
    $query1="SELECT * FROM `submissions` WHERE userId='$userName' and problemId='$problem' and verdict='Y';";
    $result1=mysqli_query($con,$query1);
    
    if(mysqli_fetch_row($result1)){
         
         header("Location:../index.php");
        exit();


    }

    else{

        $query1="SELECT `current_score` FROM `users` WHERE `users`.`userName` = '$userName';";
        $result1=mysqli_query($con,$query1);

        $row=mysqli_fetch_row($result1);
        $score=$row[0];


        $query1="SELECT `score` FROM `problem` WHERE `problem`.`problemId` = '$problem';";
        $result1=mysqli_query($con,$query1);

        $row=mysqli_fetch_row($result1);
        $score2=$row[0];

        $score=$score+$score2;

            // TODO :: find time and subtract it from start time and add it to time columnx

        $query1="UPDATE `users` SET `current_score` = '$score' WHERE `users`.`userName` = '$userName';";
        $result1=mysqli_query($con,$query1);

 
    }

    $query1="INSERT INTO `submissions` (`subId`, `fileName`, `userId`, `timestamp`, `verdict`, `language`, `problemId`) VALUES (NULL, '$name', '$userName', '$time', 'Y', '$lang', '$problem');";
    $result1=mysqli_query($con,$query1);

    header("Location:../result.php?res=1");
    exit();



  //  echo $file_op;
}
else{
    $query1="INSERT INTO `submissions` (`subId`, `fileName`, `userId`, `timestamp`, `verdict`, `language`, `problemId`) VALUES (NULL, '$name', '$userName', '$time', 'N', '$lang', '$problem');";
    $result1=mysqli_query($con,$query1);
    header("Location:../result.php?res=2");
    exit();
}
    
}
 
?>