<?php
$id = $_GET["news_id"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
// id を直接代入せず、:idを入れる
$sql = "SELECT * FROM news WHERE news_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);

// HTML出力用の変数 $view を宣言
$view = "";

// $view に表示する文字列を追記していく
$view .= "<table>";
foreach($results as $row) {
//	var_dump($row);
	$view .= "<tr>";
	$view .= "<td><a href=update.php?news_id=" . $row["news_id"] . ">" . $row["news_title"] . "</a></td>";
	$view .=  "<td><a href=update.php?news_id=" . $row["news_id"] . ">" . $row["news_detail"] . "</a></td>";
	$view .= "</tr>";
}
// table閉じタグで終了
$view .= "</table>";
$pdo = null;
?>
<html>
<head>
</head>
<body>
<?php echo $view ?>
<hr>
<a href="index.php">管理画面へ戻る</a> 
</body>
</html>
