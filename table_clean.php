<?php
include("header.php");
function dbConect(){
    $dsn ='mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1416052-card';
    $user = 'LAA1416052';
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

    function crean($table,$card,$name,$ps){
        $dbh= dbConect();
        $sql ="DELETE FROM `$name$table$ps` WHERE `c_name` ='$card'";

        $dbh->query($sql);
    }

    @$t_name=$_POST['t_name'];
    @$u_name=$_POST['u_name'];
    @$psword=$_POST['pass'];
    echo "テーブル：".$t_name."の<br>";
    $c_name= $_POST['card'];
    echo "カード名：".$c_name."を削除しました<br>";

    crean($t_name,$c_name,$u_name,$psword);

    echo '<form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="'.$t_name.'">
        <input type="hidden" name="pass" value="'.$psword.'">
        <input type="hidden" name="u_name" value="'.$u_name.'">
        <input type="submit" name="リストアップ" id="" value="登録に戻る" class="sub">
        <input type="hidden" name="title" value="カード登録｜">
        </form>';
        include("footer.php");
    ?>