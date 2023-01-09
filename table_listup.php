<?php include("header.php");?>

<?php
    ini_set("display_errors", 'On');
    error_reporting(E_ALL);
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

function listup(){
    $dbh = dbConect();
    @$t_name = $_POST['t_name'];
    @$u_name = $_POST['u_name'];
    @$psword = $_POST['pass'];
    $sql = "SELECT * FROM $u_name$t_name$psword";
    $name = 1;
    $stmt = $dbh->query($sql);
    foreach ( $stmt as $low) {
        @$name = $low['c_name'];
    }
    if ($name == 1) {
        echo ('<p>そのテーブルは存在しません<br></p>
            <input type="submit" value="ホームへ戻る">
            </form>');
    } else {
        $total = 0;
        $sql = "SELECT * FROM $u_name$t_name$psword WHERE NOT price LIKE '%node%'";
        echo '<p class="mb-3">'.$t_name . "の中身</p>";
        echo '<form action="table_clean.php" method="post">';
        echo'<select name="card" class="mb-3 mw-100">';
        $stmt = $dbh->query($sql);
        foreach ($stmt as $low) {
            $name = $low['c_name'];
            (int)$pri = (int)$low['price'];
            $place = $low['loca'];
            (int)$total = (int)$total + $pri;
            $vol = $low['vol'];
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
            echo '</select><input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '"></form>';
        } else {
            echo '</select><br>
        <p class="mb-3">合計金額：' . $total . '円</p>
        <div class="d-flex justify-content-start">
        <input class="me-4" type="submit" name="リストアップ" id="" value="これを消す" class="sub">
        </form>';
        }


        echo '<form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">
        <input type="submit" name="リストアップ" id="" value="登録に戻る" class="sub">
        </form>
        </div>';
    }

}

listup();
?>
<?php
include("footer.php");
?>