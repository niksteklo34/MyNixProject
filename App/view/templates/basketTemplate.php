<head>
    <link rel="stylesheet" href="/css/basket.css">
</head>
<div class="container">
  <div class="header">
    <h2>Корзина</h2>
    <hr>
  </div>
  <?php if (!$tools['session']->sessionExists()): ?>
    <li class="notBox">
      <h1 class="notMessage">Вы не авторизованы. <a href="login">войти</a></h1><br>
    </li>
  <?php elseif ($tools['session']->sessionExists() && empty($tools['products'])): ?>
    <li class="notBox">
      <h1 class="notMessage">Корзина пуста...</h1><br>
    </li>
  <?php else: ?>
    <?php  $fullPrice = 0; ?>
    <?php foreach ($tools['products'] as $key => $value): ?>
      <ul>
        <li class="product">
          <div class="row product-item">
            <div class="product-img col-lg-3 col-md-3 col-3"><img src="<?php echo $value->img ?>" alt="" height="75px"></div>
            <div class="product-name col-lg-9 col-md-9 col-9"><?php echo $value->title ?></div>
            <form class="form" action="basket/setQty" method="post">
              <input class="inputQty" type="number" min="1" value="1" name="qty">
              <div id="qty"><?php echo $value->qty ?> ед.</div>
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
        </li>
      </ul>
    <?php $fullPrice = $value->price * $value->qty + $fullPrice ?>
    <?php endforeach; ?>
    <?php $tools['session']->set('fullPrice', $fullPrice) ?>
      <h1 class="totalPrice">Общая самма заказа: <?php echo $tools['session']->get('fullPrice')?> Грн</h1>
      <div class="row box align-items-center"
        <div class="text-right">
          <div class="buttonBox row text-right">
            <form action="basket/remove" class="col-lg-3 col-md-3 col-3" method="post">
              <button name="delAll" value="fdf" type="submit" class="btnFunc btn btn-primary">Очистить заказ</button>
            </form>
            <div class="col-lg-6 col-md-6 col-6"></div>
            <form action="basket/order" class="col-lg-3 col-md-3 col-3" method="post">
              <button name="takeOrder" value="df" type="submit" class="btnFunc btn btn-primary">Оформить заказ</button>
            </form>
          </div>
        </div>
      </div>
  <?php endif; ?>
</div>

