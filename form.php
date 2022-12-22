<?php include("header.php");

function dbConect()
{
    $dsn = 'mysql:dbname=card;host=localhost';
    $user = 'card_officer';
    $pass = 'card';

    try {
        $dbh = new PDO($dsn, $user, $pass);

        // echo'接続<br>';

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
    echo $sql;
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

    <p>作りたいテーブル名<input type="text" name="table_name" require></p>
    <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="作る">
    </p>
</form>
<form action="table_listup.php" method="post">
    <h3>テーブル確認</h3>
    <p>見たいテーブル<input type="text" name="t_name"></p>
    <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="表示">
    </p>
</form>
<form action="table_breake.php" method="post">
    <h3>テーブル解体</h3>
    <p>壊したいテーブル名<input type="text" name="table_name" require></p>
        <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="解体する">
</form>
<form action="login.php">
    <input type="submit" value="ログアウト">
</form>
';
    } else {
        echo '<p>パスワードかユーザー名が間違っています</p>
            <form action="login.php">
            <input type="submit" value="入力に戻る">
        </form>';
    }




include("footer.php"); ?>