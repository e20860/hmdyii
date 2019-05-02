<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $keywords
 * @property string $description
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img',], 'required'],
            [[ 'keywords', 'description',],'safe'],
            [['description'], 'string'],
            [['name', 'img'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Наименование',
            'img' => 'Файл изображения',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['cat_id' => 'id']);
    }
}
