<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ord_items".
 *
 * @property int $id
 * @property int $ord_id
 * @property int $product_id
 * @property string $name
 * @property int $price
 * @property int $quantity
 *
 * @property Orders $ord
 * @property Products $product
 */
class OrdItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ord_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ord_id', 'product_id', 'name', 'price', 'quantity'], 'required'],
            [['ord_id', 'product_id', 'price', 'quantity'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['ord_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['ord_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'ord_id' => 'Заказ',
            'product_id' => 'Изделие(товар)',
            'name' => 'Наименование',
            'price' => 'Цена',
            'quantity' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'ord_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
