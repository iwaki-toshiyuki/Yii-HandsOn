<h1>User作成</h1>

<!-- POST送信フォーム -->
<form method="post">

名前

<!--
name属性の書き方が重要
User[name] → $_POST['User']['username'] として取得できる
-->
<input type="text" name="User[username]">

メール

<!-- email入力 -->
<input type="text" name="User[email]">

<!-- 送信ボタン -->
<button type="submit">保存</button>


<button type="button" onclick="location.href='index.php?r=user/index'">
戻る
</button>

</form>