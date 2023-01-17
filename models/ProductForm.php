<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Product extends Model
{
    public $product_name;
    public $code;
    public $category;
    public $unit_price;
    public $selling_price;
    public $reorder_level;
    public $product_images;
    public $is_active;
    public $user_id;

    public function rules()
    {
        return [
            [['product_name', 'code', 'category', 'unit_price', 'selling_price', 'reorder_level', 'product_images'], 'required'],
            [['unit_price', 'selling_price'], 'double'],
            [['reorder_level'], 'integer'],
            [['product_images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 4],
            [['is_active'], 'boolean'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'product_name' => 'Product Name',
            'code' => 'Code',
            'category' => 'Product Category',
            'unit_price' => 'Unit Price',
            'selling_price' => 'Selling Price',
            'reorder_level' => 'Reorder Level',
            'product_images' => 'Product Gallery',
            'is_active' => 'Is Active',
            'user_id' => 'User Id',
        ];
    }
}
