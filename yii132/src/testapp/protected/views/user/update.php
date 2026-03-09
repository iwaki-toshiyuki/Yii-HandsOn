<h1>User更新</h1>

<form method="post">

名前
<input type="text" name="User[username]" value="<?php echo $model->username; ?>">

メール
<input type="text" name="User[email]" value="<?php echo $model->email; ?>">

パスワード

<input type="password" name="User[password]">


<button type="submit">更新</button>

<button type="button" onclick="location.href='index.php?r=user/index'">
戻る
</button>

</form>