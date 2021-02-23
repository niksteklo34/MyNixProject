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
        <form action="user/wish" method="post">
            <button class="btn btn-success" name="logout" style="margin-bottom: 10px;">Избранные</button>
        </form>
        <form action="user/shopList" method="post">
            <button class="btn btn-success" name="logout" style="margin-bottom: 10px;">Список покупок</button>
        </form>
        <form action="user/logout" method="post">
            <button class="btn btn-success" name="logout" style="margin-bottom: 10px;">Выйти</button>
        </form>
    <?php endif; ?>
</body>
