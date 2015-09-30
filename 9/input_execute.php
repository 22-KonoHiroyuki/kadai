<?php
//セッションスタート
session_start();

//取得したデータを変数に代入
$title = $_POST["news_title"];
$detail = $_POST["news_detail"];
$category = $_POST["category_id"];
$source = $_POST["source_id"];
$keyword = $_POST["keyword"];
$flg = $_POST["show_flg"];
//var_dump($title);

//ニューステーブルへ取得したデータを挿入
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "INSERT INTO news (news_id,news_title, news_detail, category_id, source_id, keyword, show_flg, create_date, update_date) VALUES (NULL,'".$title."','".$detail."','".$category."','".$source."','".$keyword."','".$flg."',sysdate(),sysdate()) ";
//var_dump($sql);

$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
//var_dump($result);

//登録判断
if($result) {
	echo "データが登録できました。";
    echo "<br>";
	echo "<a href=index_admin.php>管理者トップページへ</a>";
} else {
	echo "データの登録に失敗しました";
    echo "<br>";
    echo "<a href=input.php>前のページへ戻る</a>";
}
$pdo = null;
?>
<br>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>新規登録処理</title>
</head>
<body>
   <!--ログアウト-->
    <div class="button">
        <a href="logout.php" >ログアウト</a>
    </div>
</body>
</html>