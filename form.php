<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テーブルアドミン</title>
</head>

<body>
    <form action="table_create.php" method="post">
      <p>作りたいテーブル名<input type="text" name="table_name"><br>
      <input type="submit" value="送信">
      </p>
    </form>
    <form action="table_breake.php" method="post">
      <p>壊したいテーブル名<input type="text" name="table_name"><br>
      <input type="submit" value="送信">
      </p>
    </form>
    <form action="table_in.php" method="post">
      <p>見たいテーブル<input type="text" name="t_name"><br>
      <input type="submit" value="表示">
      </p>
    </form>
</body>
</html>