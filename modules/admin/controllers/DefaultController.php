<?php

namespace app\modules\admin\controllers;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends AdmController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->checkUser();
        return $this->render('index');
    }
}
