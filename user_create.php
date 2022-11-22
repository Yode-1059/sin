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

   function user(){
    $dbh = dbConect();
    $u_name ="あいがも";
    echo $u_name;
    $sql='CREATE USER `'.$u_name.'`@`localhost` IDENTIFIED BY `かも`';
    echo $sql;
    $dbh->query($sql);
   }

   user();

?>