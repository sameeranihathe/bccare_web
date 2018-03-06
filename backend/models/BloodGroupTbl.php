<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bloodgroup_tbl".
 *
 * @property integer $bg_id
 * @property string $bg
 *
 * @property PatientTbl[] $patientTbls
 */
class BloodgroupTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bloodgroup_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bg'], 'required'],
            [['bg'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bg_id' => 'Blood Group ID',
            'bg' => 'Blood Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['p_bg_id' => 'bg_id']);
    }
}
