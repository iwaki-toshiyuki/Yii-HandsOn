<?php

// Userモデル
// CActiveRecord を継承することで
// DBテーブルとオブジェクトを対応させる（ActiveRecord）
class User extends CActiveRecord
{

    // 対応するDBテーブル名を指定
    // このモデルは user テーブルを操作する
    public function tableName()
    {
        return 'user';
    }

    // バリデーションルール
    // save() 実行時にこのルールがチェックされる
    public function rules()
    {
        return array(

            // username, email, password 必須
            // messageオプションでエラーメッセージを指定
            array('username, email, password', 'required',
            'message'=>'{attribute}は必須です'),

            // username文字数
        array(
            'username',
            'length',
            'max'=>50,
            'tooLong'=>'{attribute}は50文字以内で入力してください'
        ),

        // password文字数
        array(
            'password',
            'length',
            'max'=>255,
            // tooLong: 文字数オーバーのエラーメッセージ
            'tooLong'=>'{attribute}は255文字以内で入力してください'
        ),

        // email形式
        array(
            'email',
            'email',
            'message'=>'{attribute}の形式が正しくありません'
        ),
        );
    }

        public function attributeLabels()
    {
        return array(
            'username'=>'名前',
            'email'=>'メール',
            'password'=>'パスワード',
        );
    }

    // ActiveRecordの静的インスタンス取得
    // User::model() で呼び出すためのメソッド
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    // リレーション定義
    public function relations()
{
    return array(

        // User 1 → Post 多
        'posts'=>array(
            self::HAS_MANY, // 1対多
            'Post',         // モデル名
            'user_id'       // 外部キー
        ),

    );
}

}