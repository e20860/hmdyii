<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Categories;
use app\models\Products;

class ItemsController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    /**
     *  Выводит список товаров в категории $id
     * @param type $id
     * @return text
     */
    
    public function actionCategory($id)
    {
        $model = Categories::findOne($id);
        $products = $model->products;
        $view = Yii::$app->request->get('view');
        if(!isset($view)){
            $view = 0;
        }
        return $this->render('items',[
            'model' => $model,
            'products' => $products,
            'view' => $view,
        ]);
    }
    
    /**
     *  Показывает корзину
     * @return text
     */
    public function actionCart()
    {
        return $this->render('cart');
    }
    
    /**
     *  Показывает карточку продукта
     * @return text
     */
    public function actionProd($id)
    {
        $model = Products::findOne($id);
        $images = $model->images;
        $reviews = $model->reviews;
        $category = $model->cat;
        if(!isset($images)){
            $images[] = 'gag.jpeg';
        }
        if(!isset($reviews)){
            $reviews = [];
        }
        
        return $this->render('prod',[
            'model' => $model,
            'images' => $images,
            'category' => $category,
            'reviews' => $reviews,
        ]);
    }


}