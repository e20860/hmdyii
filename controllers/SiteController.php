<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\AppController;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Categories;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->setMeta('Главная'
                ,'Куклы ручной работы, выкройки, наборы мастер-классы,'
                . ' подарок ребёнку, сувенир, купить куклу купить выкройку'
                ,'Интернет магазин кукол ручной работы, выкройки, наборы, мастер-классы');
        // Две модели на первую страницу
        $first = date('d',time()) % 2 + 1;
        $second = $first + 2;
        $model1 = Categories::findOne($first);
        $model2 = Categories::findOne($second);
        return $this->render('index',[
            'model1' => $model1,
            'model2' => $model2,
        ]);
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::info('Пользователь '.Yii::$app->user->identity->name .' вошёл','info');
            return $this->goBack();
        }
        $model->password = '';
        $this->setMeta('Авторизация');
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        $this->setMeta('Обратная связь');
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->setMeta('О нас',
                'изготовление кукол выкройки мастер-классы',
                'мастер по изготлению кукол');
        return $this->render('about');
    }
}
