<?php

namespace app\models;

use Yii;

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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['user_id', 'status', 'delivery'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'address'], 'string', 'max' => 255],
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
