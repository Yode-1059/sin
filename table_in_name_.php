<?php
include("header.php");
function dbConect()
{
    $dsn = 'mysql:dbname=card;host=localhost';
    $user = 'card_officer';
    $pass = 'card';

    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        echo 'エラー:' . $e->getMessage();
        exit();
    }
    return $dbh;
}

function input($user, $table, $ps, $c_id, $vol, $loca, $pri, $me)
{
    $dbh = dbConect();
    $sql = "SELECT * FROM `c_list` WHERE c_name='$c_id'";
    $stmt = $dbh->query($sql);
    foreach ($stmt as $low) {
        $c_name = $low['c_name'];
        $c_no = $low['pack'];
        $sql = "SELECT * FROM `$user$table$ps` WHERE c_name='$c_name'";
        $stmt = $dbh->query($sql);
        $che = null;
        foreach ( $stmt as $low) {
        @$che = $low['c_name'];
        }
        if($c_name==$che){
            $olivol = 0;
            $sql = "SELECT * FROM `$user$table$ps` WHERE c_name='$c_name'";
            $stmt = $dbh->query($sql);
            foreach ( $stmt as $low) {
                @$olivol = $low['vol'];
                @$c_name = $low['c_name'];
                $vol += $olivol;
                $sql = "UPDATE $user$table$ps SET `vol`=$vol WHERE `c_name`='$c_name'" ;
                $dbh->query($sql);
                echo $sql;
                echo $c_name;
                echo 'の枚数を追加したよ';
            }
        }else{
            $sql = "INSERT INTO $user$table$ps(`c_name`, `vol`, `pack`,`loca`,`price`,`memo`) VALUES ('$c_name',$vol,'$c_no','$loca','$pri','$me')";
            $stmt = $dbh->query($sql);
             if ($c_id != NULL) {
                echo $c_name;
                echo 'を登録したよ';
            }
        }
    }
}

@$t_name = $_POST['t_name'];
@$cd_name = $_POST['c_name'];
@$c_vol = $_POST['vol'];
@$c_loca = $_POST['loca'];
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$price = $_POST['price'];
@$memo = $_POST['memo'];
echo $psword;

input($u_name, $t_name, $psword, $cd_name, $c_vol, $c_loca, $price, $memo);
?>

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
<form action="table_listup.php" method="post">
    <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '"><p>現在のテーブル：' . $t_name . '</p> '
        ?>
    <br><input type="submit" name="リストアップ" id="" value="リストアップ"></p>
</form>
<form action="form.php" method="post">
    <input type="submit" value="ホームへ戻る">
</form>

<?php include("footer.php") ?>