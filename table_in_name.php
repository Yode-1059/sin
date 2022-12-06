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

    function input($table,$c_id,$vol,$loca,$name,$ps,$pri,$me){
    $dbh= dbConect();
    $sql ="SELECT * FROM `c_list` WHERE c_name LIKE '%$c_id%'";
        $stmt = $dbh->query($sql);
        echo 'カード名を選択<br><form method="post" action="table_in_name_.php">
        <select name="c_name">';
        foreach($stmt as $low){
            $c_name = $low['c_name'];
            echo '<option value="'.$c_name.'" name="c_name">';
            echo $c_name;
            echo '</option>';
        }
        echo '</select><input value="'.$vol.'" name="vol" type="hidden">
            <input value="'.$table.'" name="t_name" type="hidden">
            <input value="'.$loca.'" name="loca" type="hidden">
            <input type="submit" value="決定">
            <input type="text" name="pass" value="'.$ps.'"><input type="text" name="u_name" value="'.$name.'">
            <input type="hidden" name="memo" value="'.$me.'"><input type="hidden" name="pricr" value="'.$pri.'">
            </form>';
    }

    @$t_name=$_POST['t_name'];
    @$c_name= $_POST['name'];
    echo $c_name;
    @$c_vol =$_POST['vol'];
    @$c_loca=$_POST['loca'];
    @$u_name=$_POST['u_name'];
    @$psword=$_POST['pass'];
    @$price=$_POST['price'];
    @$memo=$_POST['memo'];
    input($t_name,$c_name,$c_vol,$c_loca,$psword,$u_name,$price,$memo);

?>
