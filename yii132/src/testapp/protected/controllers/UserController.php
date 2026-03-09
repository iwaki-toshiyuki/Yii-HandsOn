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

    // CDbCriteriaクラスを用いて検索条件を作成
    $criteria = new CDbCriteria();

    // GETパラメータのusernameがあるか確認
    if(isset($_GET['username']))
    {
        // usernameで部分一致検索
        $criteria->compare('username', $_GET['username'], true);
    }

    // 検索条件を使ってユーザー取得
    $users = User::model()->findAll($criteria);

    // indexビューを表示
    $this->render('index', array(
        'users'=>$users
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

            // パスワードをbcryptでハッシュ化
            $model->password = password_hash($model->password, PASSWORD_BCRYPT);

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

            // passwordが入力された場合のみ更新
            if(!empty($model->password)){
                $model->password = password_hash($model->password, PASSWORD_BCRYPT);
            }

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