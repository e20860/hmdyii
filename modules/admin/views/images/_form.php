<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prod_id')->dropDownList(
 ArrayHelper::map(Products::find()->asArray()->all(),'id','name'),
            ['prompt'=>'Выберите товар'] ) ?>

    <div class="row">
        <div class="col-sm-4">
        <?= Html::img(Url::to('/web/images/' . $model->file),
                [
                    'class' => 'img img-responsive',
                    'alt' => 'Изображение категории',
                    'id' => 'imgCat',
                    ])?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>
            <label for="imgFile">Сменить изображение</label>
            <input type="file" id="imgFile">
        </div>
    </div>
    <hr>
    <?= $form->field($model, 'ord')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
