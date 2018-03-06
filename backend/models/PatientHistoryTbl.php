<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "patient_history_tbl".
 *
 * @property integer $p_h_id
 * @property integer $p_id
 * @property string $history_date
 * @property string $histoty_title
 * @property string $history_description
 *
 * @property PatientTbl $p
 */
class PatientHistoryTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_history_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['history_date', 'histoty_title', 'history_description'], 'required'],
            [['history_date'], 'safe'],
            [['histoty_title'], 'string', 'max' => 200],
            [['history_description'], 'string', 'max' => 300],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_h_id' => 'P H ID',
            'p_id' => 'Patient',
            'history_date' => 'History Date',
            'histoty_title' => 'Histoty Title',
            'history_description' => 'History Description',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(PatientTbl::className(), ['p_id' => 'p_id']);
    }
}
