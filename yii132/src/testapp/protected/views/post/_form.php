<form method="post">

タイトル
<br>
<input type="text" name="Post[title]" value="<?php echo $post->title; ?>">

<br><br>

内容
<br>
<textarea name="Post[content]"><?php echo $post->content; ?></textarea>

<br><br>

<button type="submit">保存</button>

<button type="button" onclick="location.href='index.php?r=post/index'">
戻る
</button>

</form>