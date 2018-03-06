<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "district_tbl".
 *
 * @property integer $dis_id
 * @property string $district
 *
 * @property PatientTbl[] $patientTbls
 * @property PublicUserTbl[] $publicUserTbls
 */
class DistrictTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district'], 'required'],
            [['district'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dis_id' => 'District ID',
            'district' => 'District',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['p_dis_id' => 'dis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicUserTbls()
    {
        return $this->hasMany(PublicUserTbl::className(), ['pub_dis_id' => 'dis_id']);
    }
}
