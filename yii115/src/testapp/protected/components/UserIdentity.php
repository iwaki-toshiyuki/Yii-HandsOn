<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;


	public function authenticate()
{

    // userテーブルから、入力されたusernameと一致するユーザーを検索
    // User::model() は ActiveRecord（ORM）で、SQLを直接書かずにDB検索できる
    $user = User::model()->findByAttributes([
        'username' => $this->username
    ]);

    // ユーザーが存在しない場合
    if ($user === null) {
        // usernameが間違っているエラーを設定
        $this->errorCode = self::ERROR_USERNAME_INVALID;

    // ユーザーは存在するが、passwordが一致しない場合
    } elseif ($user->password !== $this->password) {
        // passwordが間違っているエラーを設定
        $this->errorCode = self::ERROR_PASSWORD_INVALID;

    } else {
        // 認証成功

        // ログインユーザーIDを保存
        $this->_id = $user->id;

        // usernameを保持
        $this->username = $user->username;

        // エラーなし（ログイン成功）
        $this->errorCode = self::ERROR_NONE;
    }

    // エラーがない場合 true を返す
    // Yiiは true が返るとログイン成功として処理を進める
    return !$this->errorCode;
}
}