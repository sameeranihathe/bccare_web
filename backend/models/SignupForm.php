<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $admin_type;
   // public $admin_reg_num;
    public $admin_nic;
    public $admin_gen_id;
    public $admin_ti_id;
    public $admin_f_name;
    public $admin_l_name;
    public $admin_contact_num;
    //public $admin_address;
    //public $admin_dob;
    //public $admin_lang_id;
    //public $admin_desig_id;
    public $admin_loc_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			['admin_nic', 'required'],
			['admin_nic', 'string', 'min' => 10],
            ['admin_nic', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This NIC has already Saved in the System.'],
            ['admin_f_name', 'required'],
            ['admin_l_name', 'required'],
            ['admin_contact_num', 'required'],
            ['admin_gen_id', 'required'], 
            ['admin_ti_id', 'required'],
			['admin_loc_id', 'required'],
            [['admin_loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => TreatmentLocationTbl::className(), 'targetAttribute' => ['admin_loc_id' => 'loc_id']],
            [['admin_gen_id'], 'exist', 'skipOnError' => true, 'targetClass' => GendarTbl::className(), 'targetAttribute' => ['admin_gen_id' => 'gen_id']],
            [['admin_ti_id'], 'exist', 'skipOnError' => true, 'targetClass' => Title::className(), 'targetAttribute' => ['admin_ti_id' => 'ti_id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
           // 'auth_key' => 'Auth Key',
            //'password_hash' => 'Password Hash',
            //'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
           // 'status' => 'Status',
           // 'created_at' => 'Created At',
          //  'updated_at' => 'Updated At',
            //'admin_reg_num' => 'Registration No',
            'admin_nic' => 'Nic No',
            'admin_gen_id' => 'Gendar',
            'admin_ti_id' => 'Title',
            'admin_f_name' => 'First Name',
            'admin_l_name' => 'Last Name',
            'admin_contact_num' => 'Contact No',
            //'admin_address' => 'Address',
            //'admin_dob' => 'DOB',
            //'admin_lang_id' => 'Language',
            //'admin_desig_id' => 'Designation',
            'admin_loc_id' => 'Location',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        //added by sameera
        //$user->admin_reg_num = $this->admin_reg_num;
        $user->admin_nic = $this->admin_nic;
        $user->admin_gen_id = $this->admin_gen_id;
        $user->admin_nic = $this->admin_nic;
        //$user->admin_gen_id = $this->admin_gen_id;
        $user->admin_ti_id = $this->admin_ti_id;
        $user->admin_f_name = $this->admin_f_name;
        $user->admin_l_name = $this->admin_l_name;
        $user->admin_contact_num = $this->admin_contact_num;
        //$user->admin_address = $this->admin_address;
        //$user->admin_dob = $this->admin_dob;
        //$user->admin_lang_id = $this->admin_lang_id;
        //$user->admin_desig_id = $this->admin_desig_id;
        $user->admin_loc_id = $this->admin_loc_id;
        $user->admin_type = $this->admin_type;

        return $user->save() ? $user : null;
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminLoc()
    {
        return $this->hasOne(TreatmentLocationTbl::className(), ['loc_id' => 'admin_loc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminGen()
    {
        return $this->hasOne(GendarTbl::className(), ['gen_id' => 'admin_gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminTi()
    {
        return $this->hasOne(Title::className(), ['ti_id' => 'admin_ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminLang()
    {
        return $this->hasOne(LanguagesTbl::className(), ['lang_id' => 'admin_lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminDesig()
    {
        return $this->hasOne(DesignationTbl::className(), ['desig_id' => 'admin_desig_id']);
    }
}
