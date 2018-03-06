<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pub_ds_division_tbl".
 *
 * @property integer $ds_Code
 * @property string $Ds_Name
 * @property integer $dis_Code
 *
 * @property PubDistrictTbl $disCode
 * @property PubGnDivisionTbl[] $pubGnDivisionTbls
 */
class PubDsDivisionTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pub_ds_division_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ds_Name', 'dis_Code'], 'required'],
            [['dis_Code'], 'integer'],
            [['Ds_Name'], 'string', 'max' => 100],
            [['dis_Code'], 'exist', 'skipOnError' => true, 'targetClass' => PubDistrictTbl::className(), 'targetAttribute' => ['dis_Code' => 'dis_Code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ds_Code' => 'District Division',
            'Ds_Name' => 'Ds  Name',
            'dis_Code' => 'Dis  Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisCode()
    {
        return $this->hasOne(PubDistrictTbl::className(), ['dis_Code' => 'dis_Code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubGnDivisionTbls()
    {
        return $this->hasMany(PubGnDivisionTbl::className(), ['ds_Code' => 'ds_Code']);
    }
}
