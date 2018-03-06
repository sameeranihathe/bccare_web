<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctor_tbl".
 *
 * @property integer $d_id
 * @property string $d_reg_num
 * @property string $d_nic
 * @property integer $d_ged_id
 * @property integer $d_ti_id
 * @property string $d_f_name
 * @property string $d_l_name
 * @property string $d_email
 * @property string $d_contact_num
 * @property string $d_address
 * @property string $d_dob
 * @property integer $d_lang_id
 * @property integer $d_desig_id
 * @property integer $d_loc_id
 * @property string $d_img_path
 *
 * @property DoctorNurseTbl[] $doctorNurseTbls
 * @property NurseTbl[] $ns
 * @property GendarTbl $dGed
 * @property Title $dTi
 * @property LanguagesTbl $dLang
 * @property DesignationTbl $dDesig
 * @property TreatmentLocationTbl $dLoc
 */
class DoctorTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

  
    public static function tableName()
    {
        return 'doctor_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_reg_num', 'd_nic', 'd_ged_id', 'd_ti_id', 'd_f_name', 'd_l_name', 'd_email',  'd_lang_id', 'd_desig_id', 'd_loc_id'], 'required',],
            [['d_ged_id', 'd_ti_id', 'd_lang_id', 'd_desig_id', 'd_loc_id'], 'integer'],
            [['d_dob', 'd_contact_num', 'd_address'], 'safe'],
            [['d_reg_num', 'd_nic',  'd_contact_num'], 'string', 'max' => 20],
            [['d_f_name', 'd_l_name'], 'string', 'max' => 100],
            [['d_email'], 'string', 'max' => 150],
            [['d_address', 'd_img_path'], 'string', 'max' => 300],
            [['d_reg_num'], 'unique'],
           
			['d_nic', 'string', 'min' => 10],
            ['d_nic', 'unique', 'targetClass' => '\backend\models\DoctorTbl', 'message' => 'This NIC has already Saved in the System.'],

            [['d_img_path'], 'file', 'extensions'=> 'png, jpg, gif' , 'on' => 'update-photo-upload'],
            [['d_ged_id'], 'exist', 'skipOnError' => true, 'targetClass' => GendarTbl::className(), 'targetAttribute' => ['d_ged_id' => 'gen_id']],
            [['d_ti_id'], 'exist', 'skipOnError' => true, 'targetClass' => Title::className(), 'targetAttribute' => ['d_ti_id' => 'ti_id']],
            [['d_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => LanguagesTbl::className(), 'targetAttribute' => ['d_lang_id' => 'lang_id']],
            [['d_desig_id'], 'exist', 'skipOnError' => true, 'targetClass' => DesignationTbl::className(), 'targetAttribute' => ['d_desig_id' => 'desig_id']],
            [['d_loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => TreatmentLocationTbl::className(), 'targetAttribute' => ['d_loc_id' => 'loc_id']],
            [['d_img_path'],'safe', 'on'=>'createrule'],



        ];
    }
    /* Getter for person full name */
public function getFullName() {
    return $this->d_f_name . ' ' . $this->d_l_name;
}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'd_id' => 'Doctor ID',
            'd_reg_num' => 'Registration No',
            'd_nic' => 'NIC No',
            'd_ged_id' => 'Gendar',
            'd_ti_id' => 'Title',
            'd_f_name' => 'First Name',
            'd_l_name' => 'Last Name',
            'd_email' => 'Email Address',
            'd_contact_num' => 'Contact No',
            'd_address' => 'Address',
            'd_dob' => 'DOB',
            'd_lang_id' => 'Language',
            'd_desig_id' => 'Designation',
            'd_loc_id' => 'Location',
            'd_img_path' => 'Image',
            'dLoc.loc_name' => 'Location',
            'fullName' => 'Full Name',

           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorNurseTbls()
    {
        return $this->hasMany(DoctorNurseTbl::className(), ['d_id' => 'd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNs()
    {
        return $this->hasMany(NurseTbl::className(), ['n_id' => 'n_id'])->viaTable('doctor_nurse_tbl', ['d_id' => 'd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDGed()
    {
        return $this->hasOne(GendarTbl::className(), ['gen_id' => 'd_ged_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDTi()
    {
        return $this->hasOne(Title::className(), ['ti_id' => 'd_ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDLang()
    {
        return $this->hasOne(LanguagesTbl::className(), ['lang_id' => 'd_lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDDesig()
    {
        return $this->hasOne(DesignationTbl::className(), ['desig_id' => 'd_desig_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDLoc()
    {
        return $this->hasOne(TreatmentLocationTbl::className(), ['loc_id' => 'd_loc_id']);
    }
}
