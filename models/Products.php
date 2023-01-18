<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $user_email
 * @property string $name
 * @property string $description
 * @property string $ikey
 * @property int $unit_price
 * @property int $selling_price
 * @property int $quantity
 * @property string $availability
 * @property int $active
 * @property string $brand
 * @property int $stock
 * @property string $image
 * @property string $created_at
 * @property string $amount
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'ikey', 'unit_price', 'selling_price', 'availability', 'active', 'brand', 'stock', 'image', 'amount'], 'required'],
            [['description'], 'string'],
            [['unit_price', 'selling_price', 'quantity', 'active', 'stock'], 'integer'],
            [['user_email', 'created_at'], 'safe'],
            [['user_email', 'name', 'image'], 'string', 'max' => 255],
            [['ikey', 'amount'], 'string', 'max' => 50],
            [['availability', 'brand'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions'=>'jpg,png,gif', 'skipOnEmpty'=>false]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_email' => Yii::t('app', 'User Email'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'ikey' => Yii::t('app', 'Ikey'),
            'unit_price' => Yii::t('app', 'Unit Price'),
            'selling_price' => Yii::t('app', 'Selling Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'availability' => Yii::t('app', 'Availability'),
            'active' => Yii::t('app', 'Active'),
            'brand' => Yii::t('app', 'Brand'),
            'stock' => Yii::t('app', 'Stock'),
            'image' => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }
}
