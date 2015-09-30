<?php
//セッションスタート
session_start();

//ページごとに表示する件数を定義
define('COMMENTS_PER_PAGE',10);

//正規表現によるマッチング
if(preg_match('/^[1-9][0-9]*$/',$_GET['page'])){
        $page= (int)$_GET['page'];
    }else{
    $page=1;
    }

//ニューステーブルからニュース一覧を、更新の新しい順から取得
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$offset= COMMENTS_PER_PAGE*($page-1);
$sql = "SELECT * FROM news WHERE show_flg=1 ORDER BY update_date DESC LIMIT ".$offset.",".COMMENTS_PER_PAGE;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);

//ニューステーブルから総件数を取得し、ページ番号を設定
$total=$pdo->query("select count(*) from news")->fetchColumn();
$totalPages=ceil($total/COMMENTS_PER_PAGE);
//var_dump($total);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/mystyle.css">
        <title>新着ニュース一覧</title>
    </head>
    <body>
        <h1>新着ニュース一覧</h1>
        
<!--取り出したニュースデータを繰り返し表示-->
<?php
    foreach($results as $row) {
        if(isset($_SESSION["name"])){
        echo'<a href="update.php?news_id='.$row['news_id'].'">'.
        substr($row['update_date'],0,10).' '.
        substr($row['news_title'],0,48).'
        </a><br><br>';

        }else{

        echo'<a href="news.php?news_id='.$row['news_id'].'">'.
        substr($row['update_date'],0,10).' '.
        substr($row['news_title'],0,48).'
        </a><br><br>';
        }
    }
//var_dump($row);
    $pdo = null;
?>

<!--ページ番号の表示（現在表示しているページのみ太字）-->
<?php for ($i=1;$i<=$totalPages;$i++): ?>
    <?php if($page==$i): ?>
        <strong><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> </strong>
    <?php else: ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<!--「前」の表示-->
<?php if($page>1): ?>
    <a href="?page=<?php echo $page-1;?>">前</a>
<?php endif; ?>

<!--「次」の表示-->
<?php if($page<$totalPages): ?>
    <a href="?page=<?php echo $page+1; ?>">次</a>
<?php endif; ?>
           
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