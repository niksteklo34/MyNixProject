<head>
    <link rel="stylesheet" href="/css/basket.css">
</head>
<?php if ($tools['session']->sessionExists() && $tools['session']->keyExists('name')): ?>
    <h1>Список покупок</h1>
    <ol>
        <?php foreach ($tools['orders'] as $value): ?>
            <li style=" margin-top: 15px" >
                <div class="product-item">
                    <hr style="height: 2px; background-color: white">
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-name col-lg-3 col-md-3 col-3"><?php echo $value->name ?></div>
                        <div class="product-name col-lg-6 col-md-6 col-6"><?php echo $value->title ?> грн</div>
                        <div class="product-name col-lg-3 col-md-3 col-3"><?php echo $value->qty ?> ед.</div>
                        <div class="price col-lg-6 col-md-6 col-6" style="margin-bottom: 10px">Сумма: <?php echo $value->price * $value->qty ?> грн</div>
                    </div>
                    <hr style="height: 2px; background-color: white">
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
    <a href="../user" class="btn btn-success" style="text-decoration: none; color: white; margin: 20px 0">Назад</a>
<?php endif; ?>