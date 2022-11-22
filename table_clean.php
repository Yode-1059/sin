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

    function crean($table,$card){
        $dbh= dbConect();
        $sql ="DELETE FROM `$table` WHERE `name` ='$card'";
        echo $sql;
        $dbh->query($sql);
    }

    $t_name=$_POST['t_name'];
    echo "テーブル：".$t_name."<br>";
    $c_name= $_POST['name'];
    echo "カード名：".$c_name."<br>";


    crean($t_name,$c_name);

    ?>