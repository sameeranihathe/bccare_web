<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nurse_patient".
 *
 * @property integer $n_p_id
 * @property integer $n_id
 * @property integer $p_id
 *
 * @property NurseTbl $n
 * @property PatientTbl $p
 */
class NursePatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nurse_patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['n_id', 'p_id'], 'required'],
           // [['n_id', 'p_id'], 'integer'],
            [['n_id', 'p_id'], 'unique', 'targetAttribute' => ['n_id', 'p_id'], 'message' => 'Already assigned.'],
            [['n_id'], 'exist', 'skipOnError' => true, 'targetClass' => NurseTbl::className(), 'targetAttribute' => ['n_id' => 'n_id']],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'n_p_id' => 'N P ID',
            'n_id' => 'Nurse ID',
            'p_id' => 'Patient ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getN()
    {
        return $this->hasOne(NurseTbl::className(), ['n_id' => 'n_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(PatientTbl::className(), ['p_id' => 'p_id']);
    }
}
