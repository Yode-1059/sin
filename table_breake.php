<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テーブル破壊</title>
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
    $dbh = dbConect();
    $sql ="DROP TABLE $l_name";
    $dbh->query($sql);
    echo $sql;
    global $l_name;

    }

    @$t_name = $_POST['table_name'];
    c_list($t_name);

    echo '<br>テーブル名　'.$t_name.'は無くなりました';

?>
</body>
</html>