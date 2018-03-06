<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "login_tbl".
 *
 * @property integer $login_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $password
 * @property integer $user_type_id
 * @property integer $loging_status
 * @property integer $password_change_stat
 * @property integer $account_active_stat
 *
 * @property UserTypeTbl $userType
 */
class LoginTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_name', 'password', 'user_type_id', 'loging_status', 'password_change_stat', 'account_active_stat'], 'required'],
            [['user_id', 'user_type_id', 'loging_status', 'password_change_stat', 'account_active_stat'], 'integer'],
            [['user_name'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
            [['user_name'], 'unique'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserTypeTbl::className(), 'targetAttribute' => ['user_type_id' => 'user_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login_id' => 'Login ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'password' => 'Password',
            'user_type_id' => 'User Type ID',
            'loging_status' => 'Loging Status',
            'password_change_stat' => 'Password Change Stat',
            'account_active_stat' => 'Account Active Stat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserTypeTbl::className(), ['user_type_id' => 'user_type_id']);
    }
}
