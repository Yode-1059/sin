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

    function input($user,$table,$ps,$c_id,$vol,$loca,$pri,$me){
    $dbh= dbConect();
    $sql ="SELECT * FROM `c_list` WHERE c_name='$c_id'";
        $stmt = $dbh->query($sql);
        foreach($stmt as $low){
            $c_ame = $low['c_name'];
            $c_no = $low['pack'];
            $sql = "INSERT INTO $user$table$ps(`c_name`, `vol`, `pack`,`loca`,`price`,`memo`) VALUES ('$c_ame',$vol,'$c_no','$loca','$pri','$me')";
            $stmt = $dbh->query($sql);
        }
        echo $sql;
        echo $c_id;
        echo 'を登録したよ';
    }

    @$t_name=$_POST['t_name'];
    @$cd_name= $_POST['c_name'];
    @$c_vol =$_POST['vol'];
    @$c_loca = $_POST['loca'];
    @$u_name=$_POST['u_name'];
    @$psword=$_POST['pass'];
    @$price=$_POST['price'];
    @$memo=$_POST['memo'];
    echo $psword;

    input($u_name,$t_name,$psword,$cd_name,$c_vol,$c_loca,$price,$memo);
?>

    <form action="table_in.php" method="post">
        <p>カード番号入力<input type="text" name="id"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        金額（あれば）<input type="number" name="price" value="0"><br>
        メモ（あれば）<input type="text" name="memo">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">
            <input type="hidden" name="pass" value="'.$psword.'">
            <input type="hidden" name="u_name" value="'.$u_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
        <form action="table_in_name.php" method="post">
        <p>カード名入力　部分一致可能<input type="text" name="c_name"><br>
        枚数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        金額（あれば）<input type="number" name="price" value="0"><br>
        メモ（あれば）<input type="text" name="memo">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'">
            <input type="hidden" name="pass" value="'.$psword.'">
            <input type="hidden" name="u_name" value="'.$u_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    </form>
    <form action="table_in_not.php" method="post">
        <p>カード以外のものを登録<input type="text" name="c_name"><br>
        個数<input type="number" name="vol"><br>
        場所<input type="text" name="loca"><br>
        金額（あれば）<input type="number" name="price" value="0"><br>
        メモ（あれば）<input type="text" name="memo">
        <?php
            echo '<input type="hidden" name="t_name" value="'.$t_name.'"><input type="hidden" name="pass" value="'.$psword.'"><input type="hidden" name="u_name" value="'.$u_name.'">'?>
        <input type="submit" name="送信" id=""></p>
    <form action="table_listup.php" method="post">
        <?php
        echo'<input type="hidden" name="t_name" value="'.$t_name.'">
        <input type="hidden" name="pass" value="'.$psword.'">
        <input type="hidden" name="u_name" value="'.$u_name.'">'
        ?>
        <br><input type="submit" name="リストアップ" id="" value="リストアップ"></p>
    </form>
