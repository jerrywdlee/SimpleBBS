<?php

$servername = "localhost";#不能填端口号
$username = "root";
$password = "";
$dbname = "testSql";

$conn = new mysqli( $servername , $username , $password , $dbname );

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//insert date
#$post_name=$_REQUEST['name'];
$post_name= isset($_POST['name'])?htmlspecialchars($_POST['name']) : '';
#$post_msg=$_REQUEST['msg'];
$post_msg= isset($_POST['msg'])?htmlspecialchars($_POST['msg']) : '';
$post_time=time();

$sql = "INSERT INTO LeeBBS2 (time,name,msg) VALUES ('$post_time','$post_name','$post_msg')";
$flag = $conn->query($sql);

if(!$flag){
	die('INSERTクエリーが失敗しました。'.mysql_error());
}

?>
