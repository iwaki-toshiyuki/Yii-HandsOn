<h1>ユーザー一覧</h1>

<!-- 検索フォーム -->
<form method="get" action="index.php">

<!-- rパラメータはコントローラー/アクションを指定するためのもの -->
<input type="hidden" name="r" value="user/index">

ユーザー名
<input type="text" name="username">

<button type="submit">検索</button>

</form>

<!-- ユーザー作成ページへのリンク -->
<a href="<?php echo Yii::app()->createUrl('user/create'); ?>">
ユーザー新規作成
</a>

<table border="1">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</tr>

<?php foreach($users as $user): ?>
<!-- Controllerから渡された $users をループ -->

<tr>

<!-- id表示 -->
<td><?php echo $user->id; ?></td>

<!-- name表示 -->
<td><?php echo $user->username; ?></td>

<!-- email表示 -->
<td><?php echo $user->email; ?></td>

<td>

<!-- 空白スペース -->
&nbsp;&nbsp;

<!--
ユーザー更新ページへのリンク
createUrl() を使って user/update のURLを生成し
対象ユーザーのIDを GETパラメータとして渡す
-->
<a href="<?php echo Yii::app()->createUrl('user/update', array('id'=>$user->id)); ?>">
ユーザー更新
</a>

<!-- 空白スペース -->
&nbsp;&nbsp;

<!--
ユーザー削除リンク
deleteアクションにユーザーIDを渡す
onclickのconfirm()で削除確認ダイアログを表示
-->
<a href="<?php echo Yii::app()->createUrl('user/delete', array('id'=>$user->id)); ?>"
onclick="return confirm('削除しますか？');">
ユーザー削除
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<!-- ページネーション表示 -->
<?php
$this->widget('CLinkPager', array(
    'pages' => $pages,
));
?>