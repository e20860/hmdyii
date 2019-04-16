<?php

/*
 * HMDoll project framework of internet-shop
 * No License (OPEN GNU)
 * Author E.Slavko <e20860@mail.ru>
 */

namespace app\controllers;

use yii\web\Controller;
/**
 * Description of AppController
 *
 * @author admin
 */
class AppController extends Controller{
    
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => "$keywords",
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => "$description",
        ]);
    }
}
