<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "treatment_location_tbl".
 *
 * @property integer $loc_id
 * @property string $loc_name
 * @property double $lat
 * @property double $lng
 * @property string $description
 *
 * @property DoctorTbl[] $doctorTbls
 * @property NurseTbl[] $nurseTbls
 * @property PatientTbl[] $patientTbls
 */
class TreatmentLocationTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment_location_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loc_name', 'lat', 'lng', 'description'], 'required'],
            [['lat', 'lng'], 'number'],
            [['loc_name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 300],
            [['lat', 'lng'], 'unique', 'targetAttribute' => ['lat', 'lng'], 'message' => 'The combination of Lat and Lng has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loc_id' => 'Loc ID',
            'loc_name' => 'Location Name',
            'lat' => 'Latitudes',
            'lng' => 'Longitudes',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorTbls()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_loc_id' => 'loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurseTbls()
    {
        return $this->hasMany(NurseTbl::className(), ['n_loc_id' => 'loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTbls()
    {
        return $this->hasMany(PatientTbl::className(), ['p_loc_id' => 'loc_id']);
    }
}
