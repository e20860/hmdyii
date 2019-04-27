<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\OrdItems;
use yii\helpers\Url;
/**
 * Description of OrderController
 *
 * @author admin
 */
class OrderController extends AppController{
    
    protected $success_message = 'Спасибо! Ваш заказ принят, мы свяжемся с Вами в ближайшее время';
    protected $error_message = 'Ошибка сохранения/оформления заказа';

    public function actionCheckout()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Orders();
        $this->setMeta('Оформление | заполнение');  
        if($order->load(Yii::$app->request->post())) {
            $order->status = 0;
            $order->user_id = 0;
            $order->delivery = 0;
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                $session->setFlash('success', $this->success_message);
                Yii::$app->mailer->compose('order',['session'=>$session]) 
                        ->setFrom(Yii::$app->params['adminEmail'])
                        ->setTo($order->email)
                        ->setSubject('Ваш заказ на HMDoll.ru')
                        ->send();
                Yii::$app->mailer->compose('order',['session'=>$session]) 
                        ->setFrom(Yii::$app->params['adminEmail'])
                        ->setTo(Yii::$app->params['adminEmail'])
                        ->setSubject('Ваш заказ на HMDoll.ru')
                        ->send();
                
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');

                return $this->redirect(Url::to(['/order/pay']));
            } else {
                $session->setFlash('error', $this->error_message);
            }
        }
        return $this->render('checkout',[
            'session' => $session,
            'order' => $order,
        ]);
    }
    
    public function actionPay()
    {
        return $this->render('pay');
    }

        /**
     * Заполняет строки товара из корзины в заказ
     * @param array $items
     * @param int   $ord__id
     */
    protected function saveOrderItems($items,$ord__id)
    {
        foreach ($items as $id => $item){
            $os = new OrdItems();
            $os->ord_id = $ord__id;
            $os->product_id = $id;
            $os->name = $item['name'];
            $os->price = $item['price'];
            $os->quantity = $item['qty'];
            $os->save();
        }
    }
}
