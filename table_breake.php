<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テーブル破壊</title>
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
    </form>'
?>
</body>
</html>