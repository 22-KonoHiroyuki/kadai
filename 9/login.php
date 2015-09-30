<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/mystyle.css">
<title>管理者ログイン認証</title>
</head>
<body>
    <h1>管理者ログインページ</h1>

    <p>管理者用のログイン名とパスワードを入力してください。</p>

<!--ログイン名・パスワードの入力画面-->
    <form action="login_execute.php" method="post">
	    ログイン名: <input type="text" name="name" value="" />
	    パスワード: <input type="password" name="pass" value="" />
	    <input class="button" type="submit" />
    </form>

<!--管理者でない場合、新規登録及び更新ができないページへ誘導-->
    →管理者でない場合、通常のトップページへどうぞ
    <a href ="index.php">通常のトップページへ</a＞
</body>
</html>