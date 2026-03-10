<h1><?php echo $user->username; ?>の投稿</h1>

<?php foreach($user->posts as $post): ?>

    <p><?php echo $post->title; ?></p>

<?php endforeach; ?>