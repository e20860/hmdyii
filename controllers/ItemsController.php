<?php

namespace app\controllers;

use Yii;
use app\controllers\AppController;
use app\models\Categories;
use app\models\Products;
use yii\data\Pagination;

class ItemsController extends AppController
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
        $params = \Yii::$app->request->get();
        if(!isset($params['sortirovka_prod'])){
            $params['sortirovka_prod'] = 0;
        }
        if(!isset($params['number_prod_str'])){
            $params['number_prod_str'] = 12;
        }
        // Порядок вывода: 0 - сетка(умолч), 1 - список
        if(!isset($params['view'])){
            $params['view'] = 0;
        }
        
        $model = Categories::findOne($id);
        $query = Products::find()->where(['cat_id' =>$id]);
        
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => $params['number_prod_str'],
            ]);
        $products = $query->offset($pages->offset)
                  ->limit($pages->limit)
                  ->all();

        $this->setMeta('Список товаров | '. $model->name,$model->keywords, $model->description);

        return $this->render('items',[
            'model' => $model,
            'products' => $products,
            'params' => $params,
            'pages' => $pages,
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
        $this->setMeta($model->name,$model->keywords,$model->description);
        return $this->render('prod',[
            'model' => $model,
            'images' => $images,
            'category' => $category,
            'reviews' => $reviews,
        ]);
    }


}
