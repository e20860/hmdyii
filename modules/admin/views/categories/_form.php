<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-sm-4">
        <?= Html::img(Url::to('/web/images/' . $model->img),
                [
                    'class' => 'img img-responsive',
                    'alt' => 'Изображение категории',
                    'id' => 'imgCat',
                    ])?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
            <label for="imgFile">Сменить изображение</label>
            <input type="file" id="imgFile">
            <br>
            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>    
        </div>
    </div>
    <hr>

    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'basic', 
        'inline' => false, //по умолчанию false
    ],
    ]);?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
