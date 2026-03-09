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
            array('username, email, password', 'required'),

            // 文字数制限
            array('username', 'length', 'max'=>50),

            // password長さ
            array('password', 'length', 'max'=>255),

            // email形式
            array('email', 'email'),
        );
    }

    // ActiveRecordの静的インスタンス取得
    // User::model() で呼び出すためのメソッド
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

}