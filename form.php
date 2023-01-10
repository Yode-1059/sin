<?php include("header.php");

function dbConect()
{
    $dsn ='mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1416052-card';
    $user = 'LAA1416052';
    $pass = 'card';

    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        echo 'エラー:' . $e->getMessage();
        exit();
    }
    return $dbh;
}
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$state = $_POST['state'];

if ($state == 'not') {
    $sql = 'INSERT INTO `user_info` (`user`, `pass`) VALUES ("' . $u_name . '", "' . $psword . '")';
    $dbh = dbConect();
    $dbh->query($sql);
}
$dbh = dbConect();
$sql = 'SELECT * FROM `user_info` WHERE `user`="' . $u_name . '" AND `pass`="' . $psword . '"';
$stmt = $dbh->query($sql);
$che = null;
foreach ( $stmt as $low) {
    @$che = $low['user'];
}

    if ($che == $u_name) {
        if($state=='already'){
        echo '<p>こんにちは　'.$u_name.'さん</p>';
        }
    @$u_name = $_POST['u_name'];
    @$psword = $_POST['pass'];
    echo '<form action="table_create.php" method="post">
    <h3>新しいテーブルを作る</h3>

    <p>作りたいテーブル名<br><input type="text" name="table_name" require></p>
    <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="作る" class="sub">
    <input type="hidden" name="title" value="カード登録｜">
    </p>
</form>
<form action="table_listup.php" method="post">
    <h3>テーブルの確認</h3>
    <p>見たいテーブル<br><input type="text" name="t_name"></p>
    <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="表示" class="sub">
    <input type="hidden" name="title" value="内容の確認｜">
    </p>
</form>
<form action="table_breake.php" method="post">
    <h3>テーブルの解体</h3>
    <p>壊したいテーブル名<br><input type="text" name="table_name" require></p>
        <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="解体する" class="sub" id="del">
    <input type="hidden" name="title" value="テーブル解体｜">
</form>
<form action="./">
    <input type="submit" value="ログアウト">
</form>
';
    } else {
        echo '<p>パスワードかユーザー名が間違っています</p>
            <form action="./">
            <input type="submit" value="入力に戻る">
        </form>';
    }

include("footer.php"); ?>