<?php
//セッションスタート
session_start();

//取得したIDデータを変数に代入
$id = $_GET["news_id"];
//var_dump($sql);

//ニューステーブルから特定のニュースIDのデータを削除
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "DELETE FROM news WHERE news_id =$id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$result = $stmt->execute();
//var_dump($sql);

//削除処理
if($result) {
    echo "データが削除できました";
    echo "<br>";
    echo'<a href="index_admin.php" >管理者トップページへ</a>';
} else {
    echo "データの削除に失敗しました";
    echo "<br>";
    echo'<a href="update.php" >前のページへ戻る</a>';
}
?>
<br>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>削除処理</title>
</head>
<body>

   <!--ログアウト-->
    <div class="button">
        <a href="logout.php" >ログアウト</a>
    </div>

</body>
</html>