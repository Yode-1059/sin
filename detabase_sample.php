<title>tst</title>

<?php


//関数一つに一つの機能のみ持たせる
//1.データベース接続
//2.データ取得
//3.何かを表示

//1.データベース接続
//引数：なし
//返り値：接続結果
function dbConect(){
    $dsn ='mysql:dbname=card;host=localhost';
    $user = 'card_officer';
    $pass = 'card';

    try{
        $dbh = new PDO($dsn, $user, $pass);

        echo'接続';
        //接続成功で出力

    }catch (PDOException $e){
        echo'エラー:'.$e->getMessage();
        exit();
        //失敗
    }
//try catch構文：tryで行った文章が成功なら実行
//失敗ならcatchを実行

//関数外に放出
return $dbh;
}



//2.データ取得
//引数：なし
//返り値：取得したデータ
function getAllcard(){

    //データ取得の流れ
    $dbh =dbConect();
    //1.SQL文の準備 「*」全て
      $sql ="SELECT * FROM `c_list`";

         echo "<br>",$sql;
        //2.SQL文の実行 $stmt = PDOstatement
     $stmt = $dbh->query($sql);
        //3.SQL分の結果取り出し
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
        $dbh =null;

}

//取得したデータを表示
$cardData = getAllcard();

//3.何かを表示
//引数：数字
//返り値：何かの文字列

function setPower($power){
    if($power === '4000'){
        return '四千';

}


//データ挿入
//変数を用いたSQL文の書き方 https://dezanari.com/php-sql-variable/
function inInfo(){
 $dbh =dbConect();
        $name = 'ペコタン';
      $cost  = '4';
      $lace = 'サイバーロード';
      $type = 'クリーチャー';
      $effect = 'カードを一枚引く';
      $power = '3000';
      $sql ="INSERT INTO `c_list`(`name`, `cost`, `lace`, `type`, `effect`, `power`) VALUES ('".$name."','".$cost."','".$lace."','".$type."','".$effect."','".$power."')";
      echo "<br>",$sql;
        $dbh->query($sql);
        }
inInfo();



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table>
        <tr>
            <th>名前</th>
            <th>コスト</th>
            <th>種族</th>
            <th>種類</th>
            <th>効果</th>
            <th>パワー</th>
        </tr>
        <?php foreach($cardData as $column);?>
        <tr>
            <td><?php echo $column['name']?></td>
            <td><?php echo $column['cost']?></td>
            <td><?php echo $column['lace']?></td>
            <td><?php echo $column['type']?></td>
            <td><?php echo $column['effect']?></td>
            <td><?php echo setPower($column['power'])?></td>
        </tr>
        <?php endforeace: ?>
    </table>

</body>
</html>