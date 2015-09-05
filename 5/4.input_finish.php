<html>
<head>
<meta charset="utf-8">
<title>ありがとうございました</title>
</head>
<body>

<?php
$name=htmlspecialchars($_POST["name"],ENT_QUOTES);

$email=htmlspecialchars($_POST["email"],ENT_QUOTES);

$age=htmlspecialchars($_POST["age"],ENT_QUOTES);

$array=array($name,$email,$age);

$file = fopen("./data/data.csv","a");
flock($file, LOCK_EX);
fputs($file, $array. PHP_EOL);
flock($file, LOCK_UN);
fclose($file);
?>

<?php echo($name); ?>
さん、
<br>
データ送信が完了しました。<br>
ご入力ありがとうございました。

</body>
</html>