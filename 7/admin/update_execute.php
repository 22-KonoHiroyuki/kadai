<?php
$id = $_POST["news_id"];
$title = $_POST["news_title"];
$title10 = $_POST["news_title10"];
$detail = $_POST["news_detail"];
$flg = $_POST["show_flg"];
//var_dump($flg);


$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "UPDATE news set news_title = '".$title."',news_title10='".$title10."',news_detail='".$detail."',show_flg=".$flg.",update_date = sysdate() " . "WHERE news_id = " . $id;
//var_dump($sql);
//echo "<br>";

$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
//var_dump($result);
?>

<html>
<head>
<title>ニュース更新処理ページ</title>
</head>
<body>
<h1>ニュース更新処理</h1>
<?php
if($result) {
	echo "データが更新できました";
    echo "<br>";
	echo "<a href=news_list.php>ニュース一覧へ戻る</a>";
} else {
	echo "データの登録に失敗しました";
    echo "<br>";
	echo "<a href=index.php>管理画面へ戻る</a>";

}
$pdo = null;
?>

</body>
</html>