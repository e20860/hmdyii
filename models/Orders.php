<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int $status
 * @property int $delivery
 *
 * @property OrdItems[] $ordItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * 
     * @return array
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['user_id', 'status', 'delivery'], 'integer'],
            [['email'], 'email'],
            [['created_at', 'updated_at','user_id', 'status', 'delivery','id'], 'safe'],
            [['name', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'user_id' => 'Покупатель',
            'created_at' => 'Создан',
            'updated_at' => 'Изменён',
            'name' => 'Получатель',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'status' => 'Статус',
            'delivery' => 'Доставка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdItems()
    {
        return $this->hasMany(OrdItems::className(), ['ord_id' => 'id']);
    }
}
