<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_type_tbl".
 *
 * @property integer $user_type_id
 * @property string $user_type
 *
 * @property LoginTbl[] $loginTbls
 */
class UserTypeTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type'], 'required'],
            [['user_type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_type_id' => 'User Type ID',
            'user_type' => 'User Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginTbls()
    {
        return $this->hasMany(LoginTbl::className(), ['user_type_id' => 'user_type_id']);
    }
}
