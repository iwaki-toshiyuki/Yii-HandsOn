<?php

// ログインフォーム用モデル
class LoginForm extends CFormModel
{
    public $username; // ユーザー名
    public $password; // パスワード

    // バリデーションルール
    public function rules()
    {
        return array(
            array('username,password','required'), // 必須入力

        	array('password', 'authenticate'),// 認証チェック
        );
    }

    // ログイン処理
    public function login()
    {
        // UserIdentity生成
        $identity=new UserIdentity($this->username,$this->password);

        // 認証実行
        if($identity->authenticate()){

            // セッションへログインユーザー情報保存
            Yii::app()->user->login($identity);

            return true;
        }

        return false;
    }

	// 認証チェック
	public function authenticate($attribute,$params)
{
    $identity = new UserIdentity($this->username,$this->password);

    if(!$identity->authenticate())
    {
        $this->addError('password','ユーザー名またはパスワードが違います');
    }
}
}