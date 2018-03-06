<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gendar_tbl".
 *
 * @property integer $gen_id
 * @property string $gendar
 *
 * @property DoctorTbl[] $doctorTbls
 * @property NurseTbl[] $nurseTbls
 * @property PatientTbl[] $patientTbls
 * @property PublicUserTbl[] $publicUserTbls
 */
class GendarTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gendar_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gendar'], 'required'],
            [['gendar'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gen_id' => 'Gen ID',
            'gendar' => 'Gendar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorTbls()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_ged_id' => 'gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurseTbls()
    {
        return $this->hasMany(NurseTbl::className(), ['n_gen_id' => 'gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['p_gen_id' => 'gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicUserTbls()
    {
        return $this->hasMany(PublicUserTbl::className(), ['pub_gen_id' => 'gen_id']);
    }
}
