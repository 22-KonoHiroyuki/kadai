<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="guru.css" type="text/css" />
<title>検索ページ</title>
</head>
<body>
<p>”ぐるめやん”
<br>〜WIFIと電源が使えるレストラン検索〜</p>

<form action="guru3.php" method="get">
    緯度: <input type="text" name="latitude" /><br>
    経度: <input type="text" name="longitude" /><br>
    範囲: <SELECT name="range">
            <OPTION value=1>300m</OPTION>
            <OPTION value=2>500m</OPTION>
            <OPTION value=3>1,000m</OPTION>
        </SELECT><br>

    <input type="submit" />
</form>
</body>
</html>