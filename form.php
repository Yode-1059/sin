<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テーブルアドミン</title>
</head>

<body>
    <form action="table_create.php" method="post">
      <h3>テーブル作成</h3>
      <p>ユーザー名(必須)<input type="name" name="u_name" require></p>
      <p>作りたいテーブル名(必須)<input type="text" name="table_name" require><br>
      <p>パスワード(任意)<input type="password" name="pass" require></p>
      <input type="submit" value="送信">
      </p>
    </form>
    <form action="table_breake.php" method="post">
      <h3>テーブル解体</h3>
      <p>ユーザー名(必須)<input type="text" name="u_name" require></p>
      <p>壊したいテーブル名<input type="text" name="table_name" require><br>
      <p>パスワード(あれば)<input type="password" name="pass" require></p>
      <input type="submit" value="送信">
      </p>
    </form>
    <form action="table_in.php" method="post">
      <p>ユーザー名(必須)<input type="text" name="u_name" require></p>
      <p>見たいテーブル<input type="text" name="t_name"><br>
      <p>パスワード(あれば)<input type="password" name="pass" require></p>
      <input type="submit" value="表示">
      </p>
    </form>
</body>
</html>