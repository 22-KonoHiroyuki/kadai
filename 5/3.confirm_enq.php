<html>
<head>
<meta charset="utf-8">
<title>入力内容確認</title>
</head>

<?php
$name=htmlspecialchars($_POST["name"],ENT_QUOTES);

$email=htmlspecialchars($_POST["email"],ENT_QUOTES);

$age=htmlspecialchars($_POST["age"],ENT_QUOTES);
?>

<body>
<h1>あなたの入力内容</h1>

<p>
お名前：
<?php echo $name; ?>
</p>

<p>
E-mail：
<?php echo $email; ?>
</p>

<p>
年齢：
<?php
if (is_numeric($age)){
    echo $age;
}else{
    echo $age."（数値を入力してください。）";
}
?>
</p>

<p>
<?php echo "性別：";//
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

<br>

<p>この内容でよろしいですか？</p>
<dt>
<dl>
<form  action ="4.input_finish.php" method="POST">
<input type="hidden" name="    name" value="<?php echo $name; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">
<input type="submit" value="送　信">
</form>
<dl><a href="2.input_enq.php">戻る</a></dl>
</dl>
</dt>

</body>
</html>