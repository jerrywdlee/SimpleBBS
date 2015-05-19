<?php

$servername = "localhost";#不能填端口号
$username = "root";
$password = "";
$dbname = "testSql";

$conn = new mysqli( $servername , $username , $password , $dbname );

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query('SELECT * FROM LeeBBS2 ORDER BY no DESC');#逆順

if ($result->num_rows > 0){
  echo "<h3>投稿履歴( ";
  echo $result->num_rows;
  echo " 件)：</h3> ";
  
  while($row = $result->fetch_assoc()){
    echo "<p>";
    echo "時間：";
    echo date("Y-m-d H:i:s",$row['time']);
    echo "<br/>";
    echo ''.$row['name'];
    echo "さんのメッセージ：";
    echo "<br/>";
    echo $row['msg'];
    echo '</p>';
    echo "<br/>";
  }
}else{
  echo "<h1>投稿はまだありません。</h1>";
}

?>
