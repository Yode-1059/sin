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

    function listup(){
        $dbh=dbConect();
        @$t_name=$_POST['t_name'];
    echo $t_name."の中身<br>";
        $sql ='SELECT * FROM '.$t_name.'';
        echo '<form action="table_clean.php" method="post">';
        echo '<select name="card">';
        $stmt = $dbh->query($sql);
        foreach($stmt as $node){
            $name =$node['c_name'];
            $vol=$node['vol'];
            echo '<option value="'.$name.'" name="name">';
            echo $name."　".$vol."枚";
            echo '</option>';
        }
        echo "</select><br>";
        echo' <input type="hidden" name="t_name" value="'.$t_name.'">
        <input type="submit" name="リストアップ" id="" value="これを消す">
        </form>';
        echo '<form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="'.$t_name.'">
        <input type="submit" name="リストアップ" id="" value="登録に戻る">
        </form>';
    }

    listup();
    ?>

</body>
</html>