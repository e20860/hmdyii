<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int $prod_id
 * @property string $file
 * @property int $ord
 *
 * @property Products $prod
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_id', 'file', 'ord'], 'required'],
            [['prod_id', 'ord'], 'integer'],
            [['file'], 'string', 'max' => 255],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['prod_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'prod_id' => 'Товар',
            'file' => 'Файл',
            'ord' => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Products::className(), ['id' => 'prod_id']);
    }
}
