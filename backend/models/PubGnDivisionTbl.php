<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pub_gn_division_tbl".
 *
 * @property integer $gn_Code
 * @property string $Gnd_Name
 * @property integer $ds_Code
 *
 * @property PatientTbl[] $patientTbls
 * @property PubDsDivisionTbl $dsCode
 */
class PubGnDivisionTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pub_gn_division_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Gnd_Name', 'ds_Code'], 'required'],
            [['ds_Code'], 'integer'],
            [['Gnd_Name'], 'string', 'max' => 100],
            [['ds_Code'], 'exist', 'skipOnError' => true, 'targetClass' => PubDsDivisionTbl::className(), 'targetAttribute' => ['ds_Code' => 'ds_Code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gn_Code' => 'Gn  Code',
            'Gnd_Name' => 'Gnd  Name',
            'ds_Code' => 'Ds  Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['gn_code' => 'gn_Code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsCode()
    {
        return $this->hasOne(PubDsDivisionTbl::className(), ['ds_Code' => 'ds_Code']);
    }
}
