<?php
$category_id=$_GET["category_id"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT news.news_id,news.update_date, news.news_title, category.category_name FROM category,news WHERE category.category_id=:category_id AND category.category_id=news.category_id AND show_flg=1 ORDER BY update_date DESC";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':category_id',$category_id,PDO::PARAM_INT);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/mystyle.css">
        <title>カテゴリ検索</title>
    </head>
    <body>
        <h1>カテゴリ検索</h1>
            <?php foreach($results as $row){
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
    
        <div class="after"></div>

    </body>
</html>