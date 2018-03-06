<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pub_district_tbl".
 *
 * @property integer $dis_Code
 * @property string $Dis_Name
 * @property integer $pro_Code
 *
 * @property PubProvinceTbl $proCode
 * @property PubDsDivisionTbl[] $pubDsDivisionTbls
 */
class PubDistrictTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pub_district_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Dis_Name', 'pro_Code'], 'required'],
            [['pro_Code'], 'integer'],
            [['Dis_Name'], 'string', 'max' => 100],
            [['Dis_Name'], 'unique'],
            [['pro_Code'], 'exist', 'skipOnError' => true, 'targetClass' => PubProvinceTbl::className(), 'targetAttribute' => ['pro_Code' => 'pro_Code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dis_Code' => 'District',
            'Dis_Name' => 'Dis  Name',
            'pro_Code' => 'Pro  Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProCode()
    {
        return $this->hasOne(PubProvinceTbl::className(), ['pro_Code' => 'pro_Code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubDsDivisionTbls()
    {
        return $this->hasMany(PubDsDivisionTbl::className(), ['dis_Code' => 'dis_Code']);
    }
}
