<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schdule_tbl".
 *
 * @property integer $sch_id
 * @property integer $p_id
 * @property string $sch_title
 * @property string $sch_description
 * @property string $sch_plan_date
 * @property string $sch_completed_date
 * @property string $sch_status
 *
 * @property PatientTbl $p
 */
class SchduleTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schdule_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sch_title', 'sch_description', 'sch_plan_date',  'sch_status'], 'required'],
           // [['p_id'], 'integer'],
            [['sch_plan_date', 'sch_completed_date'], 'safe'],
            [['sch_title'], 'string', 'max' => 100],
            [['sch_description'], 'string', 'max' => 200],
            [['sch_status'], 'string', 'max' => 1],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sch_id' => 'Sch ID',
            'p_id' => 'Patient',
            'sch_title' => 'Title',
            'sch_description' => 'Description',
            'sch_plan_date' => 'Planned Date',
            'sch_completed_date' => 'Completed Date',
            'sch_status' => 'Schdule Status',
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
