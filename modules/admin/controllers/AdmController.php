<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * Базовый контроллер для админки
 * Реализует фильтр контроля доступа
 * @author admin
 */
class AdmController extends Controller{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup','index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function checkUser()
    {
        if(!\Yii::$app->user->identity->access_token == 'admin') {
            return \yii\helpers\Url::to('/site/index');
        }
    }
}
