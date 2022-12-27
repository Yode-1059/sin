<?php
include("header.php");
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

function c_list($user, $l_name, $ps)
{
    $dbh = dbConect();
    $sql = "CREATE TABLE $user$l_name$ps(
        c_name varchar(100),
        vol INT(3),
        pack varchar(30),
        loca varchar(200),
        price varchar(6),
        memo varchar(200)
        )";
    $dbh->query($sql);

    $sql = "INSERT INTO $user$l_name$ps(`c_name`, `vol`, `pack`,`loca`,`price`,`memo`) VALUES ('node',16,'node','node','node','node')";
    $dbh->query($sql);
    global $l_name;
}
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$t_name = $_POST['table_name'];
c_list($u_name, $t_name, $psword);
?>
<?php echo "<p>テーブル：".$t_name."を作成しました</p>" ?>
<div class="d-flex justify-content-between">
    <form action="table_in.php" method="post">
        <p>カード番号入力<br>
            <input type="text" name="id">
        </p>
        <p>枚数<br>
            <input type="number" name="vol">
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" id="">
        </p>
    </form>
    <form action="table_in_name.php" method="post">
        <p>カード名入力　部分一致可能<br>
            <input type="text" name="c_name">
        </p>
        <p>枚数<br>
            <input type="number" name="vol">
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" id="">
        </p>
    </form>
    <form action="table_in_not.php" method="post">
        <p>カード以外のものを登録<br>
            <input type="text" name="c_name">
        </p>
        <P>個数<br>
            <input type="number" name="vol">
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" id="">
        </p>
    </form>
    <div>
        <form action="table_listup.php" method="post">
            <?php echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '"><p>現在のテーブル：' . $t_name . '</p> '?>
            <br><input type="submit" name="リストアップ" id="" value="リストアップ"></p>
        </form>
        <form action="form.php" method="post">
            <input type="submit" value="ホームへ戻る">
            <?php echo '<input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">'?>
        </form>
    </div>
</div>
<?php include("footer.php"); ?>