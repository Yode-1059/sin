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
        echo `<select name="card">`;
        $sql ='SELECT * FROM `箱の中`';
        echo $sql;
        $stmt = $dbh->query($sql);
        foreach($stmt as $node){
            $name =$node['c_name'];
            echo $name;
            echo `<option.$name.</option>`;
        }
        echo "</select>";
    }

    listup();
    ?>

</body>
</html>