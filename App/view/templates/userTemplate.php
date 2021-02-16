<head>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php if (!$session->keyExists('name')): ?>
    <h1>Вы не авторизованы<br><a href="login">Войти</a></h1>
    <?php else: ?>
    <h1>Вы авторизованы как - <?php echo $session->get('name')?></h1>
        <h3 style="color: white;margin-top: 50px;margin-bottom: 50px">Имя: <?php echo $session->get('name')?><br>
            Фамилия: <?php echo $session->get('surname')?><br>
            Email: <?php echo $session->get('email')?></h3>
    <?php endif; ?>
    <?php if ($session->sessionExists()): ?>
        <?php $listOrders = $array['baseUser']->fegAllOrdersForUser($session->get('id')) ?>
        <?php if (!empty($listOrders)): ?>
        <h1>Список покупок</h1>
        <ol>
        <?php foreach ($listOrders as $value): ?>
            <li style=" margin-top: 15px" >
                <div class="product-item">
                    <hr style="height: 2px; background-color: white">
                    <div class="row box align-items-center" style="max-width: 1000px">
                        <div class="product-name col-lg-3 col-md-3 col-3"><?php echo $value->name ?></div>
                        <div class="product-name col-lg-6 col-md-6 col-6"><?php echo $value->title ?> грн</div>
                        <div class="price col-lg-3 col-md-3 col-3"><?php echo $value->price ?> грн</div>
                    </div>
                    <hr style="height: 2px; background-color: white">
                </div>
            </li>
        <?php endforeach; ?>
        </ol>
        <?php endif; ?>
        <form method="post">
            <button class="btn btn-success" name="logout">Выйти</button>
        </form>
    <?php endif; ?>
    <?php
    if (!empty($_POST)) {
        if (isset($_POST['logout'])) {
            echo "<br><h3>До свидания, {$session->get('name')}<br>Вы выйдете через 3 секунды...</h3>";
            $session->destroy();
            header('refresh: 2', "Location: login");
        }
    }
    ?>
</body>
