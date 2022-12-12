<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <?php
function dbConect(){
    $dsn ='mysql:dbname=card;host=localhost';
    $user = 'card_officer';
    $pass = 'card';

    try{
        $dbh = new PDO($dsn, $user, $pass);

        // echo'接続<br>';

    }catch (PDOException $e){
        echo'エラー:'.$e->getMessage();
        exit();
    }
    return $dbh;
    }

    function c_list($user,$l_name,$ps){
    $dbh= dbConect();
    $sql ="CREATE TABLE $user$l_name$ps(
        c_name varchar(100),
        vol INT(3),
        pack varchar(30),
        loca varchar(200),
        price varchar(6),
        memo varchar(200)
        )";
    $dbh->query($sql);
    global $l_name;
    echo $sql;
    }
    @$u_name=$_POST['u_name'];
    @$psword=$_POST['pass'];
    @$t_name = $_POST['table_name'];
    c_list($u_name,$t_name,$psword);
?>
    <form action="table_in.php" method="post">
         <p>カード番号入力<input type="text" name="id"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        金額（あれば）<input type="text" name="price" value="0"><br>
        メモ（あれば）<input type="text" name="memo">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">
            <input type="hidden" name="pass" value="'.$psword.'">
            <input type="hidden" name="u_name" value="'.$u_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
        <form action="table_in_name.php" method="post">
        <p>カード名入力　部分一致可能<input type="text" name="c_name"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        金額（あれば）<input type="text" name="price" value="0"><br>
        メモ（あれば）<input type="text" name="memo">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'"><input type="hidden" name="pass" value="'.$psword.'"><input type="hidden" name="u_name" value="'.$u_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
    </form>
        <form action="table_in_not.php" method="post">
        <p>カード以外のものを登録<input type="text" name="c_name"><br>
        個数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        金額（あれば）<input type="text" name="price" value="0"><br>
        メモ（あれば）<input type="text" name="memo">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'"><input type="hidden" name="pass" value="'.$psword.'"><input type="hidden" name="u_name" value="'.$u_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
    <form action="table_listup.php" method="post">
        <?php
        echo'<input type="hidden" name="t_name" value="'.$t_name.'"><input type="hidden" name="pass" value="'.$psword.'"><input type="hidden" name="u_name" value="'.$u_name.'">'
        ?>
        <br><input type="submit" name="リストアップ" id="" value="リストアップ"></p>
    </form>
</body>
</html>