<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "patient_daily_status_tbl".
 *
 * @property integer $p_daily_status_id
 * @property integer $p_id
 * @property string $stat_date_time
 * @property integer $stat_vaule
 *
 * @property PatientTbl $p
 */
class PatientDailyStatusTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_daily_status_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id', 'stat_date_time', 'stat_vaule'], 'required'],
            [['stat_vaule'], 'integer'],
            [['p_id','stat_date_time'], 'safe'],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_daily_status_id' => 'P Daily Status ID',
            'p_id' => 'Patient',
            'stat_date_time' => 'Date & Time',
            'stat_vaule' => 'Status',
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
