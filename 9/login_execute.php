<?php
//セッションスタート
session_start();

//管理者用IDとパスワードを変数に代入
$name = $_POST["name"];
$pass = $_POST["pass"];

//管理者ログイン認証
if(!empty($_POST)){
    if($name=="admin" && $pass=="password") {
        $_SESSION["name"] = $name;
        echo "ログインできました";
        echo "<br>";
        echo '<a href="index_admin.php">管理者用トップページへ</a>';
    } else {
        $error["login"]="failed";
        header("Location:login.php");
        exit;
    }
    }else{
        $error["login"]="blank";
        header("Location:login.php");
        exit;
    }
?>

<html>
<head>
    <title>ログイン認証</title>
</head>
<body>
</body>
</html>