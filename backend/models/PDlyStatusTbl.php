<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "p_dly_status_tbl".
 *
 * @property integer $p_dly_stat_id
 * @property integer $p_id
 * @property string $p_dly_stat_date
 * @property string $p_dly_stat_time
 * @property integer $p_dly_stat_value
 *
 * @property PatientTbl $p
 */
class PDlyStatusTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p_dly_status_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id', 'p_dly_stat_date', 'p_dly_stat_time', 'p_dly_stat_value'], 'required'],
            [['p_id', 'p_dly_stat_value'], 'integer'],
            [['p_dly_stat_date', 'p_dly_stat_time'], 'safe'],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_dly_stat_id' => 'ID',
            'p_id' => 'Patient',
            'p_dly_stat_date' => 'Date',
            'p_dly_stat_time' => 'Time',
            'p_dly_stat_value' => 'Value',
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
