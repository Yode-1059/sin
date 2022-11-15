<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css">
    <title>table</title>
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

    function create(){//テーブル作成

       $dbh= dbConect();
    $sql ="CREATE TABLE list(
        c_name varchar(100),
        vol INT(3),
        pack varchar(10))";
    $dbh->query($sql);
    echo $sql;

    }

    create();

    function search(){//検索・出力

       $dbh= dbConect();
    $sql ="SELECT * FROM c_list WHERE pack='(DM22EX1 24/130)'";
    $stmt = $dbh->query($sql);

        foreach($stmt as $low){
            echo $low['name'];
        }
    }

    search();

?>

   <form action="table.php" method="post">
      <input type="text" name="l-name"><br>
      <input type="submit" value="送信">
    </form>
<?php
   echo $_GET['l-name'];
?>
</body>
</html>