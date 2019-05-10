<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $name
 * @property int $price
 * @property int $old_price
 * @property string $keywords
 * @property string $description
 * @property int $stock Description
 * @property Characteristics[] $characteristics
 * @property Images[] $images
 * @property OrdItems[] $ordItems
 * @property Categories $cat
 * @property Reviews[] $reviews
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
            [['cat_id', 'name', 'price', 'old_price', 'keywords', 'description'], 'required'],
            [['cat_id', 'price', 'old_price','stock'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 256],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№пп',
            'cat_id' => 'Категория',
            'name' => 'Наименование',
            'price' => 'Цена',
            'old_price' => 'Старая',
            'keywords' => 'Ключевые слова',
            'description' => 'Метаописание',
            'stock' => 'Готовность к продаже',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasMany(Characteristics::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdItems()
    {
        return $this->hasMany(OrdItems::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['prod_id' => 'id']);
    }
    
    public function getStk()
    {
        return $this->hasOne(Stock::className(), ['id' => 'stock']);
    }
}
