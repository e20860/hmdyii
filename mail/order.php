<h3>Уважаемый клиент!</h3>
<p>Вы получила данное письмо потому, что произвели заказ на сайте 
    <a href="hmdoll.ru">HMDoll.ru</a>
</p>
<p>По получении оплаты Ваш заказ будет  
    Вам отправлен выбранным Вами способом в течение 1 дня</p>
<p>Содержание заказа:</p>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item):?>
            <tr>
                <td><?=$item['name']?></td>
                <td><?=$item['qty']?></td>
                <td><?=$item['price']?></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="2">Итого, единиц:</td>
                <td id="cqty"><?=$session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="2">Сумма:</td>
                <td><?=$session['cart.sum']?></td>
            </tr>
        </tbody>
    </table>
</div>
<p>С уважением, администрация <b>HMDoll.ru</b></p>