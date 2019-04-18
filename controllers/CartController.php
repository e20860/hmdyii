<?php

namespace app\controllers;

use app\models\Products;
use app\models\Cart;
use Yii;
/**
 * Работа с корзиной
 * @author admin
 */
class CartController extends AppController{
    
    /**
     * Добавление товара в корзину
     * @return boolean
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        return $this->renderAjax('cart-modal', [
            'session' => $session,
        ]);
    }
    /**
     *  Очистка корзины
     * @return string
     */
    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderAjax('cart-modal', [
            'session' => $session,
        ]);        
    }
    /**
     * Удаляет строчку из корзины
     * @return string
     */
    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->removeItem($id);
        return $this->renderAjax('cart-modal', [
            'session' => $session,
        ]);        
    }
    
    public function actionViewCart()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderAjax('cart-modal', [
            'session' => $session,
        ]);        
        
    }
}
