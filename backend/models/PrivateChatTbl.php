<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "private_chat_tbl".
 *
 * @property integer $pri_ch_id
 * @property string $pri_ch_room_name
 * @property integer $p_id
 * @property integer $n_id
 *
 * @property PrivateChatMsgTbl[] $privateChatMsgTbls
 * @property PatientTbl $p
 * @property NurseTbl $n
 */
class PrivateChatTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'private_chat_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pri_ch_room_name', 'p_id', 'n_id'], 'required'],
            [['p_id', 'n_id'], 'integer'],
            [['pri_ch_room_name'], 'string', 'max' => 30],
            [['p_id', 'n_id'], 'unique', 'targetAttribute' => ['p_id', 'n_id'], 'message' => 'The combination of P ID and N ID has already been taken.'],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
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
            'p_id' => 'Patient',
            'n_id' => 'Nurse',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateChatMsgTbls()
    {
        return $this->hasMany(PrivateChatMsgTbl::className(), ['pri_ch_id' => 'pri_ch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(PatientTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getN()
    {
        return $this->hasOne(NurseTbl::className(), ['n_id' => 'n_id']);
    }
}
