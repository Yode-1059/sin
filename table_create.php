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

    function c_list($l_name){
    $dbh= dbConect();
    $sql ="CREATE TABLE $l_name(
        c_name varchar(100),
        vol INT(3),
        pack varchar(30),
        loca varchar(200))";
    $dbh->query($sql);
    echo $sql;
    global $l_name;
    }

    @$t_name = $_POST['table_name'];
    c_list($t_name);
    // http_response_code( 301 );
    // header('Location:http://localhost/sin/table_in.php?t_name='.$t_name.'');

?>
    <form action="table_in.php" method="post">
        <p>カード番号入力<input type="text" name="id"><br>
        枚数<input type="number" name="vol"><br>
         場所<input type="text" name="loca"><br>
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
    <form action="table_in_name.php" method="post">
        <p>カード名入力　部分一致可能<input type="text" name="name"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
</body>
</html>