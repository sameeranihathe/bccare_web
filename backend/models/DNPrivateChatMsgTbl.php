<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "d_n_private_chat_msg_tbl".
 *
 * @property integer $pri_ch_msg_id
 * @property integer $pri_ch_id
 * @property integer $pri_ch_user_id
 * @property string $pri_ch_msg
 * @property string $pri_ch_msg_date_time
 *
 * @property DNPrivateChatTbl $priCh
 */
class DNPrivateChatMsgTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_n_private_chat_msg_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pri_ch_msg_id', 'pri_ch_id', 'pri_ch_user_id', 'pri_ch_msg', 'pri_ch_msg_date_time'], 'required'],
            [['pri_ch_msg_id', 'pri_ch_id', 'pri_ch_user_id'], 'integer'],
            [['pri_ch_msg'], 'string'],
            [['pri_ch_msg_date_time'], 'safe'],
            [['pri_ch_id'], 'exist', 'skipOnError' => true, 'targetClass' => DNPrivateChatTbl::className(), 'targetAttribute' => ['pri_ch_id' => 'pri_ch_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pri_ch_msg_id' => 'Pri Ch Msg ID',
            'pri_ch_id' => 'Chat Room',
            'pri_ch_user_id' => 'User ID',
            'pri_ch_msg' => 'Message',
            'pri_ch_msg_date_time' => 'Date & Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriCh()
    {
        return $this->hasOne(DNPrivateChatTbl::className(), ['pri_ch_id' => 'pri_ch_id']);
    }
}
