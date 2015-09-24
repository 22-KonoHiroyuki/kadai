<?php
$keyword=$_GET["keyword"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news,category WHERE category.category_id=news.category_id AND keyword LIKE '%$keyword%'";
//$sql = "SELECT * FROM news,category WHERE category.category_id=news.category_id AND keyword LIKE '%".':keyword'."%'";

$stmt = $pdo->prepare($sql);
//$stmt->bindValue(':keyword',$keyword,PDO::PARAM_INT);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/mystyle.css">
        <title>キーワード検索</title>
    </head>
    <body>
        <h1>キーワード検索</h1>

        <?php foreach($results as $row) {
        echo'<a href="news.php?news_id='.$row['news_id'].'">'.
        substr($row['update_date'],0,10).' '.
        $row['news_title'].' '.
        $row['category_name'].'
        </a><br><br>';
        }
        $pdo = null; 
        ?>

        <div class="link">
        <a href="index.php" >トップページへ戻る</a>
        </div>

    </body>
</html>