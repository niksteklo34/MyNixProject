<head>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php if (!$tools['session']->keyExists('name')): ?>
    <h1>Вы не авторизованы<br><a href="login">Войти</a></h1>
    <?php else: ?>
    <h1>Вы авторизованы как - <?php echo $tools['session']->get('name')?></h1>
        <h3 style="color: white;margin-top: 50px;margin-bottom: 50px">Имя: <?php echo $tools['session']->get('name')?><br>
            Фамилия: <?php echo $tools['session']->get('surname')?><br>
            Email: <?php echo $tools['session']->get('email')?></h3>
        <form action="user/logout" method="post">
            <button class="btn btn-success" name="logout" style="margin-bottom: 10px;">Выйти</button>
        </form>
    <?php endif; ?>
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
                        <div class="product-name col-lg-3 col-md-3 col-3"><?php echo $value->quantity ?> ед.</div>
                        <div class="price col-lg-6 col-md-6 col-6" style="margin-bottom: 10px">Сумма: <?php echo $value->price * $value->quantity ?> грн</div>
                    </div>
                    <hr style="height: 2px; background-color: white">
                </div>
            </li>
        <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</body>
