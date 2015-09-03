<html>
<head>
<meta charset="utf-8">
<title>入力フォーム</title>
</head>
<body>
<h1>入力フォーム</h1>
<form action="3.confirm_enq.php" method="post">

<p>名前：　 <input type="text" name="name" >
</p>

<p>E-mail： <input type="text" name="email" size="35" maxwidth="250" value="" >
</p>

<p>年齢：　 <input type="text" name="age" >
</p>

<p>性別：
<input type="radio" name="gender[]" value="男性">男性
<input type="radio" name="gender[]" value="女性">女性
</p>

<p>趣味（複数選択可）：</p>
<input type="checkbox" name="hobby[]" value="プログラミング" >プログラミング
<input type="checkbox" name="hobby[]" value="スポーツ" >スポーツ
<input type="checkbox" name="hobby[]" value="読書" >読書
<input type="checkbox" name="hobby[]" value="映画鑑賞" >映画鑑賞
<input type="checkbox" name="hobby[]" value="散歩" >散歩
</p>

<p>
<input type="submit" value="送信">
</p>

</form>
</body>
</html>