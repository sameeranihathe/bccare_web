<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pub_province_tbl".
 *
 * @property integer $pro_Code
 * @property string $Pro_Name
 *
 * @property PubDistrictTbl[] $pubDistrictTbls
 */
class PubProvinceTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pub_province_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Pro_Name'], 'required'],
            [['Pro_Name'], 'string', 'max' => 100],
            [['Pro_Name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pro_Code' => 'Province',
            'Pro_Name' => 'Pro  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubDistrictTbls()
    {
        return $this->hasMany(PubDistrictTbl::className(), ['pro_Code' => 'pro_Code']);
    }
}
