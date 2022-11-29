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

    function input($table,$c_id,$vol,$loca){
    $dbh= dbConect();
    $sql ="SELECT * FROM `c_list` WHERE pack='($c_id)'";
        $stmt = $dbh->query($sql);
        foreach($stmt as $low){
            $c_name = $low['c_name'];
            $c_no = $low['pack'];
            $sql = "INSERT INTO `$table`(`c_name`, `vol`, `pack`,`loca`) VALUES ('$c_name',$vol,'$c_no','$loca')";
            $stmt = $dbh->query($sql);
        }
        echo $sql;
    }
    @$t_name=$_POST['t_name'];
    @$c_id= $_POST['id'];
    @$c_vol =$_POST['vol'];
    @$c_loca = $_POST['loca'];
    input($t_name,$c_id,$c_vol,$c_loca);

?>

    <form action="table_in.php" method="post">
        <p>カード番号入力<input type="text" name="id"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
        <form action="table_in_name.php" method="post">
        <p>カード名入力　部分一致可能<input type="text" name="name"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
    <form action="table_listup.php" method="post">
        <?php
        echo'<input type="hidden" name="t_name" value="'.$t_name.'">'
        ?>
        <br><input type="submit" name="リストアップ" id="" value="リストアップ"></p>
    </form>
