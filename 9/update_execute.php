<?php
//セッションスタート
session_start();

//取得したデータを変数に代入
$id = $_POST["news_id"];
$title = $_POST["news_title"];
$detail = $_POST["news_detail"];
$category = $_POST["category_id"];
$source = $_POST["source_id"];
$keyword = $_POST["keyword"];
$flg = $_POST["show_flg"];
//var_dump($flg);

//ニューステーブルへ取得したデータを更新
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "UPDATE news set news_title = '".$title."',news_detail='".$detail."',category_id='".$category."',source_id='".$source."',keyword='".$keyword."',show_flg=".$flg.",update_date = sysdate() " . "WHERE news_id = " . $id;
//var_dump($sql);

$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
//var_dump($result);

//更新処理
if($result) {
	echo "データが更新できました";
    echo "<br>";
    echo'<a href="index_admin.php" >管理者トップページへ</a>';
} else {
    echo "データの更新に失敗しました";
    echo "<br>";
    echo'<a href="update.php" >前のページへ</a>';
}
$pdo = null;
?>
<br>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>更新処理</title>
</head>
<body>
   <!--ログアウト-->
    <div class="button">
        <a href="logout.php" >ログアウト</a>
    </div>
</body>
</html>