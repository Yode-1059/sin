<?php include("header.php");

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

function listup()
{
    $dbh = dbConect();
    @$t_name = $_POST['t_name'];
    @$u_name = $_POST['u_name'];
    @$psword = $_POST['pass'];
    $sql = "SELECT * FROM $u_name$t_name$psword";
    $che = NULL;
    $stmt = $dbh->query($sql);
    foreach ((array) $stmt as $low) {
        @$che = $low['c_name'];
    }
    if ($che == null) {
        echo ('<p>そのテーブルは存在しません<br></p>
            <form action="form.php" method="post">
            <input type="hidden" name="t_name" value="' . $t_name . '">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">
            <input type="submit" value="ホームへ戻る">
            </form>');
    } else {
        $total = 0;
        echo '<p class="mb-3">'.$t_name . "の中身</p>";
        $sql = "SELECT * FROM $u_name$t_name$psword WHERE NOT price LIKE '%node%'";
        echo '<form action="table_clean.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">';
        echo '<select name="card" class="mb-3 mw-100">';
        $stmt = $dbh->query($sql);
        foreach ($stmt as $node) {
            $name = $node['c_name'];
            $pri = $node['price'];
            $place = $node['loca'];
            $total = $total + $pri;
            $vol = $node['vol'];
            echo '<option value="' . $name . '" name="name">';
            echo $name . "　" . $vol . "枚　";
            if ($pri != NULL) {
                echo $pri . "円　";
            }
            if ($place != NULL) {
                echo "場所：" . $place;
            }
            echo '</option>';
        }
        echo $name;
        if ($name == null) {
            echo "</select></form>";
        } else {
            echo '</select><br>
        <p class="mb-3">合計金額：' . $total . '円</p>
        <div class="d-flex justify-content-start">
        <input class="me-4" type="submit" name="リストアップ" id="" value="これを消す">
        </form>';
        }


        echo '<form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">
        <input type="submit" name="リストアップ" id="" value="登録に戻る">
        </form>
        </div.';
    }

}

listup();

include("footer.php");
?>