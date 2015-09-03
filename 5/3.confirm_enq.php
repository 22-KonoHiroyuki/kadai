<html>
<head>
<meta charset="utf-8">
<title>入力確認</title>
</head>
<body>
<h1>入力確認</h1>

<!--var_dump($_POST);-->

<p> <?php echo("お名前：".htmlspecialchars($_POST["name"],ENT_QUOTES));
?>
</p>

<p> <?php echo("メールアドレス：".htmlspecialchars($_POST["email"],ENT_QUOTES));
?>
</p>

<p>
<?php echo("年齢：".htmlspecialchars($_POST["age"],ENT_QUOTES)."歳");
?>
</p>

<p>
<?php echo "性別：";
foreach($_POST["gender"] as $gender){
echo(htmlspecialchars($gender,ENT_QUOTES
));
}
?>
</p>

<p>
<?php echo "<p>趣味：";
foreach($_POST["hobby"] as $value){
    echo "{$value},";
}
echo "</p>";
?>
</p>

<p>この内容でよろしいですか？</p>
<dt>
<dl><a href="2.input_enq.php">戻る</a></dl>
<dl><a href="4.input_finish.php">次へ</a></dl>
</dt>

</body>
</html>