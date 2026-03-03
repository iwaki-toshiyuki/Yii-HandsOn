<?php

// DB接続設定ファイル。database.phpに記述することでmain.phpをすっきりさせることができる。
return array(
    'connectionString' => 'mysql:host=db80;dbname=yii132',
    'emulatePrepare' => true,
    'username' => 'yii',
    'password' => 'yii',
    'charset' => 'utf8',
);