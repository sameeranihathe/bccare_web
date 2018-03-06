<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "public_chat_msg_tbl".
 *
 * @property integer $pub_ch_msg_id
 * @property integer $pub_ch_id
 * @property string $pub_ch_msg
 * @property integer $pub_ch_msg_user_id
 * @property string $pub_ch_msg_date_time
 * @property string $pub_ch_msg_active_sta
 *
 * @property PublicChatTbl $pubCh
 */
class PublicChatMsgTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'public_chat_msg_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_ch_id', 'pri_ch_msg', 'pri_ch_user_id', 'pub_ch_msg_date_time', 'pub_ch_msg_active_sta'], 'required'],
            [['pub_ch_id', 'pri_ch_user_id'], 'integer'],
            [['pri_ch_msg'], 'string'],
            [['pub_ch_msg_date_time'], 'safe'],
            [['pub_ch_msg_active_sta'], 'string', 'max' => 1],
            [['pub_ch_id'], 'exist', 'skipOnError' => true, 'targetClass' => PublicChatTbl::className(), 'targetAttribute' => ['pub_ch_id' => 'pub_ch_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pub_ch_msg_id' => 'Pub Ch Msg ID',
            'pub_ch_id' => 'Pub Ch ID',
            'pri_ch_msg' => 'Pub Ch Msg',
            'pri_ch_user_id' => 'Pub Ch Msg User ID',
            'pub_ch_msg_date_time' => 'Pub Ch Msg Date Time',
            'pub_ch_msg_active_sta' => 'Pub Ch Msg Active Sta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubCh()
    {
        return $this->hasOne(PublicChatTbl::className(), ['pub_ch_id' => 'pub_ch_id']);
    }
}
