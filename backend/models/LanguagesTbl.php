<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "languages_tbl".
 *
 * @property integer $lang_id
 * @property string $language
 *
 * @property DoctorTbl[] $doctorTbls
 * @property NurseTbl[] $nurseTbls
 * @property PatientTbl[] $patientTbls
 * @property PublicUserTbl[] $publicUserTbls
 */
class LanguagesTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language'], 'required'],
            [['language'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lang_id' => 'Lang ID',
            'language' => 'Language',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorTbls()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_lang_id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurseTbls()
    {
        return $this->hasMany(NurseTbl::className(), ['n_lang_id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['p_lang_id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicUserTbls()
    {
        return $this->hasMany(PublicUserTbl::className(), ['pub_lang_id' => 'lang_id']);
    }
}
