<html>
<head>
<meta charset="utf-8">
<title>入力内容表示</title>
</head>
<body>

<?php
$fp = fopen("./data/data.csv", "r");
flock($fp, LOCK_SH);

while ($array = fgetcsv( $fp )){
    $num = count($array);

    for($i=0;$i<$num;$i++){
        echo $array[$i];
        echo "<br>";
}
}
flock($fp, LOCK_UN);                      fclose($fp);                              ?>


<br><br>
入力内容を表示しました。

</body>
</html>