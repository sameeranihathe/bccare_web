<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_tbl".
 *
 * @property integer $news_id
 * @property string $news_title
 * @property string $news_description
 * @property string $news_date_time
 */
class NewsTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_title', 'news_description', 'news_date_time'], 'required'],
            [['news_date_time'], 'safe'],
            [['news_title'], 'string', 'max' => 100],
            [['news_description'], 'string', 'max' => 500],
            [['news_title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'news_title' => 'Title',
            'news_description' => 'Description',
            'news_date_time' => ' Date & Time',
        ];
    }
}
