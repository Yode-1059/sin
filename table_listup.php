<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

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
    $total = 0;
    echo $t_name . "の中身<br>";
    $sql = "SELECT * FROM $u_name$t_name$psword";
    echo '<form action="table_clean.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">';
    echo '<select name="card">';
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

    echo '</select><br>
        合計金額：' . $total . '円<br>
        <input type="submit" name="リストアップ" id="" value="これを消す">
        </form>
        <form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">
        <input type="submit" name="リストアップ" id="" value="登録に戻る">
        </form>';
}

listup();
?>

</body>

</html>