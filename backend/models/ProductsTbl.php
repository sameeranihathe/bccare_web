<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products_tbl".
 *
 * @property integer $product_id
 * @property string $product_title
 * @property string $product_description
 * @property string $product_img_path
 */
class ProductsTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_title', 'product_description', 'product_img_path'], 'required'],
            [['product_title'], 'string', 'max' => 200],
            [['product_description'], 'string', 'max' => 300],
            [['product_img_path'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_title' => 'Product Title',
            'product_description' => 'Product Description',
            'product_img_path' => 'Image',
        ];
    }
}
