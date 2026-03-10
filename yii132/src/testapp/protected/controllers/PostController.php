<?php

// Postコントローラー
class PostController extends Controller
{
    public function actionCreate()
    {
        // Postモデルのインスタンス作成
        $post = new Post;

        // 投稿ユーザー
        $post->user_id = 2;

        // 投稿タイトル
        $post->title = "Yii勉強";

        // 投稿内容
        $post->content = "relationテスト";

        // 作成日時
        $post->created_at = date('Y-m-d H:i:s');

        // 保存
        if($post->save())
        {
            echo "投稿作成成功";
        }
    }
}
