<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "designation_tbl".
 *
 * @property integer $desig_id
 * @property string $designation
 *
 * @property DoctorTbl[] $doctorTbls
 * @property NurseTbl[] $nurseTbls
 */
class DesignationTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designation'], 'required'],
            [['designation'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desig_id' => 'Designation ID',
            'designation' => 'Designation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorTbls()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_desig_id' => 'desig_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurseTbls()
    {
        return $this->hasMany(NurseTbl::className(), ['n_desig_id' => 'desig_id']);
    }
}
