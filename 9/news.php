<?php
//セッションスタート
session_start();

//タイトルのリンクからニュースIDを取得
$id=$_GET["news_id"];
//var_dump($id);

//ニューステーブルから特定のニュースIDのデータを取得
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news where news_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $row){
}
//var_dump($row);
$pdo = null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>ニュース詳細</title>
</head>

<body>
    <h1>ニュース詳細</h1>

<!--取り出したカテゴリーデータを表示-->
    <dl>
        <dd>更新日：
<?php echo substr($row['update_date'],0,10); ?>
        </dd><br>
        <dd>タイトル：
<?php echo $row["news_title"]; ?>
        </dd><br>
        <dd>本文：
<?php echo $row["news_detail"]; ?>
        </dd>
    </dl>

<!--トップページへリンク-->
    <div class="link">
        <a href="index.php" >トップページへ戻る</a>
    </div><br>

   <!--ログアウト-->
    <div class="button">
        <a href="logout.php" >ログアウト</a>
    </div>

</body>
</html>