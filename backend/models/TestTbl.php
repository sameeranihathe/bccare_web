<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "test_tbl".
 *
 * @property integer $test_id
 * @property string $test_val
 */
class TestTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_val'], 'required'],
            [['test_val'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'Test ID',
            'test_val' => 'Test Val',
        ];
    }
}
