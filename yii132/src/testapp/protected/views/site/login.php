<h1>Login</h1>

<?php
// フォーム開始
$form=$this->beginWidget('CActiveForm');
?>

<!-- ユーザー名 -->
<?php echo $form->label($model,'username'); ?>
<?php echo $form->textField($model,'username'); ?>

<!-- パスワード -->
<?php echo $form->label($model,'password'); ?>
<?php echo $form->passwordField($model,'password'); ?>

<button type="submit">Login</button>

<?php
// フォーム終了
$this->endWidget();
?>