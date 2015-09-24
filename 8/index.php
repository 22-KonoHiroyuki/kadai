<?php
    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM news WHERE show_flg=1 ORDER BY update_date DESC LIMIT 5 ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/mystyle.css">
        <title>トップページ</title>
    </head>
    <body>
        <h1>トップページ</h1>
        <dt style="list-style:none;">

        <!--更新日時の新しいニュースを5件表示-->
        <dd>❶新着ニュース</dd><br>

            <?php foreach($results as $row) {
            echo'<a href="news.php?news_id='.$row['news_id'].'">'.
            substr($row['update_date'],0,10).' '.$row['news_title'].'
            </a><br><br>';
            }
            $pdo = null; 
            ?>

            <div class="link"><a href="news_new.php?page=1" >もっと読む</a></div>

            <div class="after"></div><br><br>

        <!--カテゴリ一覧からリンクを選択-->
        <dd>❷カテゴリ検索<dd><br>

        <div id="category">
            <ul class="category_list">
                <li><a href="news_category.php?category_id=1&page=1">国内</a></li>
                <li><a href="news_category.php? category_id=2">国際</a></li>
                <li><a href="news_category.php? category_id=3">経済</a></li>
                <li><a href="news_category.php? category_id=4">エンタメ</a></li>
                <li><a href="news_category.php? category_id=5">スポーツ</a></li>
                <li><a href="news_category.php? category_id=6">IT・科学</a></li>
                <li><a href="news_category.php? category_id=7">ライフ</a></li>
                <li><a href="news_category.php? category_id=8">地域</a></li>
            </ul>
        </div>

        <div class="after"></div><br><br>

        <!--ソース一覧からリンクを選択-->
        <dd>❸ソース検索<dd><br>

        <div id="source">
            <ul class="source_list">
                <li><a href="news_source.php?source_id=1">日経新聞</a>
                </li>
                <li><a href="news_source.php?source_id=2">朝日新聞</a></li>
                <li><a href="news_source.php?source_id=3">読売新聞</a></li>
            </ul>
        </div>

        <div class="after"></div><br><br>

        <!--検索したいキーワードを入力-->
        <dd>❹キーワード検索</dd>
            <!-- 検索する時は、情報が欲しいのでGET -->
            <form action="news_search.php" method="get">
                入力: <input type="text" name="keyword" value="" size=35/><input type="submit" />
            </form>
        </dt><br><br>
       
    </body>
</html>