<?php

namespace backend\models;


use Yii;

/**
 * This is the model class for table "patient_tbl".
 *
 * @property integer $p_id
 * @property string $p_reg_num
 * @property string $p_nic
 * @property integer $p_gen_id
 * @property integer $p_ti_id
 * @property string $p_f_name
 * @property string $p_l_name
 * @property string $p_email
 * @property string $p_contact_num
 * @property string $p_address
 * @property string $p_dob
 * @property integer $p_bg_id
 * @property integer $p_lang_id
 * @property integer $p_discharged_stat
 * @property string $p_discharged_date
 * @property integer $p_msg_ser_stat
 * @property integer $p_loc_id
 * @property integer $p_dis_id
 * @property string $p_remarks
 * @property string $p_img_path
 * @property string $p_relation_name
 * @property string $p_relation_to_patient
 * @property integer $p_relation_contactno
 * @property integer $gn_code
 *
 * @property DoctorPatientTbl[] $doctorPatientTbls
 * @property DoctorTbl[] $ds
 * @property NursePatient[] $nursePatients
 * @property NurseTbl[] $ns
 * @property NurseRequestsTbl[] $nurseRequestsTbls
 * @property PDlyStatusTbl[] $pDlyStatusTbls
 * @property PatientHistoryTbl[] $patientHistoryTbls
 * @property PubGnDivisionTbl $gnCode
 * @property GendarTbl $pGen
 * @property Title $pTi
 * @property BloodgroupTbl $pBg
 * @property LanguagesTbl $pLang
 * @property TreatmentLocationTbl $pLoc
 * @property DistrictTbl $pDis
 * @property PrivateChatTbl[] $privateChatTbls
 * @property NurseTbl[] $ns0
 * @property SchduleTbl[] $schduleTbls
 */
class PatientTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_dob','p_reg_num', 'p_nic', 'p_gen_id', 'p_ti_id', 'p_f_name', 'gn_code', 'p_contact_num', 'p_discharged_stat', 'p_msg_ser_stat', 'p_loc_id', 'p_lang_id'], 'required'],
            [['p_gen_id', 'p_ti_id', 'p_bg_id', 'p_discharged_stat', 'p_msg_ser_stat', 'p_loc_id', 'p_dis_id', 'p_relation_contactno', 'gn_code', 'p_contact_num'], 'integer'],
            [['p_discharged_date','p_l_name', 'p_relation_name', 'p_relation_to_patient', 'p_relation_contactno'], 'safe'],
            [['p_reg_num', 'p_contact_num'], 'string', 'max' => 10],
            [['p_nic'], 'string', 'max' => 12],
			[['p_nic'], 'string', 'min' => 10],
            [['p_f_name', 'p_l_name'], 'string', 'max' => 100],
            [['p_email'], 'string', 'max' => 150],
            [['p_address', 'p_remarks', 'p_img_path'], 'string', 'max' => 300],
            [['p_relation_name'], 'string', 'max' => 30],
            [['p_relation_to_patient'], 'string', 'max' => 50],
			
            [['p_reg_num'], 'unique'],
			
			//['p_nic', 'unique', 'targetClass' => '\backend\models\PatientTbl', 'message' => 'This email address has already been taken.'],
			//['p_nic', 'unique', 'targetAttribute' => ['p_nic'], 'message' => 'Username must be unique.'],
            ['p_nic', 'unique'],
            [['gn_code'], 'exist', 'skipOnError' => true, 'targetClass' => PubGnDivisionTbl::className(), 'targetAttribute' => ['gn_code' => 'gn_Code']],
            [['p_gen_id'], 'exist', 'skipOnError' => true, 'targetClass' => GendarTbl::className(), 'targetAttribute' => ['p_gen_id' => 'gen_id']],
            [['p_ti_id'], 'exist', 'skipOnError' => true, 'targetClass' => Title::className(), 'targetAttribute' => ['p_ti_id' => 'ti_id']],
            [['p_bg_id'], 'exist', 'skipOnError' => true, 'targetClass' => BloodGroupTbl::className(), 'targetAttribute' => ['p_bg_id' => 'bg_id']],
            [['p_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => LanguagesTbl::className(), 'targetAttribute' => ['p_lang_id' => 'lang_id']],
            [['p_loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => TreatmentLocationTbl::className(), 'targetAttribute' => ['p_loc_id' => 'loc_id']],
            [['p_dis_id'], 'exist', 'skipOnError' => true, 'targetClass' => DistrictTbl::className(), 'targetAttribute' => ['p_dis_id' => 'dis_id']],
            [['p_img_path'],'safe', 'on'=>'createrule'],
        ];
    }
	
	public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

     public function getFullName() {
        return $this->p_f_name . ' ' . $this->p_l_name;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'P ID',
            'p_reg_num' => 'Registration No',
            'p_nic' => 'NIC No',
            'p_gen_id' => 'Gendar',
            'p_ti_id' => 'Title',
            'p_f_name' => 'First Name',
            'p_l_name' => 'Last Name',
            'p_email' => 'Email Address',
            'p_contact_num' => 'Contact No',
            'p_address' => 'Address',
            'p_dob' => 'DOB',
            'p_bg_id' => 'Blood Group',
            'p_lang_id' => 'Language',
            'p_discharged_stat' => 'Discharged Status',
            'p_discharged_date' => 'Discharged Date',
            'p_msg_ser_stat' => 'Message Service Activation Status',
            'p_loc_id' => 'Treatment Location',
            'p_dis_id' => 'District',
            'p_remarks' => 'Patient Remarks',
            'p_img_path' => 'Image',
            'p_relation_name' => 'Patient Relative Name',
            'p_relation_to_patient' => 'Relation To Patient',
            'p_relation_contactno' => 'Relative Contact No',
            'fullName' => 'Full Name',
           
            'ds_Code'=> 'Division',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorPatientTbls()
    {
        return $this->hasMany(DoctorPatientTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDs()
    {
        return $this->hasMany(DoctorTbl::className(), ['d_id' => 'd_id'])->viaTable('doctor_patient_tbl', ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNursePatients()
    {
        return $this->hasMany(NursePatient::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNs()
    {
        return $this->hasMany(NurseTbl::className(), ['n_id' => 'n_id'])->viaTable('nurse_patient', ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurseRequestsTbls()
    {
        return $this->hasMany(NurseRequestsTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPDlyStatusTbls()
    {
        return $this->hasMany(PDlyStatusTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientHistoryTbls()
    {
        return $this->hasMany(PatientHistoryTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGnCode()
    {
        return $this->hasOne(PubGnDivisionTbl::className(), ['gn_Code' => 'gn_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPGen()
    {
        return $this->hasOne(GendarTbl::className(), ['gen_id' => 'p_gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPTi()
    {
        return $this->hasOne(Title::className(), ['ti_id' => 'p_ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPBg()
    {
        return $this->hasOne(BloodGroupTbl::className(), ['bg_id' => 'p_bg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPLang()
    {
        return $this->hasOne(LanguagesTbl::className(), ['lang_id' => 'p_lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPLoc()
    {
        return $this->hasOne(TreatmentLocationTbl::className(), ['loc_id' => 'p_loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPDis()
    {
        return $this->hasOne(DistrictTbl::className(), ['dis_id' => 'p_dis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivateChatTbls()
    {
        return $this->hasMany(PrivateChatTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNs0()
    {
        return $this->hasMany(NurseTbl::className(), ['n_id' => 'n_id'])->viaTable('private_chat_tbl', ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchduleTbls()
    {
        return $this->hasMany(SchduleTbl::className(), ['p_id' => 'p_id']);
    }
}
