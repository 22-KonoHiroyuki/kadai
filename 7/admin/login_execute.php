<?php
session_start();

$name = $_POST["name"];
$pass = $_POST["pass"];

if(!empty($_POST)){

//var_dump($pass);
//echo "<br>";

//$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
//$sql = "SELECT id,name,pass FROM login where name = '$name'";
////var_dump($sql);
////echo "<br>";
//
//$stmt = $pdo->prepare($sql);
//$stmt->execute();
//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
//echo "<br>";

//foreach($result as $row) {
//}
//var_dump($row);
if($name=="admin" && $pass=="password") {

$_SESSION["name"] = $name;
    echo "ログインできました";
    echo "<br>";
	echo '<a href="index.php">管理画面TOPページへ</a>';
} else {
    $error["login"]="failed";
header("Location:login.php");
exit;
}
}else{
    $error["login"]="blank";
header("Location:login.php");
exit;
}
//	echo '<script language="javascript">';
//    echo 'alert("ログイン名かパスワードが間違っています")';
//    echo '</script>';

//ログインページに飛ぶ
//header("Location:login.php");
//exit;}
//$pdo = null;
?>

<html>
<head>
    <title>ログイン認証結果</title>
</head>
<body>
</body>
</html>