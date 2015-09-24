<?php
$id=$_GET["news_id"];
//var_dump("$id");
//echo "<br>";

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news where news_id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $row){
}
$pdo = null;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/mystyle.css">
<title>ニュース詳細</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/mystyle.css">
</head>

<body>
    
    <h1>News</h1>
<dl>
<dd>更新日：
<?php echo substr($row['update_date'],0,10); ?>
</dd>
<dd>タイトル：
<?php echo $row["news_title"]; ?>
</dd>
<dd>本文：
<?php echo $row["news_detail"]; ?>
</dd>
</dl>

<div class="link">
<a href="index.php" >トップページへ戻る</a>
    </div>
    
<div class="after"></div>

</body>
</html>