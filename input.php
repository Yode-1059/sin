<div class="d-flex justify-content-between flex-wrap">
    <form action="table_in.php" method="post" class="form">
        <h3>カード番号で登録</h3>
        <p>カード番号入力<br>
            <input type="text" name="id" required>
        </p>
        <p>枚数<br>
            <input type="number" name="vol" required>
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" id="" class="sub">
        </p>
    </form>
    <form action="table_in_name.php" method="post" class="form">
        <h3>カード名で登録</h3>
        <p>カード名入力　部分一致可能<br>
            <input type="text" name="c_name" required>
        </p>
        <p>枚数<br>
            <input type="number" name="vol" required>
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" id="" class="sub">
        </p>
    </form>
    <form action="table_in_not.php" method="post" class="form">
        <h3>カード以外のものを登録</h3>
        <p>名称<br>
            <input type="text" name="c_name" required>
        </p>
        <P>個数<br>
            <input type="number" name="vol" required>
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" id="" class="sub">
        </p>
    </form>
    <div class="form">
        <form action="table_listup.php" method="post">
            <?php
    echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '"><h5>現在のテーブル</h5><p>' . $t_name . '</p> '
        ?>
            <br><input type="submit" name="リストアップ" id="" value="リストアップ" class="sub"></p>
        </form>
        <form action="form.php" method="post">
            <input type="submit" value="ホームへ戻る" class="sub">
            <?php echo '<input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">'?>
        </form>
    </div>
</div>