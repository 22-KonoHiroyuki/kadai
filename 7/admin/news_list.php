<?php
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT news_id,create_date,news_title10 FROM news WHERE show_flg=1 ORDER BY create_date DESC LIMIT 5 ";
//var_dump($sql);
echo"<br>";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ニュース一覧ページ</title>
</head>
<body>
<h1>ニュース一覧</h1>

<?php
foreach($results as $row) {

//var_dump($results);

echo'<a href="update.php?news_id='.$row['news_id'].'">'.'　　'.
                    substr($row['create_date'],0,10)
.'　　'.
                    $row['news_title10'].'
            </a><br><br>';
}
        $pdo = null; 
?>

</body>
</html>