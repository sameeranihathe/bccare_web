<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nurse_tbl".
 *
 * @property integer $n_id
 * @property string $n_reg_num
 * @property string $n_nic
 * @property integer $n_gen_id
 * @property integer $n_ti_id
 * @property string $n_f_name
 * @property string $n_l_name
 * @property string $n_email
 * @property string $n_contact_num
 * @property string $n_address
 * @property string $n_dob
 * @property integer $n_lang_id
 * @property integer $n_desig_id
 * @property integer $n_loc_id
 * @property string $n_img_path
 *
 * @property DoctorNurseTbl[] $doctorNurseTbls
 * @property DoctorTbl[] $ds
 * @property NursePatient[] $nursePatients
 * @property PatientTbl[] $ps
 * @property GendarTbl $nGen
 * @property Title $nTi
 * @property LanguagesTbl $nLang
 * @property DesignationTbl $nDesig
 * @property TreatmentLocationTbl $nLoc
 * @property PrivateChatTbl[] $privateChatTbls
 * @property PatientTbl[] $ps0
 */
class NurseTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nurse_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_reg_num', 'n_nic', 'n_gen_id', 'n_ti_id', 'n_f_name', 'n_l_name', 'n_email', 'n_contact_num', 'n_address', 'n_dob', 'n_lang_id', 'n_desig_id', 'n_loc_id', ], 'required'],
            [['n_gen_id', 'n_ti_id', 'n_lang_id', 'n_desig_id', 'n_loc_id'], 'integer'],
            [['n_dob'], 'safe'],
            [['n_reg_num', 'n_nic', 'n_contact_num'], 'string', 'max' => 20],
            [['n_f_name', 'n_l_name'], 'string', 'max' => 100],
            [['n_email'], 'string', 'max' => 150],
            [['n_address', 'n_img_path'], 'string', 'max' => 300],
            [['n_reg_num'], 'unique'],
            [['n_nic'], 'unique'],
            [['n_img_path'], 'file', 'extensions'=> 'png, jpg, gif'],
            [['n_gen_id'], 'exist', 'skipOnError' => true, 'targetClass' => GendarTbl::className(), 'targetAttribute' => ['n_gen_id' => 'gen_id']],
            [['n_ti_id'], 'exist', 'skipOnError' => true, 'targetClass' => Title::className(), 'targetAttribute' => ['n_ti_id' => 'ti_id']],
            [['n_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => LanguagesTbl::className(), 'targetAttribute' => ['n_lang_id' => 'lang_id']],
            [['n_desig_id'], 'exist', 'skipOnError' => true, 'targetClass' => DesignationTbl::className(), 'targetAttribute' => ['n_desig_id' => 'desig_id']],
            [['n_loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => TreatmentLocationTbl::className(), 'targetAttribute' => ['n_loc_id' => 'loc_id']],
             [['n_img_path'],'safe', 'on'=>'createrule'],
        ];
    }
     /* Getter for person full name */
    public function getFullName() {
        return $this->n_f_name . ' ' . $this->n_l_name;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'n_id' => 'Nurse ID',
            'n_reg_num' => 'Registration No',
            'n_nic' => 'NIC No',
            'n_gen_id' => 'Gendar',
            'n_ti_id' => 'Title',
            'n_f_name' => 'First Name',
            'n_l_name' => 'Last Name',
            'n_email' => 'Email Address',
            'n_contact_num' => 'Contact No',
            'n_address' => 'Address',
            'n_dob' => 'DOB',
            'n_lang_id' => 'Language',
            'n_desig_id' => 'Designation',
            'n_loc_id' => 'Location',
            'n_img_path' => 'Image',
            'fullName' => 'Full Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorNurseTbls()
    {
        return $this->hasMany(DoctorNurseTbl::className(), ['n_id' => 'n_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDs()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_id' => 'd_id'])->viaTable('doctor_nurse_tbl', ['n_id' => 'n_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNursePatients()
    {
        return $this->hasMany(NursePatient::className(), ['n_id' => 'n_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPs()
    {
        return $this->hasMany(PatientTbl::className(), ['p_id' => 'p_id'])->viaTable('nurse_patient', ['n_id' => 'n_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNGen()
    {
        return $this->hasOne(GendarTbl::className(), ['gen_id' => 'n_gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTi()
    {
        return $this->hasOne(Title::className(), ['ti_id' => 'n_ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNLang()
    {
        return $this->hasOne(LanguagesTbl::className(), ['lang_id' => 'n_lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNDesig()
    {
        return $this->hasOne(DesignationTbl::className(), ['desig_id' => 'n_desig_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNLoc()
    {
        return $this->hasOne(TreatmentLocationTbl::className(), ['loc_id' => 'n_loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateChatTbls()
    {
        return $this->hasMany(PrivateChatTbl::className(), ['n_id' => 'n_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPs0()
    {
        return $this->hasMany(PatientTbl::className(), ['p_id' => 'p_id'])->viaTable('private_chat_tbl', ['n_id' => 'n_id']);
    }
}
