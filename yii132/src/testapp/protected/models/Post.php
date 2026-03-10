<?php


class Post extends CActiveRecord
{
    // 使用するテーブル名を指定
    public function tableName()
    {
        return 'post';
    }

    // ActiveRecordモデル取得
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    // リレーションの定義
    public function relations()
    {
        return array(

            // Post → User
            'user'=>array(
                self::BELONGS_TO, // 多対1
                'User',           // モデル
                'user_id'         // 外部キー
            ),

        );
    }
}