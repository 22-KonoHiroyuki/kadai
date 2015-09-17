<?php
$title = $_POST["news_title"];
$title10 = $_POST["news_title10"];
$detail = $_POST["news_detail"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "INSERT INTO news (news_id,news_title, news_title10, news_detail, create_date, update_date) VALUES (NULL,'".$title."','".$title10."','".$detail."',sysdate(),sysdate()) ";

//var_dump($sql);
echo "<br>";

$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
//var_dump($result);
echo "<br>";

if($result) {
	echo "データが登録できました";
	echo "<a href=news_list.php>ニュース一覧へ</a>";
} else {
	echo "データの登録に失敗しました";
}
$pdo = null;
?>
<html>
<head>
</head>
<body>
</body>
</html>