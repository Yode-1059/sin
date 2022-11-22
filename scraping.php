<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css">
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


    //データ挿入
function inInfo(){

    for( $num = 1 ; $num <= 1; $num++ ){
    $dbh =dbConect();
    $i = sprintf('%03d', $num);
    // echo $i;
    $link ='https://dm.takaratomy.co.jp/card/detail/?id=dmex08-245';
    // echo $link;

    $html = file_get_contents($link);//データを抽出したいURLを入力
    $dom = new DOMDocument('1.0', 'UTF-8');//インスタンス生成
    libxml_use_internal_errors( true );
    $dom->loadHTML($html);//読み込み
    $xpath = new DOMXpath($dom);



    foreach($xpath->query('//th[@class="cardname"]') as $node){

    $name = $node->nodeValue;
    echo $name,'<br>';

    }

    foreach($xpath->query('//td[@class="typetxt"]') as $node){

    $type = $node->nodeValue;

    }

    foreach($xpath->query('//td[@class="civtxt"]') as $node){

    $civ = $node->nodeValue;

    }

    foreach($xpath->query('//td[@class="powertxt"]') as $node){

    $power = $node->nodeValue;
    // echo $power,'<br>';

    }

    foreach($xpath->query('//td[@class="costtxt"]') as $node){

    $cost = $node->nodeValue;
    // echo $cost,'<br>';

    }

    foreach($xpath->query('//td[@class="racetxt"]') as $node){

    $lace = $node->nodeValue;
    // echo $lace,'<br>';

    }

    foreach($xpath->query('//td[@class="abilitytxt"]') as $node){

    $effect = $node->nodeValue;
    // echo $effect,'<br>';

    }

    foreach($xpath->query('//span[@class="packname"]') as $node){

    $pack = $node->nodeValue;
    // echo $pack,'<br>';

    }

     //データ定義
    //   $name = 'ペコタン';
    //   $civ = '水';
    //   $cost  = '4';
    //   $lace = 'サイバーロード';
    //   $type = 'クリーチャー';
    //   $effect = 'カードを一枚引く';
    //   $power = '3000';

      //SQL文実行
      $sql ="INSERT INTO `c_list`(`c_name`,`civ`, `cost`, `lace`, `type`, `effect`, `power`,`pack`) VALUES ('".$name."','".$civ."','".$cost."','".$lace."','".$type."','".$effect."','".$power."','".$pack."')";
      echo "<br>",$sql;
        $dbh->query($sql);
        }
    }
inInfo();




?>
</body>
</html>