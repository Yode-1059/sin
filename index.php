<?php include("header.php"); ?>

<h3>ようこそ　カード管理アプリへ</h3>
<h4>ログイン</h4>
<form action="form.php" method="post">
    <p>ユーザー名*<input type="text" name="u_name" required></p>
    <p>パスワード*<input type="password" name="pass" required></p>
    <input type="hidden" name="state" value="already">
    <p><input type="submit" value="ログイン" class="sub"></p>
</form>
<h4>ユーザー作成</h4>
<form action="form.php" method="post">
    <p>ユーザー名*<input type="text" name="u_name" required></p>
    <p>パスワード*<input type="password" name="pass" required></p>
    <input type="hidden" name="state" value="not">
    <p><input type="submit" value="作成" class="sub"></p>
</form>
<div id="howto">
    <div id="howtxt">
        <h3 class="mb-2">この画面について</h3>
        <p>ログイン・ユーザー作成画面です<br>
            ユーザー名とパスワードの入力をしてログインしてくだい<br>
            新規ユーザーはユーザー名とパスワードを登録してください<br>
            パスワードを忘れてしまった場合は使い方に記載されているメアドまでお願いします<br>
        </p>
    </div>
</div>
<?php include("footer.php"); ?>