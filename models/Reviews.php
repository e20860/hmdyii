<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int    $id
 * @property int    $prod_id
 * @property int    $user_id
 * @property string $text     COntent
 * @property int    $rating   Rating 1 to 5
 * @property date   $r_date   Date of review
 *
 * @property Products $prod
 * @property Users $user
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_id', 'user_id', 'text', 'rating','r_date'], 'required'],
            [['prod_id', 'user_id', 'rating'], 'integer'],
            [['text'], 'string'],
            [['r_date'], 'date'],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['prod_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_id' => 'Изделие',
            'user_id' => 'Пользователь',
            'r_date' => 'Дата отзыва',
            'text' => 'Содержимое',
            'rating' => 'Оценка (от 1 до 5)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Products::className(), ['id' => 'prod_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
