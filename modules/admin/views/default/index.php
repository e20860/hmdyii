<?php
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    
    $this->title = 'Главная административная страница';
?>
<div class="admin-default-index">
    <div class="row">
        <h2 class="text-center"><?= Html::encode($this->title);?></h2>
        <hr>
        <div class="col-sm-3">
            <h3 class="text-center">Навигация</h3>
            <hr>
            <ul class="nav">
                <li><a class="btn btn-link alog" id="svr-login" href="#">Лог сервера (access)</a></li>
                <li><a class="btn btn-link alog" id="svr-error" href="#">Лог сервера (ошибки)</a></li>
                <li><a class="btn btn-link alog" id="app-error" href="#">Ошибки приложения</a></li>
                <li><a class="btn btn-link alog" id="app-info"  href="#">Информация о просмотрах</a></li>
                <li><a class="btn btn-link alog" id="statistic" href="#">Статистика посещений</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <h3 class="text-center">Информация</h3>
            <hr>
            <div id="info-block"></div>
        </div>
    </div>
</div>
