<?php include("header.php"); ?>
<h3>ようこそ　カード管理アプリ</h3>
<h4>ログイン</h4>
<form action="form.php" method="post">
    <p>ユーザー名*<input type="text" name="u_name" required></p>
    <p>パスワード*<input type="password" name="pass" required></p>
    <input type="hidden" name="state" value="already">
    <p><input type="submit" value="ログイン"></p>
</form>
<h4>ユーザー作成</h4>
<form action="form.php" method="post">
    <p>ユーザー名*<input type="text" name="u_name" required></p>
    <p>パスワード*<input type="password" name="pass" required></p>
    <input type="hidden" name="state" value="not">
    <p><input type="submit" value="作成"></p>
</form>

<?php include("footer.php"); ?>