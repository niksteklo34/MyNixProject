<?php
use App\session\Session;
$session = new Session();
?>

<nav class="navbar navbar-expand-lg">
    <div class="links container-md">
        <a class="brand navbar-brand" href="..">Coffezin</a>
        <a class="link btn btn-success" href="login">Войти</a>
        <a class="link btn btn-success" href="user">Пользователь</a>
        <a class="link btn btn-success" href="catalog">Каталог</a>
        <a class="link btn btn-success" href="basket">Корзина</a>
        <?php if (!isset($_SESSION['name'])): ?>
        <a class="username" href="login">Войти</a>
        <?php else: ?>
        <p class="username" href="login">Привет, <?php echo $session->get('name')?>!</p>
        <?php endif; ?>
    </div>
</nav>
<hr class="hr">
