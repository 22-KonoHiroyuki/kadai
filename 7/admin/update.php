<?php
$id = $_GET['news_id'];
// var_dump($id);

$title10;
$title;
$detail;
$show_flg;

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news WHERE news_id = " . $id;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($results);

foreach($results as $row) {
//	var_dump($row);
$title10 = $row["news_title10"];
$title = $row["news_title"];
$detail = $row["news_detail"];
$flg = $row["show_flg"];
//	var_dump($detail);
}
$pdo = null;
?>

<html>
<title>ニュース更新ページ</title>
<head>
</head>
<body>
<h1>ニュース更新ページ</h1>
<form action="update_execute.php" method="post">
	タイトル(64文字以内): <br>
	<input type="text" name="news_title" value="<?php echo $title ?>" size="64" /><br>
	タイトル略(10文字以内):<br>
	<input type="text" name="news_title10" value="<?php echo $title10 ?>" maxlength="10"/><br>
	本文（1024文字以内）:<br>
	<textarea name="news_detail" rows="5" cols="64"><?php echo $detail ?></textarea><br>
	表示1/非表示0:<br>
	 <input type="text" name="show_flg" value="<?php echo $flg ?>" /><br>
	<input type="hidden" name="news_id" value="<?php echo $id ?>" /><br>
	<input type="submit" value="更新" />
</form>
<!--
<form action="delete_execute.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id ?>" />
	<input type="submit" value="削除" />
</form>
-->
</body>
</html>