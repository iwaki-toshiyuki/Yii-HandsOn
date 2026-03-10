<?php

// Yiiのログイン認証クラス
class UserIdentity extends CUserIdentity
{
    private $_id; // ユーザーID保存用

    // 認証処理
    public function authenticate()
    {
        // usernameでユーザー検索
        $user = User::model()->findByAttributes(array(
            'username'=>$this->username
        ));

        // ユーザーが存在しない
        if($user===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }

        // パスワード検証（ハッシュ照合）
    	elseif(!password_verify($this->password, $user->password)){
			// 入力パスワードとDBハッシュを比較
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
    	}

        // 認証成功
        else{
            $this->_id=$user->id;               // ユーザーID保存
            $this->setState('id', $user->id);  // セッションにも保存

            $this->errorCode=self::ERROR_NONE;
        }

        // エラーがなければtrue
        return !$this->errorCode;
    }

    // ログインユーザーID取得
    public function getId()
    {
        return $this->_id;
    }
}