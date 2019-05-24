<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int    $id
 * @property int    $prod_id
 * @property int    $user_id
 * @property string $name
 * @property string $email
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
     * 
     * @return array
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_id', 'name', 'text', 'rating','email','user_id'], 'required'],
            [['r_date'], 'safe'],
            [['prod_id', 'user_id', 'rating'], 'integer'],
            [['text','name'], 'string'],
            [['email'],'email'],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['prod_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'name' => 'Кто написал',
            'email' => 'E-mail',
            'text' => 'Текст отзыва',
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
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
