<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "public_user_tbl".
 *
 * @property integer $pub_id
 * @property string $pub_nic
 * @property integer $pub_gen_id
 * @property integer $pub_ti_id
 * @property string $pub_f_name
 * @property string $pub_l_name
 * @property string $pub_email
 * @property string $pub_contact_num
 * @property string $pub_dob
 * @property integer $pub_lang_id
 * @property integer $pub_dis_id
 * @property string $pub_remarks
 *
 * @property GendarTbl $pubGen
 * @property Title $pubTi
 * @property LanguagesTbl $pubLang
 * @property DistrictTbl $pubDis
 */
class PublicUserTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'public_user_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pub_nic', 'pub_gen_id', 'pub_ti_id', 'pub_f_name', 'pub_l_name'], 'required'],
            [['pub_gen_id', 'pub_ti_id', 'pub_lang_id', 'pub_dis_id'], 'integer'],
            [['pub_dob'], 'safe'],
            [['pub_nic'], 'string', 'max' => 12],
            [['pub_f_name', 'pub_l_name'], 'string', 'max' => 100],
            [['pub_email'], 'string', 'max' => 150],
            [['pub_contact_num'], 'string', 'max' => 20],
            [['pub_remarks'], 'string', 'max' => 300],
            [['pub_nic'], 'unique'],
            [['pub_gen_id'], 'exist', 'skipOnError' => true, 'targetClass' => GendarTbl::className(), 'targetAttribute' => ['pub_gen_id' => 'gen_id']],
            [['pub_ti_id'], 'exist', 'skipOnError' => true, 'targetClass' => Title::className(), 'targetAttribute' => ['pub_ti_id' => 'ti_id']],
            [['pub_lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => LanguagesTbl::className(), 'targetAttribute' => ['pub_lang_id' => 'lang_id']],
            [['pub_dis_id'], 'exist', 'skipOnError' => true, 'targetClass' => DistrictTbl::className(), 'targetAttribute' => ['pub_dis_id' => 'dis_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pub_id' => 'Pub ID',
            'pub_nic' => 'NIC No',
            'pub_gen_id' => 'Gendar',
            'pub_ti_id' => 'Title',
            'pub_f_name' => 'First Name',
            'pub_l_name' => 'Last Name',
            'pub_email' => 'Email',
            'pub_contact_num' => 'Contact No',
            'pub_dob' => 'DOB',
            'pub_lang_id' => 'Language',
            'pub_dis_id' => 'District',
            'pub_remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubGen()
    {
        return $this->hasOne(GendarTbl::className(), ['gen_id' => 'pub_gen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubTi()
    {
        return $this->hasOne(Title::className(), ['ti_id' => 'pub_ti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubLang()
    {
        return $this->hasOne(LanguagesTbl::className(), ['lang_id' => 'pub_lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPubDis()
    {
        return $this->hasOne(DistrictTbl::className(), ['dis_id' => 'pub_dis_id']);
    }
}
