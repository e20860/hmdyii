<?php

namespace app\controllers;

/**
 * Description of InfoController
 *
 * @author admin
 */
class InfoController extends AppController
{
    public function actionHowToPay()
    {
        return $this->render('how-to-pay');
    }
    
    public function actionDelivery()
    {
        return $this->render('delivery');
    }
    
}
