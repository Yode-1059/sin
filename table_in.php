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

    function input($table,$c_id,$vol){
    $dbh= dbConect();
    $sql ="SELECT * FROM `c_list` WHERE pack='($c_id)'";
    echo $sql;
        $stmt = $dbh->query($sql);
        foreach($stmt as $low){
            $c_name = $low['name'];
            $c_no = $low['pack'];
            $sql = "INSERT INTO `$table`(`c_name`, `vol`, `pack`) VALUES ('$c_name',$vol,'$c_no')";
            echo "<br>",$sql;
            $stmt = $dbh->query($sql);
        }
    }

    @$t_name=$_POST['t_name'];
    echo $t_name;
    @$c_id= $_POST['id'];
    @$c_vol =$_POST['vol'];
    input($t_name,$c_id,$c_vol,$t_name);

?>

    <form action="table_in.php" method="post">
        <p>カード番号入力<input type="text" name="id"><br>
        <br>枚数<input type="number" name="vol">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
