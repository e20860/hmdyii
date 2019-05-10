<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Products;
use app\modules\admin\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prod_id')
            ->dropDownList(ArrayHelper::map(Products::find()->all(),'id','name')); ?>

    <?= $form->field($model, 'user_id')
            ->dropDownList(ArrayHelper::map(User::find()->all(),'id','name')); ?>

    <?= $form->field($model, 'r_date')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['email']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
