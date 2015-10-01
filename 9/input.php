<?php
//セッションスタート
session_start();
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>ニュース新規登録</title>
</head>
<body>
    <h1>ニュース新規登録</h1>
    <form action="input_execute.php" method="post">
 
        <input type="hidden" name="news_id" value="" />
    
        タイトル(64文字以内): <br>
        <input type="text" name="news_title" value="" size="64"/><br>
    
        本文（1024文字以内）:<br>
        <textarea name="news_detail" rows="5" cols="64" value=""></textarea><br>
    
        カテゴリ: <br>
        <SELECT name="category_id">
            <OPTION value=1>国内</OPTION>
            <OPTION value=2>国際</OPTION>
            <OPTION value=3>経済</OPTION>
            <OPTION value=4>エンタメ</OPTION>
            <OPTION value=5>スポーツ</OPTION>
            <OPTION value=6>IT・科学</OPTION>
            <OPTION value=7>ライフ</OPTION>
            <OPTION value=8>地域</OPTION>
        </SELECT><br><br>
    
        ソース: <br>
        <SELECT name="source_id">
            <OPTION value=1>日経新聞</OPTION>
            <OPTION value=2>朝日新聞</OPTION>
            <OPTION value=3>読売新聞</OPTION>
        </SELECT><br><br>

        キーワード: <br>
        <input type="text" name="keyword" value="" size="64"/><br><br>

        表示/非表示: <br>
        <SELECT name="show_flg">
            <OPTION value=1>表示</OPTION>
            <OPTION value=0>非表示</OPTION>
        </SELECT><br><br>

        <input class="button" type="submit" value="登録する"/>
    </form><br>
    
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