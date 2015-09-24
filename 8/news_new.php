<?php
define('COMMENTS_PER_PAGE',10);

if(preg_match('/^[1-9][0-9]*$/',$_GET['page'])){
$page= (int)$_GET['page'];
}else{
    $page=1;
}

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$offset= COMMENTS_PER_PAGE*($page-1);
$sql = "SELECT * FROM news WHERE show_flg=1 ORDER BY update_date DESC LIMIT ".$offset.",".COMMENTS_PER_PAGE;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total=$pdo->query("select count(*) from news")->fetchColumn();
$totalPages=ceil($total/COMMENTS_PER_PAGE);
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

            <?php foreach($results as $row) {
            echo'<a href="news.php?news_id='.$row['news_id'].'">'.
            substr($row['update_date'],0,10).' '.
            $row['news_title'].'
            </a><br><br>';
            }
            $pdo = null; 
            ?>

                <?php if($page>1): ?>
                    <a href="?page=<?php echo $page-1; ?>">前</a>
                <?php endif; ?>
                <?php for ($i=1;$i<=$totalPages;$i++): ?>
                <?php if($page==$i): ?>
                    <strong><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> </strong>
                <?php else: ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endif; ?>
                <?php endfor; ?>
                <?php if($page<$totalPages): ?>
                    <a href="?page=<?php echo $page+1; ?>">次</a>
                <?php endif; ?>

            <div class="link">
                <a href="index.php" >トップページへ戻る</a>
            </div>

            <div class="after"></div>

    </body>
</html>