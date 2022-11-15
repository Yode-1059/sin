<title>hi</title>
<link rel="stylesheet" href="./style.css">
<?php
    // 変数宣言
    $num1=1;
    $num02=1.33;
    echo gettype($num1)."<br>";
    echo gettype($num02)."<br>";

    //文字列

    $str_a = "Helllo";
    echo $str_a."<br>";
    echo gettype($str_a)."<br>";

    //比較

    $bool01 = ($num02>$num1);
    echo $bool01;
    echo gettype($bool01)."<br>";

    //二次元配列

    $a =[["gogogo","gagaga"],["bad","basterd"]];

    echo ($a[0][0])."<br>";
    echo ($a[1][0])."<br>";
    echo ($a[0][1])."<br>";
    echo ($a[1][1])."<br>";

    //加減乗除余
    $x = 10;
    $y = 2;

    echo($x + $y)."<br>";
    echo($x * $y)."<br>";
    echo($x - $y)."<br>";
    echo($x / $y)."<br>";
    echo($x % $y)."<br>";

    //比較演算子
     echo($x > $y)."<br>";
     echo($x < $y)."<br>";

     $z=10;
    echo($x >= $z)."<br>";
    echo($x <= $z)."<br>";


?>
<p>論理演算子</p>
<?php
    //論理演算子
    $x = 8;
    $y = 3;
    echo"and<br>";
    echo($x >= 5 && $x <=10)."<br>";
    echo($y >= 5 && $x <=10)."<br>";// 空

    echo"or<br>";

    echo($x == 3 || $y == 3)."<br>";
    echo($x == 1 || $y == 1)."<br>";//空

    echo"複合代入演算子<br>";

    $y = 12;
    $z = 20;

    echo($x += 10)."<br>";// 18
    echo($z += $y)."<br>";// 32

    echo"インクリメント・デクリメント<br>";

    $x = 3;
    $y = 5;

    $x++;
    $y--;

    echo($x)."<br>";
    echo($y)."<br>";
    ?>
    <p>条件分岐<br></p>
    <?php

    $age=23;

    echo("これは[$age]歳<br>");

    if( $age>=10 && $age<20 ) {
        echo("10代<br>");
    }else if( $age >=20 && $age<30 ) {
        echo("20代<br>");
    }else if( $age >=30 && $age <40){
        echo"30代<br>";
    }else{
        echo"それ以外";
    }
?>
_______
<p>繰り返し<br></p>
<?php

    for( $i=0 ; $i <= 4;$i++){
        echo"の";
        if($i==3){
            echo "ff";
            continue;
        }
        echo $i;
    }
    echo "<br>";
    for( $i=0 ; $i <= 3;$i++){
        echo "<br>".$i;
        for( $j=0 ; $j <=2 ;$j++){
            echo $j;
        }
    }
    echo"<br>配列表示<br>";
    $sum =0;
    $arr =[4,3,65,9023,435];
    for($i = 0; $i <=4; $i++){
        echo $arr[$i]."<br>";
        $sum +=$arr[$i];
    }
    echo $sum;
    echo"<br>二次元配列<br>";
    $boc = [[30,5300,23],[4,12,983]];

    for($i = 0; $i <=1 ;$i++){
        for($k = 0; $k <=2 ;$k++){
            echo $boc[$i][$k],"　";
        }
        echo"改行<br>";
    }

    for($i =1; $i <=10; $i++){
        if($i==3){
            echo"<br>飛ぶぞ<br>";
            continue;
        }else if($i==7){
            break;
        }else{
            echo $i;
        }
    }
    ?>
    <p><br>関数</p>
    <?php
    function hello(){
        echo "hello<br>";
    }
    hello();

    $hello = function(){
        echo "Hi";
    };
    //変数に入れるときは最後にセミロンを入れる

    $hello();
    $hello();

    //引数

    function cal($x){
        echo ($x*6)."<br>";
    }

    cal(8);

    function call($t,$d){
        echo($t/$d)."<br>";
    }

    call(10,4);

    //戻り値
    function col($q,$w){
        return $q / $w;
    };
    $res = col(20,5);
    echo $res."<br>";

    //3つの引数

    function ave($e,$r,$t){
        return ($e+$r+$t)/3;
    }

    $ave = ave(9,4,2);
    echo $ave."<br>";
?>
<p>クラス・メソッド・プロパティ</p>
    <?php
        class Study//クラスの先頭は大文字であることがPHPの慣習
                    {
                        //メソッド
            function avg(){
                echo((40+24)/2)."<br>";
            }
        }
        $a007 =new Study();//インスタンス化
        $a007 ->avg();

        class Duel{
                        //引数つき
            function pow($hi,$mizu){
                echo(($hi+$mizu)/2)."<br>";
            }
        }
        $bolts =new Duel();//インスタンス化
        $bolts ->pow(3000,4300);

        class Breach{

        public $name;//プロパティに値を代入
                function break($dom,$digi){
                    echo(($dom+$digi) / 2)."<br>";
                }
        }

        $a200 =new Breach();
        $a200->break(4,5000);
        $a200->name = "minagawa";//パブリックなプロパティへ代入
        echo $a200->name."<br>";
        echo $a200->se."<br>";//定義されていないプロパティはなにも表示されない エラー
        ?>
    <p>コンストラクター</p>
    <?php
        class So{
            public $name;

            public function __construct(){
                $this->name ="kiri";//$thsによりインスタンスが代入
            }

            function avg($go,$re){
                echo(($go+$re) / 2)."<br>";
            }
        }

        $a200 = new So();
        $a200->name ="saito";
        $a200->avg(90,70);
        echo $a200->name."<br>" ;

        $a300 = new So();
        echo $a300->name."<br>";//kiri が出力される


        //@マークを使うとエラーが出力されなくなる