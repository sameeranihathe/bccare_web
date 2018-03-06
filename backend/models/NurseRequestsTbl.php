<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nurse_requests_tbl".
 *
 * @property integer $n_req_id
 * @property integer $p_id
 * @property integer $n_id
 * @property string $n_req_stat
 * @property integer $n_req_auth_user_id
 *
 * @property PatientTbl $p
 * @property NurseTbl $n
 */
class NurseRequestsTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nurse_requests_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id', 'n_id', 'n_req_stat', 'n_req_auth_user_id'], 'required'],
            [['p_id', 'n_id', 'n_req_auth_user_id'], 'integer'],
            [['n_req_stat'], 'string', 'max' => 1],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientTbl::className(), 'targetAttribute' => ['p_id' => 'p_id']],
            [['n_id'], 'exist', 'skipOnError' => true, 'targetClass' => NurseTbl::className(), 'targetAttribute' => ['n_id' => 'n_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'n_req_id' => 'N Req ID',
            'p_id' => 'Patient Name',
            'n_id' => 'Nurse Name',
            'n_req_stat' => 'Nurse Request Status',
            'n_req_auth_user_id' => 'N Req Auth User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(PatientTbl::className(), ['p_id' => 'p_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getN()
    {
        return $this->hasOne(NurseTbl::className(), ['n_id' => 'n_id']);
    }
}
