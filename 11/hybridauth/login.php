<?php
$config = "config.php";
// ライブラリを読み込む
require_once("Hybrid/Auth.php");
require_once("Hybrid/Endpoint.php");

try {
// 初期化
    $hybridauth = new Hybrid_Auth($config);

// 認証処理
    $twitter = $hybridauth->authenticate( "Twitter" );

// 認証した $twitterインスタンスからユーザー情報を取得
    $user_profile = $twitter->getUserProfile();
//var_dump($user_profile);
    echo "ようこそ! " . $user_profile->displayName." さん",
         "<br>",
         "ギークに嬉しいWIFIと電源が使えるレストラン検索サイトです",
         "<br>",
         '<a href="http://127.0.0.1/kadai/11/guru.php">ぐるめやん</a>';
}
catch ( Exception $e ) {
    echo "正常にログイン認証できませんでした: " . $e->getMessage();
    header("Location:index.php");
    exit;
}
?>
