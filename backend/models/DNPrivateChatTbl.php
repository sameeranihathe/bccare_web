<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "d_n_private_chat_tbl".
 *
 * @property integer $pri_ch_id
 * @property string $pri_ch_room_name
 * @property integer $d_id
 * @property integer $n_id
 *
 * @property DNPrivateChatMsgTbl[] $dNPrivateChatMsgTbls
 * @property DoctorTbl $d
 * @property NurseTbl $n
 */
class DNPrivateChatTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_n_private_chat_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pri_ch_room_name', 'd_id', 'n_id'], 'required'],
            [['d_id', 'n_id'], 'integer'],
            [['pri_ch_room_name'], 'string', 'max' => 30],
            [['d_id', 'n_id'], 'unique', 'targetAttribute' => ['d_id', 'n_id'], 'message' => 'The combination of P ID and N ID has already been taken.'],
            [['d_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorTbl::className(), 'targetAttribute' => ['d_id' => 'd_id']],
            [['n_id'], 'exist', 'skipOnError' => true, 'targetClass' => NurseTbl::className(), 'targetAttribute' => ['n_id' => 'n_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pri_ch_id' => 'Pri Ch ID',
            'pri_ch_room_name' => 'Chat Room',
            'd_id' => 'Doctor',
            'n_id' => 'Nurse',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDNPrivateChatMsgTbls()
    {
        return $this->hasMany(DNPrivateChatMsgTbl::className(), ['pri_ch_id' => 'pri_ch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getD()
    {
        return $this->hasOne(DoctorTbl::className(), ['d_id' => 'd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getN()
    {
        return $this->hasOne(NurseTbl::className(), ['n_id' => 'n_id']);
    }
}
