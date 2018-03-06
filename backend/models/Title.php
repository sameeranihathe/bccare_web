<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "title".
 *
 * @property integer $ti_id
 * @property string $title
 *
 * @property DoctorTbl[] $doctorTbls
 * @property NurseTbl[] $nurseTbls
 * @property PatientTbl[] $patientTbls
 * @property PublicUserTbl[] $publicUserTbls
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ti_id' => 'Ti ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorTbls()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_ti_id' => 'ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurseTbls()
    {
        return $this->hasMany(NurseTbl::className(), ['n_ti_id' => 'ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['p_ti_id' => 'ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicUserTbls()
    {
        return $this->hasMany(PublicUserTbl::className(), ['pub_ti_id' => 'ti_id']);
    }
}
