<?php

// Userコントローラー
// Controller を継承することで
// HTTPリクエストを処理できる
class UserController extends Controller
{

    // 一覧ページ
    // URL: index.php?r=user/index
    public function actionIndex()
    {
        // userテーブルの全レコードを取得
        $users = User::model()->findAll();

        // indexビューにデータを渡す
        $this->render('index', array(
            'users' => $users
        ));
    }


    // 新規作成ページ
    public function actionCreate()
    {
        // Userモデルのインスタンス作成
        $model = new User;

        // POST送信されたかチェック
        if(isset($_POST['User']))
        {
            // フォームデータをモデルに代入
            $model->attributes = $_POST['User'];

            // DB保存（バリデーションも実行される）
            if($model->save())
            {
                // 保存成功 → 一覧ページへリダイレクト
                $this->redirect(array('index'));
            }
        }

        // createビューを表示
        $this->render('create', array(
            'model'=>$model
        ));
    }

    // 更新処理
    public function actionUpdate($id)
    {

        // 主キー(id)でレコード取得
        $model = User::model()->findByPk($id);

        // POST送信チェック
        if(isset($_POST['User']))
        {

            // フォーム値をモデルに代入
            $model->attributes = $_POST['User'];

            // DB更新
            if($model->save())
            {
                // 更新成功 → 一覧へ
                $this->redirect(array('index'));
            }

        }

        // updateビュー表示
        $this->render('update',array(
            'model'=>$model
        ));

    }

    // 削除処理
    public function actionDelete($id)
    {

        // idでレコード取得
        $model = User::model()->findByPk($id);

        // DB削除
        $model->delete();

        // 一覧へ戻る
        $this->redirect(array('index'));

    }

}