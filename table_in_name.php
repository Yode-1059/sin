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

    function input($table,$c_,$vol){
    $dbh= dbConect();
    $sql ="SELECT * FROM `c_list` WHERE c_name LIKE '%$c_%'";
        $stmt = $dbh->query($sql);
        echo 'カード名を選択<br><form method="post" action="table_in_name_.php">
        <select name="name">';
        foreach($stmt as $low){
            $c_name = $low['c_name'];
            echo '<option value="'.$c_name.'" name="name">';
            echo $c_name;
            echo '</option>';
        }
        echo '</select><input value="'.$vol.'" name="vol" type="hidden">
            <input value="'.$table.'" name="t_name" type="hidden">
            <input type="submit" value="決定"></form>';
    }

    @$t_name=$_POST['t_name'];
    echo $t_name;
    @$c_name= $_POST['name'];
    @$c_vol =$_POST['vol'];
    input($t_name,$c_name,$c_vol);

?>
