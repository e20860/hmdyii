<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property string $id
 * @property string $prod_id
 * @property string $user_id
 * @property date   $r_date
 * @property string $name
 * @property string $email
 * @property string $text
 * @property int $rating
 *
 * @property Products $prod
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
            [['prod_id', 'user_id', 'r_date', 'name', 'email', 'text', 'rating'], 'required'],
            [['prod_id', 'user_id', 'rating'], 'integer'],
            [['r_date'], 'safe'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 128],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['prod_id' => 'id']],
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
            //'user_id' => 'Пользователь',
            'r_date' => 'Дата отзыва',
            'name' => 'Автор отзыва',
            'email' => 'E-mail',
            'text' => 'Содержание отзыва',
            'rating' => 'Рейтинг',
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
