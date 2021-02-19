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
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-img col-lg-3 col-md-3 col-4" style="margin-top: 10px"><img src="<?php echo $value->img ?>" alt="" height="75px"></div>
                        <div class="product-name col-lg-9 col-md-9 col-8"><?php echo $value->title ?></div>
                        <div class="price col-lg-10 col-md-10 col-10"><?php echo $value->price ?> грн</div>
                        <form action="basket/remove" method="post">
                            <div class="price col-lg-2 col-md-2 col-2"><button type="submit" name="deleteProduct" value="<?php echo $key?>">Удалить</button></div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    <?php $fullPrice = $value->price + $fullPrice?>
<?php endforeach; ?>
<h1 style="color: red;margin: 15px 0">Общая самма заказа: <?php echo $fullPrice?> Грн</h1>
<div class="row box align-items-center"
    <div class="text-right">
            <div class="row">
                <form action="basket/remove" method="post" style="width: 100%;">
                    <button name="delAll" value="fdf" type="submit" class="btn btn-primary col-lg-3 col-md-3 col-3" style="">Очистить заказ</button>
                </form>
                <div class="col-lg-6 col-md-6 col-6"></div>
                <form action="basket/order" method="post" style="width: 100%;">
                    <button name="takeOrder" value="df" type="submit" class="btn btn-primary col-lg-3 col-md-3 col-3" style="">Оформить заказ</button>
                </form>
            </div>
    </div>
</div>
<?php endif; ?>
