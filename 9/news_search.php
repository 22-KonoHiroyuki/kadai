<?php
//セッションスタート
session_start();

//タイトルのリンクからキーワードを取得
$keyword=$_GET["keyword"];
//var_dump($keyword);

//カテゴリーテーブルとニューステーブルからキーワードに前後部分一致するデータを、更新の新しい順から取得
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news,category WHERE category.category_id=news.category_id AND keyword LIKE '%$keyword%' AND show_flg=1 ORDER BY update_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);

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

<!--取り出したニュースデータを繰り返し表示-->
<?php
    foreach($results as $row) {
        if(isset($_SESSION["name"])){
        echo'<a href="update.php?news_id='.$row['news_id'].'">'.
        substr($row['update_date'],0,10).' '.$row['news_title'].' '.$row['category_name'].'
        </a><br><br>';
        }else{
        echo'<a href="news.php?news_id='.$row['news_id'].'">'.
        substr($row['update_date'],0,10).' '.$row['news_title'].' '.$row['category_name'].'
        </a><br><br>';
        }
    }
//var_dump($row);
    $pdo = null; 
?>

<!--トップページへリンク-->
        <div class="link">
<?php
    if(isset($_SESSION["name"])){
        echo'<a href="index_admin.php" >管理者トップページへ</a>';
    }else{
        echo'<a href="index.php" >トップページへ</a>';
    }
?>
        </div><br>
        
        <!--ログアウト-->
        <div class="button">
            <a href="logout.php" >ログアウト</a>
        </div>
   
    </body>
</html>