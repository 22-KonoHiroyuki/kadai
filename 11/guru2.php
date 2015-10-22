<?php
require("config.php");

//エンドポイントのURIとフォーマットパラメータを変数に入れる
$uri   = "http://api.gnavi.co.jp/RestSearchAPI/20150630/";
//APIアクセスキーを変数に入れる
$acckey= "728d71cb3c9bd96648ce9f45600837d7 ";

$acckey = $key_id;

//返却値のフォーマットを変数に入れる
$format= "json";
//緯度・経度、範囲を変数に入れる
$lat = $_GET["latitude"];
$lon   = $_GET["longitude"];
$range = $_GET["range"];;
 
//URL組み立て
$url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey, "&latitude=", $lat,"&longitude=",$lon,"&range=",$range,"&outret=1","&wifi=1");
//API実行
$json = file_get_contents($url);
//取得した結果をオブジェクト化
$obj  = json_decode($json);
 
//結果をパース
//トータルヒット件数、店舗名、最寄の路線、最寄の駅、最寄駅から店までの時間、店舗の小業態を出力
foreach((array)$obj as $key => $val){
//    var_dump($obj);
    if(strcmp($key, "total_hit_count" ) == 0 ){
        echo "合計".$val."件該当あり";
        echo "<br><br>";
    }
 
    if(strcmp($key, "rest") == 0){
        foreach((array)$val as $restArray){
            if(checkString($restArray->{'name'})) echo $restArray->{'name'};
            echo "<br>";

            if(checkString($restArray->{'access'}->{'line'}))    echo (string)$restArray->{'access'}->{'line'}."\t";
            if(checkString($restArray->{'access'}->{'station'})) echo (string)$restArray->{'access'}->{'station'}."\t";
            if(checkString($restArray->{'access'}->{'walk'}))    echo (string)$restArray->{'access'}->{'walk'}."分\t";
           
            
            foreach((array)$restArray->{'code'}->{'category_name_s'} as $v){
                if(checkString($v)) echo $v."\t";
            }
            
            echo "<br>";
            if(checkString($restArray->{'url'}))    echo "<a href=".$restArray->{'url'}.">リンク</a>";
            echo "<hr>";
       }
    }
}
 
//文字列であるかをチェック
function checkString($input){
    if(isset($input) && is_string($input)) {
        return true;
    }else{
        return false;
    }
}
?>

<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<a href=guru.php>検索ページへ戻る</a>
</body>
</html>