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
    $dbh= dbConect();
    $sql = "CREATE user 'root'@'localhost'";
    $dbh ->query($sql);
    echo $sql;
        $link ='https://dm.takaratomy.co.jp/card/detail/?id=dmex08-245';

    $link ='https://dm.takaratomy.co.jp/card/detail/?id=dmex08-245';

    $html = file_get_contents($link);
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->loadHTML($html);
    $xpath = new DOMXpath($dom);



    foreach($xpath->query('//th[@class="cardname"]') as $node){

    $name = $node->nodeValue;
    echo 'クリーチャー名：',$name,'<br>';

    }

    foreach($xpath->query('//td[@class="typetxt"]') as $node){

    $type = $node->nodeValue;
    echo 'カードタイプ：',$type,'<br>';
    }

    foreach($xpath->query('//td[@class="civtxt"]') as $node){

    $civ = $node->nodeValue;
    echo '文明：',$civ,'<br>';
    }

    foreach($xpath->query('//td[@class="powertxt"]') as $node){

    $power = $node->nodeValue;
    echo 'パワー：',$power,'<br>';

    }

    foreach($xpath->query('//td[@class="costtxt"]') as $node){

    $cost = $node->nodeValue;
    echo 'コスト：',$cost,'<br>';

    }

    foreach($xpath->query('//td[@class="racetxt"]') as $node){

    $race = $node->nodeValue;
    echo '種族：',$race,'<br>';

    }

    foreach($xpath->query('//td[@class="abilitytxt"]') as $node){

    $effect = $node->nodeValue;
    echo '効果：',$effect,'<br>';

    }

    foreach($xpath->query('//td[@class="flavortxt"]') as $node){

    $ftxt = $node->nodeValue;
    echo 'フレーバーテキスト：',$ftxt,'<br>';

    }

    foreach($xpath->query('//span[@class="packname"]') as $node){

    $pack = $node->nodeValue;
    echo '収録パック：',$pack,'<br>';

    }
    ?>
</body>
</html>