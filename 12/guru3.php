<?php

// keyid の設定ファイルを読み込む
require("config.php");

//エンドポイントのURIとフォーマットパラメータを変数に入れる
$url = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
//APIアクセスキーを変数に入れる
$acckey = $key_id;
//返却値のフォーマットを変数に入れる
$format = "json";

//緯度・経度、範囲を変数に入れる
$lat = $_GET["latitude"];
$lon = $_GET["longitude"];
$range = $_GET["range"];;

//URL組み立て
$url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s", $url, "?format=", $format, "&keyid=", $acckey, "&latitude=", $lat,"&longitude=",$lon,"&range=",$range,"&outret=1","&wifi=1");

//API実行
$json = file_get_contents($url);
//取得した結果をオブジェクト化
$obj = json_decode($json);

//結果をパース
foreach ((array)$obj as $key => $val) {
//    var_dump($obj);

    if (strcmp($key, "rest") == 0) {
        foreach ((array)$val as $key02 => $val02) {
            foreach ((array)$val02 as $key03 => $val03) {
                if (strcmp($key03, "name") == 0) {
                    $name[] = $val03;
                }
                if (strcmp($key03, "latitude") == 0) {
                    $lt[] = $val03;
                }
                if (strcmp($key03, "longitude") == 0) {
                    $ln[] = $val03;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/gmaps.js"></script>
<link rel="stylesheet" href="guru.css" type="text/css" />
<title>ぐるなびAPIマップ</title>
</head>
<body>
<p class="mapname" style="">ぐるめやん</p>
<div id="map"></div>
<script>
var map = new GMaps({
    el: '#map',
    lat: 35.7101  ,
    lon: 139.8107  ,
});

<?php
for( $i = 0; $i < count($name); $i++ ){ 
?>
map.addMarker({
    lat: <?php echo $lat[$i]; ?>,
    lon: <?php echo $lon[$i]; ?>,
    infoWindow: {
        content: '<p><?php echo $name[$i]; ?></p>'
    }
});
<?php
}
?>
</script>
<p>Powered by <a href="http://www.gnavi.co.jp/">ぐるなび</a></p>
</body>
</html> 
