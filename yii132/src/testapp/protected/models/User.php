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

            // name と email は必須入力
            array('username, email', 'required'),

            // email はメール形式である必要がある
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