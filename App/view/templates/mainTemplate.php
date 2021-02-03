<?php
$auth = new \App\session\Authentication();
?>

<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<div class="mt-4">
    <div class="text text-center">
        <?php if (!$auth->isAuth()): ?>
        <H1>Добро пожаловать, гость!</H1><br><br>
        <?php else: ?>
        <H1>Добро пожаловать, <?php echo $auth->session->get('name') ?>!</H1><br><br>
        <?php endif; ?>
        <form class="text-center" action="" method="post">
            <div class="test form-floating mb-3">
                <label for="search">Я ищу...</label>
                <input type="text" class="form-find form-control" id="search" placeholder="Название товара..." name="search">
            </div>
            <button type="button" class="btn btn-primary">Искать</button><br><br>
        </form>
        <button type="button" class="catalog btn btn-primary"><h3>Посетить каталог товаров</h3></button>
    </div>
</div>
