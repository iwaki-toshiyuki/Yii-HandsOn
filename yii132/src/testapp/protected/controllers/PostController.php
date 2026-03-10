<?php

class PostController extends Controller
{

    // 投稿一覧
    public function actionIndex()
    {
        // CDbCriteriaクラスを用いて検索条件を作成
        $criteria = new CDbCriteria();

        // GETパラメータのtitleがあるか確認
        if(isset($_GET['title']))
        {
            // titleで部分一致検索 
            $criteria->compare('title', $_GET['title'], true);
        }

        // 全件数取得
        $count = Post::model()->count($criteria);

        // ページネーション作成
        $pages = new CPagination($count);

        // 1ページ表示件数
        $pages->pageSize = 3;

        // limit追加
        $pages->applyLimit($criteria);


        $posts = Post::model()->findAll($criteria);

        $this->render('index', array(
            'posts' => $posts,
            'pages' => $pages
        ));
    }


    // 投稿作成
    public function actionCreate()
    {

        $post = new Post;

        // ログインユーザーIDを自動セット
        $post->user_id = Yii::app()->user->id;

        if(isset($_POST['Post']))
        {
            $post->attributes = $_POST['Post'];

            if($post->save())
            {
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'post' => $post
        ));
    }


    // 投稿詳細
    public function actionView($id)
    {
        $post = Post::model()->findByPk($id);

        $this->render('view', array(
            'post' => $post
        ));
    }


    // 投稿編集
    public function actionUpdate($id)
    {
        $post = Post::model()->findByPk($id);

        if(isset($_POST['Post']))
        {
            $post->attributes = $_POST['Post'];

            if($post->save())
            {
                $this->redirect(array('view','id'=>$post->id));
            }
        }

        $this->render('update', array(
            'post'=>$post
        ));
    }


    // 投稿削除
    public function actionDelete($id)
    {
        // idでレコード取得
        $post = Post::model()->findByPk($id);

        // DB削除
        $post->delete();

        //  一覧へリダイレクト
        $this->redirect(array('index'));
    }

}