<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="/css/catalog.css">
</head>
<div class="header">
    <h2>Корзина</h2>
    <hr>
</div>
<?php if (!$tools['session']->sessionExists()): ?>
    <li style="list-style-type: none; background-color: olive; margin: 30px;padding: 30px;border: black 5px solid;border-radius: 45px">
        <h1 style="text-align: center">Вы не авторизованы. <a href="login">войти</a></h1><br>
    </li>
<?php elseif ($tools['session']->sessionExists() && empty($tools['products'])): ?>
    <li style="list-style-type: none; background-color: olive; margin: 30px;padding: 30px;border: black 5px solid;border-radius: 45px">
        <h1 style="text-align: center">Корзина пуста...</h1><br>
    </li>
<?php else: ?>
    <?php  $fullPrice = 0; ?>
    <?php foreach ($tools['products'] as $key => $value): ?>
        <ul>
            <li style="list-style-type: none;">
                <div class="product-item">
                    <div class="row box align-items-center" style="width: 100%; margin: 0">
                        <div class="product-img col-lg-3 col-md-3 col-3" style="margin-top: 10px"><img src="<?php echo $value->img ?>" alt="" height="75px"></div>
                        <div class="product-name col-lg-9 col-md-9 col-9"><?php echo $value->title ?></div>
                        <form style="margin-top: 20px; color: white" action="basket/setQty" method="post">
                            <input style="max-width: 100px" type="number" min="1" value="1" name="qty">
                            <div id="qty" style="color:white;"><?php echo $value->qty ?> ед.</div>
                            <button name="productNumber" value="<?php echo $key ?>" type="submit">посчитать</button>
                        </form>
                        <div class="product-name col-lg-9 col-md-9 col-9"><?php echo $value->description ?></div>
                        <div class="col-lg-3 col-md-3 col-3"></div>
                        <div class="price col-lg-3 col-md-3 col-3"><?php echo $value->price * $value->qty ?> грн</div>
                        <div class="col-lg-3 col-md-3 col-3"></div>
                        <form class="col-lg-3 col-md-3 col-3" action="basket/remove" method="post">
                            <div class="price"><button type="submit" name="deleteProduct" value="<?php echo $key?>">Удалить</button></div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    <?php $fullPrice = $value->price * $value->qty + $fullPrice ?>
    <?php endforeach; ?>
    <?php $tools['session']->set('fullPrice', $fullPrice) ?>
        <h1 style="color: red;margin: 15px 0">Общая самма заказа: <?php echo $tools['session']->get('fullPrice')?> Грн</h1>
        <div class="row box align-items-center"
            <div class="text-right">
                    <div class="row text-right" style="width: 100%">
                        <form action="basket/remove" class="col-lg-3 col-md-3 col-3" method="post">
                            <button name="delAll" value="fdf" type="submit" class="btn btn-primary" style="width: 150px">Очистить заказ</button>
                        </form>
                        <div class="col-lg-6 col-md-6 col-6"></div>
                        <form action="basket/order" class="col-lg-3 col-md-3 col-3" method="post">
                            <button name="takeOrder" value="df" type="submit" class="btn btn-primary" style="width: 150px">Оформить заказ</button>
                        </form>
                    </div>
            </div>
        </div>
<?php endif; ?>

