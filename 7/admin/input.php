<html>
<head>
<title>ニュース入力ページ</title>
</head>
<body>
<h1>ニュース新規追加</h1>
<form action="input_execute.php" method="post">
<input type="hidden" name="news_id" value="" />
	タイトル(64文字以内): <br>
    <input type="text" name="news_title" value="" size="64"/><br>
	タイトル略(10文字以内):<br>
	<input type="text" name="news_title10" value="" maxlength="10"/><br>
    本文（1024文字以内）:<br>
<textarea name="news_detail" rows="5" cols="64" value=""></textarea><br>
	<input type="submit" value="登録する"/>
</form>
</body>
</html>