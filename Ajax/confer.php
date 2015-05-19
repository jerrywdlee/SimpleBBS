<?php
#header('Content-Type:text/html; charset=utf-8');//使编码，使中文不会变成乱码

$servername = "localhost";#不能填端口号
$username = "root";
$password = "";
$dbname = "testSql";
$rand = rand(0,11);
$str;
$ans=-1;


// 创建连接
#$link = mysqli_connect( $servername , 'root', '', $dbname );
$conn = new mysqli( $servername , $username , $password , $dbname );

if ($conn->connect_error) {
#echo $servername;
  die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";
#echo $rand;
$sql = "SELECT id, var, answer 
        FROM confer
        WHERE id=$rand";
$result = $conn->query($sql);
if ($result->num_rows > 0){
$row = $result->fetch_assoc();
$str = $row["var"];
$ans = $row["answer"];

}else{
echo "0 results";
}
class ConFer{
public $var="";
public $ans="";
}
$myJson=new ConFer();
$myJson->var=$str;
$myJson->ans=$ans;

echo json_encode($myJson, JSON_UNESCAPED_UNICODE );#不编码汉字

#echo "<br>".$str."<br>".$ans;

$conn->close();
/*

*/

?>
