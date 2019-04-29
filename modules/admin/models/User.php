<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $auth_key
 * @property string $access_token
 * @property string $phone
 * @property string $adress
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'name', 'auth_key', 'access_token', 'phone', 'adress'], 'required'],
            [['username'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 80],
            [['password', 'name', 'auth_key', 'access_token', 'adress'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'phone' => 'Phone',
            'adress' => 'Adress',
        ];
    }
}
