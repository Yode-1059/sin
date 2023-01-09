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

    function breaken($user,$l_name,$ps){
    $dbh = dbConect();
    $sql ="DROP TABLE $user$l_name$ps";
    $dbh->query($sql);
    }

    @$t_name = $_POST['table_name'];
    @$u_name=$_POST['u_name'];
    @$psword=$_POST['pass'];
    breaken($u_name,$t_name,$psword);

    echo '<br>テーブル名　'.$t_name.'は無くなりました';
    echo '<form action="form.php" method="post">
    <input type="submit" value="ホームへ戻る" >
    <input type="hidden" name="t_name" value="' . $t_name . '">
    <input type="hidden" name="pass" value="' . $psword . '">
    <input type="hidden" name="u_name" value="' . $u_name . '">
    </form>';
    include("footer.php");
?>