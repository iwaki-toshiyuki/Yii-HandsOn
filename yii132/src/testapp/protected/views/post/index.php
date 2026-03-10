<h1>投稿一覧</h1>

<!-- 検索フォーム -->
<form method="get">

<!-- rパラメータはコントローラー/アクションを指定するためのもの -->
<input type="hidden" name="r" value="post/index">

タイトル
<input type="text" name="title">

<button type="submit">検索</button>

</form>

<br>

<a href="index.php?r=post/create">投稿作成</a>

<br>

<?php foreach($posts as $post): ?>

<p>

<?php echo $post->title; ?>

<a href="index.php?r=post/view&id=<?php echo $post->id; ?>">詳細</a>

<?php if($post->user_id == Yii::app()->user->id): ?>

    <a href="index.php?r=post/delete&id=<?php echo $post->id; ?>"
    onclick="return confirm('本当に削除しますか？')">
    削除
    </a>

<?php endif; ?>

</p>

<?php endforeach; ?>

<!-- ページネーション表示 -->
<?php
$this->widget('CLinkPager', array(
    'pages' => $pages,
));
?>