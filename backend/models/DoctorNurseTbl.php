<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctor_nurse_tbl".
 *
 * @property integer $d_n_id
 * @property integer $d_id
 * @property integer $n_id
 *
 * @property DoctorTbl $d
 * @property NurseTbl $n
 */
class DoctorNurseTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_nurse_tbl';
    }

    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['d_id', 'n_id'], 'required'],
           // [['d_id', 'n_id'], 'integer'],
            [['d_id', 'n_id'], 'unique', 'targetAttribute' => ['d_id', 'n_id'], 'message' => 'The combination of D ID and N ID has already been taken.'],
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
            'd_n_id' => 'D N ID',
            'd_id' => 'Doctor',
            'n_id' => 'Nurse',
            
        ];
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
