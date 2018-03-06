<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctor_patient_tbl".
 *
 * @property integer $d_p_id
 * @property integer $d_id
 * @property integer $p_id
 *
 * @property DoctorTbl $d
 * @property PatientTbl $p
 */
class DoctorPatientTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_patient_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['d_id', 'p_id'], 'required'],
           // [['d_id', 'p_id'], 'integer'],
             [['d_id', 'p_id'], 'unique', 'targetAttribute' => ['d_id', 'p_id'], 'message' => 'The combination of D ID and N ID has already been taken.'],
            [['d_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorTbl::className(), 'targetAttribute' => ['d_id' => 'd_id']],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'd_p_id' => 'D P ID',
            'd_id' => 'Doctor',
            'p_id' => 'Patient',
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
    public function getP()
    {
        return $this->hasOne(PatientTbl::className(), ['p_id' => 'p_id']);
    }
}
