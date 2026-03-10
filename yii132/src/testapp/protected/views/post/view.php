<h1><?php echo $post->title; ?></h1>

<p><?php echo $post->content; ?></p>

<p>投稿者ID：<?php echo $post->user_id; ?></p>

<?php if($post->user_id == Yii::app()->user->id): ?>

<a href="index.php?r=post/update&id=<?php echo $post->id; ?>">編集</a>

<a href="index.php?r=post/delete&id=<?php echo $post->id; ?>"
onclick="return confirm('本当に削除しますか？')">
削除
</a>

<?php endif; ?>

<a href="index.php?r=post/index">戻る</a>