<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "public_chat_tbl".
 *
 * @property integer $pub_ch_id
 * @property string $pub_ch_title
 * @property string $pub_ch_desc
 * @property string $pub_ch_date_time
 * @property integer $pub_ch_user_id
 * @property string $pub_ch_active_sta
 *
 * @property PublicChatMsgTbl[] $publicChatMsgTbls
 */
class PublicChatTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'public_chat_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_ch_title', 'pub_ch_desc', 'pub_ch_date_time', 'pub_ch_active_sta'], 'required'],
            [['pub_ch_date_time'], 'safe'],
            [['pub_ch_title'], 'string', 'max' => 100],
            [['pub_ch_desc'], 'string', 'max' => 200],
            [['pub_ch_active_sta'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pub_ch_id' => 'Public Chat ID',
            'pub_ch_title' => 'Title',
            'pub_ch_desc' => ' Description',
            'pub_ch_date_time' => ' Date & Time',
            'pub_ch_user_id' => 'User ID',
            'pub_ch_active_sta' => 'Active Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicChatMsgTbls()
    {
        return $this->hasMany(PublicChatMsgTbl::className(), ['pub_ch_id' => 'pub_ch_id']);
    }
}
